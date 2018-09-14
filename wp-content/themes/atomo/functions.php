<?php

/**
 * Atomo Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage atomo
 */

if ( ! function_exists( 'atomo_setup' ) ) {
	/**
	 * Setup WordPress features with atomo's defaults.
	 */
	function atomo_setup() {

		load_theme_textdomain( 'atomo' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'customize-selective-refresh-widgets' );

		/* ``custom-background`` */
		$bgdefaults = [
			'default-color' => 'ffffff',
			'default-image' => ''
		];

		$background = apply_filters('atomo_custom_background_args', $bgdefaults);
		add_theme_support( 'custom-background', $background );


		/* ``customer-logo`` */
		$logo = [
			'width' => 140,
			'height' => 30,
			'flex-width' => true,
			'header-text' => [
				'site-title',
				'site-description',
			],
		];

		add_theme_support( 'custom-logo', $logo );


		/* ``post-thumbnails`` */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );


		/* ``nav_menus`` */
		$nav_menus = [
			'primary' => __( 'Primary Menu', 'atomo' ),
			'social' => __( 'Social Links Menu', 'atomo' ),
		];

		register_nav_menus($nav_menus);


		/*  ``html5`` */
		$html5 = [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		];

		add_theme_support('html5', $html5);


		/* ``post-formats`` */
		$post_formats = [
			'audio',
			'aside',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		];

		add_theme_support( 'post-formats', $post_formats );
	}
}   // ! atomo_setup

add_action( 'after_setup_theme', 'atomo_setup' );


if ( ! function_exists( 'atomo_init' ) ) {
	/**
	 * Initialize registered atomo theme.
	 *
	 *
	 */
	function atomo_init() {

		// Use categories and tags with attachments
		register_taxonomy_for_object_type( 'category', 'attachment' );
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

		// Register custom post types (Could be moved to a plugin)
		register_post_type('slider', [
			'labels' => [
				'name' => __( 'Sliders', 'euroamerica-v3' ),
				'singular_name' => __( 'Slider', 'euroamerica-v3' ),
			],
			'public' => true,
			'supports' => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'revisions',
				'page-attributes',
			],
			'show_in_menu' => true,
		] );

		register_post_type('slider', [
			'labels' => [
				'name' => __( 'Sliders', 'euroamerica-v3' ),
				'singular_name' => __( 'Slider', 'euroamerica-v3' ),
			],
			'public' => true,
			'supports' => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'revisions',
				'page-attributes',
			],
			'show_in_menu' => true,
		] );
	}
}  // ! atomo_setup

add_action( 'init', 'atomo_init' );


if ( ! function_exists( 'atomo_init_widgets' ) ) {
	/**
	 * Initialize atomo's theme specific widgets.
	 */
	function atomo_init_widgets() {
		/* -- EMPTY -- */
	}

	add_action( 'widgets_init', 'atomo_init_widgets' );
}  // ! atomo_init_widgets


if ( ! function_exists( 'atomo_init_customizer' ) ) {
	/*
	 * Manage admin's customization page.
	 */
	function atomo_init_customizer( $wp_customize ) {
		/* -- EMPTY -- */
	}

	add_action( 'customize_register', 'atomo_init_customizer' );
}  // ! atomo_init_customizer


