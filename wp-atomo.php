<?php

/**
 * Base configuration for Átomo WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following notable exports:
 *
 *     - Execution environment
 *     - MySQL settings
 *     - Secret keys
 *     - Database table prefix
 *     - ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package atomo
 */

/** Absolute path to the Átomo WordPress directory. */
defined( 'ABSPATH' ) or define( 'ABSPATH', __DIR__ . '/' );

if (file_exists( ABSPATH . 'vendor/autoload.php' )) {
	require_once ABSPATH . 'vendor/autoload.php';
}

if (is_readable( ABSPATH . '.env' )) {
	/*
	 * Load application configuration from .env file
	 */
	$can = function_exists( 'apache_getenv' ) && function_exists( 'apache_setenv' );
	$ini = parse_ini_file( ABSPATH . '.env', false, INI_SCANNER_TYPED );

	foreach ( $ini as $name => $value ) {

		if ( $can && apache_getenv( $name ) ) {
			apache_setenv( $name, $value );
		} else {
			putenv( "$name=$value" );
		}

		/*
		 * Guarantee variable exists in superglobals.
		 */
		$_ENV[$name] = $value;
	}

	unset( $can, $ini );
}


/*  ------------------------  START OF CONFIGURATION  -----------------------  */

define( 'ENVIRONMENTS', ['development', 'test', 'staging', 'production'] );


/**
 * Sanitize application tier input key.
 *
 * @param mixed $obj
 * @param bool $strict
 *
 * @return string      Cleaned application tier identifier.
 */
function sanitize_tier( $obj, $strict = false, array &$choices = null ) {
	$name = $strict ? strval( $obj ) : strtolower( $obj );
	$key = preg_replace( '/[^a-z0-9_\-]/', '', $name );
	if ( empty( $key ) ) {
		return 'production';  // XXX
	}

	if ( $strict ) {
		$check = $choices ?: ENVIRONMENTS;
		if ( ! in_array( $key, $check ) ) {
			if ( in_array( $key, ['4', 'live']) || 0 === substr_compare( $key, 'prod', 0, 4 ) ) {
				$key = 'production';
			} elseif ( in_array( $key, ['3', 'stage'] ) ) {
				$key = 'staging';
			} elseif ( in_array( $key, ['2', 'testing'] ) ) {
				$key = 'test';
			} elseif ( in_array( $key, ['1', 'local'] ) || 0 === substr_compare( $key, 'dev', 0, 3 ) ) {
				$key = 'development';
			}
		}
	}

	return $key;
}


/**
 * Check if given handle is a valid application tier.
 *
 * @param mixed         $obj
 * @param bool          $strict
 * @param null|array    $coices
 *
 * @return bool         Yield `true` if $obj is a valid tier, otherwise `false`.
 */
function is_tier( $obj, $strict = false, array &$choices = null ) {
	$name = $strict ? strval( $obj ) : strtolower( $obj );
	$key = preg_replace( '/[^a-z0-9_\-]/', '', $name );

	$available = $choices ?: [
		'development',
		'devel',
		'dev',
		'live',
		'prod',
		'test',
		'local',
		'testing',
		'staging',
		'production'
	];

	return in_array( $key, $available );
}


/**
 * Get currently active application environment.
 *
 * @param string     $env_key
 * @param string     $default
 * @param null|array $choices
 *
 * @return string    Name of application tier. (default: 'production')
 */
function get_tier( $env_key = 'WP_ENV', $default = '*', array &$choices = null ) {
	$out = sanitize_tier( $default, $choices );

	$var = getenv( $env_key, true );
	if ( $var === false ) {
		return $out;
	}

	$available = $choices ?: ENVIRONMENTS;
	$ident = strtolower( filter_var( $var, FILTER_SANITIZE_STRING ) );

	if ( isset($available[ $ident ]) ) {
		return $available[ $ident ];
	}

	return $out;
}


var_dump(get_tier());


/**
 * Check binary feature flag in environment variables.
 *
 * @param string  		$env_key
 * @param null|bool     $default
 * @param bool     		$required
 * @param null|array    $choices
 *
 * @return null|bool    Interpolated boolean value of flag variable,
 *                      the given $default if not set and optional,
 *                      otherwise `null` if required and quiet.
 */
