<?php
/**
 * Custom template tags for Átomo WordPress
 *
 * @package Atomo
 */

require_once ABSPATH . 'wp-admin/includes/plugin.php';


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