if ( ! function_exists( 'atomo_enqueue_scripts' ) ) {
	/*
	 * Register all style files required for rendering the page.
	 *
	 * @internal
	 */
	function atomo_register_styles( $base_url = null ) {

		if ( ! $base_url) {
			$base_url = get_template_directory_uri();
		}

		wp_deregister_style( 'normalize' );
		wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css', false, null, 'all');

		wp_deregister_style( 'bootstrap' );
		wp_enqueue_style( 'bootstrap', "$base_url/bootstrap/css/bootstrap.css", false, null, 'all');

		wp_deregister_style( 'font' );
		wp_enqueue_style( 'font', "$base_url/css/font.css", false, null, 'all');

		wp_deregister_style( 'layout' );
		wp_enqueue_style( 'layout', "$base_url/css/layout.css", false, null, 'all');

		wp_deregister_style( 'style' );
		wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), false, null, 'all');

		wp_deregister_style( 'fonts' );
		wp_enqueue_style( 'fonts', "$base_url/assets/css/fonts.css", false, null, 'all');

		wp_deregister_style( 'layout' );
		wp_enqueue_style( 'layout', "$base_url/assets/css/layout.css", false, null, 'all');

		wp_deregister_style( 'navbar' );
		wp_enqueue_style( 'navbar', "$base_url/assets/css/navbar.css", false, null, 'all');

		wp_deregister_style( 'footer' );
		wp_enqueue_style( 'footer', "$base_url/assets/css/footer.css", false, null, 'all');

		wp_deregister_style( 'slider' );
		wp_enqueue_style( 'slider', "$base_url/assets/css/slider.css", false, null, 'all');

		wp_deregister_style( 'grid' );
		wp_enqueue_style( 'grid', "$base_url/assets/css/grid.css", false, null, 'all');

		wp_deregister_style( 'single' );
		wp_enqueue_style( 'single', "$base_url/assets/css/single.css", false, null, 'all');

		wp_deregister_style( 'index' );
		wp_enqueue_style( 'index', "$base_url/assets/css/index.css", false, null, 'all');
	}

	/*
	 * Register all scripts required for running the frontend.
	 *
	 * @internal
	 */
	function atomo_register_scripts( $base_url = null ) {

		if ( ! $base_url ) {
			$base_url = get_template_directory_uri();
		}

		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', "$base_url/assets/js/jquery.min.js", false, null, true);

		wp_deregister_script( 'popper' );
		wp_enqueue_script( 'popper', "$base_url/assets/js/popper.js", false, null, true);

		wp_deregister_script( 'bootstrap' );
		wp_enqueue_script( 'bootstrap', "$base_url/bootstrap/js/bootstrap.min.js", ['jquery', 'popper'], null, true);

		wp_deregister_script( 'ieviewportbugworkaround' );
		wp_enqueue_script( 'ieviewportbugworkaround', "$base_url/assets/js/ie10-viewport-bug-workaround.js", false, null, true);

		wp_deregister_script( 'index' );
		wp_enqueue_script( 'index', "$base_url/assets/js/index.js", false, null, true);

		wp_deregister_script( 'functions' );
		wp_enqueue_script( 'functions', "$base_url/assets/js/functions.js", false, null, true);
	}

	/*
	 * Callback handler to register required frontend resources.
	 *
	 * @param  string $base_url (Optional) URL of template directory.
	 *
	 * @see    atomo_register_styles, atomo_register_scripts
	 */
	function atomo_enqueue_scripts( $base_url = null ) {
		atomo_register_styles($base_url);
		atomo_register_scripts($base_url);
	}

	add_action( 'wp_enqueue_scripts', 'atomo_enqueue_scripts' );

}  // ! atomo_enqueue_scripts


if ( ! function_exists( 'atomo_content_width' ) ) {
	/*
	 * Set content width in pixels, based on the theme's design.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 * Defaults to '960px' as max-width property.
	 *
	 * @param  int $max_width (Optional) Maximum width of content in pixels.
	 *
	 * @global int $content_width
	 */
	function atomo_content_width( $max_width = 960 ) {
		$width = apply_filters( 'atomo_content_width', $max_width );
		$GLOBALS['content_width'] = $width;

		return $width;
	}

	add_action( 'after_setup_theme', 'atomo_content_width', 0 );
}  // ! actomo_content_width


require_once __DIR__ . '/inc/bootstrap/wp_bootstrap4_pagination.php';
require_once __DIR__ . '/inc/breadcrumbs.php';
require_once __DIR__ . '/inc/metabox.php';