function get_flag( $env_key, $default = null, $required = false, $quiet = false, array $choices = null ) {

	$available = $choices ?: [
		'true' => true,
		'yes' => true,
		'on' => true,
		'1' => true,
		'false' => false,
		'no' => false,
		'off' => false,
		'0' => false,
	];

	if ( function_exists( 'apache_getenv' ) ) {
		$var = apache_getenv( $env_key, $required );
	} else {
		$var = getenv( $env_key, true );
	}

	if ( $var === false ) {
		goto missing;
	}

	if ( filter_var( $var, FILTER_VALIDATE_BOOLEAN ) ) {
		return true;
	}

	$id = strtolower( $var );
	if ( in_array( $id, $available ) ) {
		return true;
	}

missing:
	if ( $required && $default === null ) {
		if ( $quiet ) {
			return null;
		}

		throw \AssertionError( "Missing required flag '${env_key}'." );
	}

	return $default;
}


/** Operational environment for the whole WordPress application */
define( 'WP_ENV', filter_var( getenv( 'WP_ENV', true ) ?: 'production', FILTER_SANITIZE_STRING ) );

/** Unknown application tiers should not get privileges access */
if ( ! is_tier( WP_ENV ) ) {
	trigger_error( 'Unknown application tier: ' . WP_ENV . ' [WP_ENV]');
} else {
	$env_settings = ABSPATH . 'conf/environments/' . WP_ENV . '.php';
	if ( file_exists( $env_settings ) ) {
		require_once $env_settings;
	}

	unset( $env_settings );
}


//  ~: URL :~  //

/** Absolute URL to the Átomo homepage in this environment. */
define( 'WP_HOME', getenv( 'WP_HOME', true ) ?: 'http://localhost:8080' );

/** Publicly reachable URL of current Átomo site. */
define( 'WP_SITEURL', getenv( 'WP_SITEURL', true ) ?: 'http://localhost:8080' );


//  ~: MySQL :~  //

/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'DB_NAME', true ) ?: 'atomo' );

/** MySQL database username */
define( 'DB_USER', getenv( 'DB_USER', true ) ?: 'atomo' );

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD', true ) ?: 'atomo' );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'DB_HOST', true ) ?: 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', getenv( 'DB_CHARSET', true ) ?: 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', getenv( 'DB_COLLATE', true ) ?: '' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'DB_PREFIX', true ) ?: 'wp_';  // @codingStandardsIgnoreLine


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         getenv( 'AUTH_KEY', true ) ?: 'INSECURE:KEY' );
define( 'SECURE_AUTH_KEY',  getenv( 'SECURE_AUTH_KEY', true ) ?: 'INSECURE:KEY' );
define( 'LOGGED_IN_KEY',    getenv( 'LOGGED_IN_KEY', true ) ?: 'INSECURE:KEY' );
define( 'NONCE_KEY',        getenv( 'NONCE_KEY', true ) ?: 'INSECURE:KEY' );
define( 'AUTH_SALT',        getenv( 'AUTH_SALT', true ) ?: 'INSECURE:SALT' );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT', true ) ?: 'INSECURE:SALT' );
define( 'LOGGED_IN_SALT',   getenv( 'LOGGED_IN_SALT', true ) ?: 'INSECURE:SALT' );
define( 'NONCE_SALT',       getenv( 'NONCE_SALT', true ) ?: 'INSECURE:SALT' );

/**#@-*/

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', filter_var( getenv( 'WP_DEBUG', true ), FILTER_VALIDATE_BOOLEAN ) );
define( 'WP_DEBUG_LOG', filter_var( getenv( 'WP_DEBUG_LOG', true ), FILTER_VALIDATE_BOOLEAN ) );
define( 'WP_DEBUG_DISPLAY', filter_var( getenv( 'WP_DEBUG_DISPLAY', true ), FILTER_VALIDATE_BOOLEAN ) );

define( 'SAVEQUERIES', filter_var( getenv( 'SAVEQUERIES', true ), FILTER_VALIDATE_BOOLEAN ) );
define( 'SCRIPT_DEBUG', filter_var( getenv( 'SCRIPT_DEBUG', true ), FILTER_VALIDATE_BOOLEAN ) );

/*  -------------------------  END OF CONFIGURATION  ------------------------  */


require_once ABSPATH . 'wp-settings.php';
