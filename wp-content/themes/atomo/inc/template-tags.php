<?php
/**
 * Custom template tags for Átomo WordPress
 *
 * @package Atomo
 */

require_once ABSPATH . 'wp-admin/includes/plugin.php';


if ( ! function_exists( 'atomo_language_switcher' ) ) {
	/**
	 * Display language switcher widget.
	 *
	 * @param string|array $class (Optional) Class attributes for widget.
	 *
	 * @see https://polylang.wordpress.com/documentation/
	 */
	function atomo_language_switcher( $class = '' ) {
		echo atomo_get_language_switcher( $class );
	}

	/**
	 * Generate language switcher widget.
	 *
	 * @param string|array $class (Optional) Class attributes to use.
	 * @return string Rendered language switcher HTML.
	 */
	function atomo_get_language_switcher( $class = '' ) {

		if ( ! function_exists( 'pll_the_languages' ) ) {
			error_log( 'Missing "polylang" plugin' );
			return;
		}

		$languages = pll_the_languages( [
			'display_names_as' => 'slug',
			'raw' => true,
		] );

		if ( empty( $languages ) ) {
			return '';
		}

		$class = $class ?: [];
		if ( ! is_array( $class ) ) {
			$class = explode( ',', $class );
			foreach ( $class as $name ) {
				$class[$name] = trim( $name );
			}
		}

		if ( ! in_array( 'lang-switcher', $class ) ) {
			$class[] = 'lang-switcher';
		}

		$links = [];
		foreach ($languages as $lang => $info ) {

			$classes = array_merge( ['lang-link'], $info['classes'] );
			if ( $info['current'] ?? false ) {
				$classes[] = 'active';
			}

			$title = locale_get_display_name( $info['locale'] );
			$abbr = sprintf( '<abbr title="%s">%s</abbr>', esc_attr( $title ), strtoupper( $lang ) );
			$links[] = sprintf( '<a class="%s" href="%s" rel="alternate" hreflang="%s">%s</a>',
			                    esc_attr( implode( ' ', $classes ) ),
			                    esc_url( $info['url'] ),
			                    $info['slug'],
			                    $abbr );
		}

		$nav = implode( '<div class="separator"></div>', $links );
		$out = sprintf( '<div class="%s">%s</div>', implode( ',', $class ), $nav );

		return $out;
	}
}


if ( ! function_exists( 'atomo_excerpt' ) ) {
	/**
	 * Display a short excerpt of the post's contents.
	 *
	 * @param array $args (Optional) Arguments for generating the excerpt.
	 * @see https://wordpress.org/plugins/advanced-excerpt/
	 */
	function atomo_excerpt( array $args = null ) {
		echo atomo_get_excerpt( $args );
	}

	/**
	 * Get short excerpt of the post's contents.
	 *
	 * @param array $args (Optional) Arguments for generating the excerpt.
	 * @return string Short excerpt text.
	 */
	function atomo_get_excerpt( array $args = null ) {

		$allowed_defaults = [
			'a', 'acronym',
			'b', 'br',
			'em',
			'i',
			'q',
			's', 'strike', 'strong', 'sub', 'sup',
			'u'
		];

		$defaults = [
			'length'        => 20,
			'length_type'   => 'words',
			'allowed_tags'  => $allowed_defaults
		];

		$args = wp_parse_args( $args, $defaults );

		if ( is_array( $args['allowed_tags'] ) ) {
			$args['allowed_tags'] = implode( ',', $args['allowed_tags'] );
		}

		$query = join( '&', $args );

		if ( is_plugin_active( 'advanced-excerpt' ) && function_exists( 'the_advanced_excerpt' ) ) {
			$out = the_advanced_excerpt( $query, true );
		} else {
			$out = get_the_excerpt();
		}

		return $out;
	}
}
