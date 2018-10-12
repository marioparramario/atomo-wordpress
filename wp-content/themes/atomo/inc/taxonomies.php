<?php
/**
 * Custom taxonomies
 *
 * @package WordPress
 * @subpackage Atomo
 */

if ( ! function_exists('atomo_register_featured_taxonomy') ) {
	/**
	 * Register custom `featured` taxonomy for posts.
	 *
	 * @param array $args (Optional) Alternative taxonomy parameters.
	 */
	function atomo_register_featured_taxonomy( array $args = null ) {

		$labels = [
			'name'          => __( 'Featured', 'atomo' ),
			'singular_name' => __( 'Featured', 'atomo' ),
			'search_items'  => __( 'Search Featured Posts', 'atomo' ),
			'all_items'     => __( 'All Featured Posts', 'atomo' ),
			'edit_item'     => __( 'Edit Featured Post', 'atomo' ),
			'parent_item'   => __( 'Parent Feature', 'atomo' ),
			'parent_item_colon' => __( 'Parent Feature:', 'atomo' ),
			'update_item'   => __( 'Update Featured Post', 'atomo' ),
			'add_new_item'  => __( 'Add New Featured Post', 'atomo' ),
			'new_item_name' => __( 'New Featured Post Name', 'atomo' ),
			'menu_name'     => __( 'Featured', 'atomo' ),
		];

		$capabilities = [
			'assign_items'  => 'feature_posts',
		];

		$defaults = [
			'hierarchical'  => true,
			'label'         => __( 'Featured', 'atomo' ),
			'labels'        => $labels,
			'publicly_queryable' => true,
			'query_var'     => 'featured',
			'slug'          => 'featured',
			'show_ui'       => true,
			'show_in_menu'  => true,
			'show_in_nav_menus' => true,
			'show_in_quick_edit' => true,
			'show_admin_column' => true,
		];

		$args = wp_parse_args( $args, $defaults );
		register_taxonomy( 'featured', 'post', $args );
	}
}


if ( ! function_exists('atomo_register_featured_terms') ) {
	/**
	 * Register builtin terms for custom `feature` taxonomy.
	 *
	 * @param array $args (Optional) Alternative term parameters.
	 */
	function atomo_register_featured_terms( array $args = null ) {

		$defaults = [
			'unfeatured' => [
				'description' => __( 'Posts not featured anywhere', 'atomo' ),
			],
			'featured' => [
				'description' => __( 'Homepage featured post', 'atomo' ),
			],
			'primary' => [
				'description' => __( 'Main featured post', 'atomo' ),
			],
			'slider'  => [
				'description' => __( 'Slider featured post', 'atomo' ),
			],
		];

		$args = wp_parse_args( $args, $defaults );

		if ( ! term_exists('unfeatured', 'featured') ) {
			$unfeatured = wp_insert_term( 'unfeatured', 'featured', $args['unfeatured'] );
		}

		if ( term_exists('featured', 'featured') ) {
			$featured = get_term_by( 'name', 'featured', 'featured' );
		} else {
			$featured = wp_insert_term( 'featured', 'featured', $args['featured'] );
		}

		if ( is_array( $featured ) ) {
			$parent_id = $featured['term_id'] ?? 0;
		} elseif ( property_exists( $featured, 'term_id' ) ) {
			$parent_id = $featured->term_id;
		} else {
			$parent_id = 0;
		}

		$args['primary']['parent'] = $parent_id;
		$args['slider']['parent']  = $parent_id;

		if ( ! term_exists( 'primary', 'featured' ) ) {
			$primary = wp_insert_term( 'primary', 'featured', $args['primary'] );
		}

		if ( ! term_exists( 'slider', 'featured' ) ) {
			$slider = wp_insert_term( 'slider', 'featured', $args['slider'] );
		}
	}
}
