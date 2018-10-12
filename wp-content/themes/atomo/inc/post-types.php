<?php
/**
 * Custom Átomo post types
 *
 * @package WordPress
 * @subpackage Atomo
 */

if ( ! function_exists( 'atomo_register_slider_post_type' ) ) {
	/**
	 * Register custom post types for the slider
	 *
	 * @return WP_Post_Type
	 */
	function atomo_register_slider_post_type() {

		$supports = [
			'title',
			'editor',
			'author',
			'thumbnail',
			'custom-fields',
			'page-attributes',
			'revisions',
			'excerpt',
		];

		$labels = [
			'name'          => __( 'Sliders', 'atomo' ),
			'singular_name' => __( 'Slider', 'atomo' ),
		];

		$params = [
			'labels'       => $labels,
			'public'       => true,
			'show_in_menu' => true,
			'supports'     => $supports,
		];

		return register_post_type( 'slider', $params );
	}
}
