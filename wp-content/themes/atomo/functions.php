<?php
/**
 * Functions and constants for Átomo theme.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Atomo
 */


add_action( 'after_setup_theme', 'atomo_setup' );

if ( ! function_exists( 'atomo_setup' ) ) {
	/**
	 * Set up Átomo theme defaults and handlers.
	 */
	function atomo_setup() {
		/*
		 * Make theme available for translation
		 */
		load_theme_textdomain( 'atomo', get_template_directory() . '/languages' );

		/*
		 * Add default RSS feed links to posts and comments.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable dynamically managed page titles.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable basic thumbnail support in posts.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );

		/*
		 * Enable support for various post formats. [1]
		 *
		 * [1] https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', [
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		] );

		/*
		 * Add support for widget edit icons in customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( [
			'primary' => __( 'Primary Menu', 'atomo' ),
			'social'  => __( 'Social Links Menu', 'atomo' ),
		] );

		/*
		 * Tweak common markup to utilize HTML5 features.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );
	}
}


/**
 * $content_width
 *
 * Have to have it, WP Theme Check says so:
 *
 * https://codex.wordpress.org/Content_Width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

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
			'name' => __( 'Sliders', 'atomo' ),
			'singular_name' => __( 'Slider', 'atomo' ),
		];

		$params = [
			'labels' => $labels,
			'public' => true,
			'show_in_menu' => true,
			'supports' => $supports
		];

		return register_post_type( 'slider', $params );
	}
}


add_action( 'init', 'atomo_init' );

if ( ! function_exists( 'atomo_init' ) ) {
	/*
	 * Initialize special-purpose page elements.
	 */
	function atomo_init() {
		/*
		 * Use categories and tags with attachments
		 */
		register_taxonomy_for_object_type( 'category', 'attachment' );
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

		atomo_register_slider_post_type();
	}
}


add_action( 'widgets_init', 'atomo_widgets_init' );

if ( ! function_exists( 'atomo_widgets_init' ) ) {
	/* UNUSED */
	function atomo_widgets_init() {
		/* -- EMPTY -- */
	}
}


add_action( 'customize_register', 'atomo_customize_register' );

if ( ! function_exists( 'atomo_customize_register' ) ) {
	/* UNUSED */
	function atomo_customize_register( $wp_customize ) {
	    /* -- EMPTY -- */
	}
}


add_action( 'wp_enqueue_scripts', 'atomo_enqueue_scripts' );

if ( ! function_exists( 'atomo_enqueue_scripts' ) ) {

    function atomo_enqueue_scripts() {

		$base_url = get_template_directory_uri();

		// -- BEGIN:SCRIPTS

		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', "$base_url/assets/js/jquery.min.js", false, null, true);

		wp_deregister_script( 'popper' );
		wp_enqueue_script( 'popper', "$base_url/assets/js/popper.js", false, null, true);

		wp_deregister_script( 'bootstrap' );
		wp_enqueue_script( 'bootstrap', "$base_url/bootstrap/js/bootstrap.min.js", false, null, true);

		wp_deregister_script( 'ieviewportbugworkaround' );
		wp_enqueue_script( 'ieviewportbugworkaround', "$base_url/assets/js/ie10-viewport-bug-workaround.js", false, null, true);

		wp_deregister_script( 'index' );
		wp_enqueue_script( 'index', "$base_url/assets/js/index.js", false, null, true);

		wp_deregister_script( 'functions' );
		wp_enqueue_script( 'functions', "$base_url/assets/js/functions.js", false, null, true);

		// -- END:SCRIPTS


		// -- BEGIN:STYLES

		wp_deregister_style( 'normalize' );
		wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css', false, null, 'all' );

		wp_deregister_style( 'bootstrap' );
		wp_enqueue_style( 'bootstrap', "$base_url/bootstrap/css/bootstrap.css", false, null, 'all' );

		wp_deregister_style( 'font' );
		wp_enqueue_style( 'font', "$base_url/css/font.css", false, null, 'all' );

		wp_deregister_style( 'layout' );
		wp_enqueue_style( 'layout', "$base_url/css/layout.css", false, null, 'all' );

		wp_deregister_style( 'style' );
		wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_url' ), false, null, 'all' );

		wp_deregister_style( 'fonts' );
		wp_enqueue_style( 'fonts', "$base_url/assets/css/fonts.css", false, null, 'all' );

		wp_deregister_style( 'layout' );
		wp_enqueue_style( 'layout', "$base_url/assets/css/layout.css", false, null, 'all' );

		wp_deregister_style( 'navbar' );
		wp_enqueue_style( 'navbar', "$base_url/assets/css/navbar.css", false, null, 'all' );

		wp_deregister_style( 'footer' );
		wp_enqueue_style( 'footer', "$base_url/assets/css/footer.css", false, null, 'all' );

		wp_deregister_style( 'slider' );
		wp_enqueue_style( 'slider', "$base_url/assets/css/slider.css", false, null, 'all' );

		wp_deregister_style( 'grid' );
		wp_enqueue_style( 'grid', "$base_url/assets/css/grid.css", false, null, 'all' );

		wp_deregister_style( 'single' );
		wp_enqueue_style( 'single', "$base_url/assets/css/single.css", false, null, 'all' );

		wp_deregister_style( 'index' );
		wp_enqueue_style( 'index', "$base_url/assets/css/index.css", false, null, 'all' );

		// -- END:STYLES
	}
}


/*
 * FEATURED POSTS
 * ==============
 *
 * https://smallenvelop.com/how-to-create-featured-posts-in-wordpress/
 * https://github.com/lesterchan/wp-postviews/blob/master/wp-postviews.php
 *
 * https://gist.github.com/Kevinlearynet/3852648
 */

/**
 * Check if given post is currently featured.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 *
 * @return bool
 */
function atomo_is_featured_post( $post_id, array $args = null ): bool {
	$meta_key = $args['meta_key'] ?? 'atomo_post_featured';

	$var = get_post_meta( $post_id, $meta_key, true );
	if ( empty( $var ) ) {
		return false;
	}

	return 0 < intval( $val );
}


add_action( 'add_meta_boxes', 'atomo_custom_meta_boxes' );

/**
 * Setup meta boxes specific to Átomo functionality.
 */
function atomo_custom_meta_boxes() {

    add_meta_box( 'atomo_featured_post',
				   __( 'Featured Post', 'atomo' ),
				  'atomo_featured_post_metabox',
				  'post',
			   	  'side',
			      'high' );
}

function atomo_featured_post_metabox( WP_Post $post ) {

	$meta_key = 'atomo_post_featured';
	$value = get_post_meta( $post->ID, $meta_key, true );

	$checked = $value == 'yes' ? ' checked' : '';
	$title =  __( 'Feature this post?', 'atomo' );

	$label = sprintf( '<label class="components-checkbox-control__label" for="%s">%s</label>',
					  esc_attr( $meta_key ), esc_html( $title ) );
	$input = sprintf( '<input class="components-checkbox-control__input" type="checkbox" name="feature-post" id="%s" value="yes"%s>',
					  esc_attr( $meta_key ), $checked );
	$field = sprintf( '<div class="components-base-control__field">%s %s</div>',
	 				  $label, $input );

	$group = sprintf( '<div class="components-base-control">%s</div>',
  	                  $field );

	wp_nonce_field('atomo_featured_post', 'atomo_featured_post_nonce');
	echo $group;
}


add_action( 'save_post', 'atomo_save_post_meta' );

/**
 * Save custom post metadata from input.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 *
 * @return bool|int Either ID of newly created instance, or OK flag.
 */
function atomo_save_post_meta( $post_id, array $args = null ) {

	if ( wp_is_post_autosave( $post_id ) ) {
		return;
	}

	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( ! isset( $_POST['atomo_featured_post_nonce'] ) ) {
		return;
	}

	if ( ! check_admin_referer( 'atomo_featured_post', 'atomo_featured_post_nonce' ) ) {
		error_log( 'Invalid nonce' . $_POST['atomo_featured_post_nonce'] );
		return;
	}

	if ( $_POST['post_type'] != 'post' ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		error_log( 'Missing permission to edit post: ' . $post_id );
		return;
	}

	/*  FEATURED POSTS  */
	$meta_key = $args['meta_key'] ?? 'atomo_post_featured';
	$form_key = $args['form_key'] ?? 'feature-post';

	if ( isset( $_POST['meta-checkbox'] ) ) {
		$value = 'yes';
	} else
	if ( isset( $_POST[$form_key] ) ) {
		$value = 'yes';
	} else {
		$value = '';
	}

	// XXX Ideally we want some sort of timestamp here.
	update_post_meta( $post_id, $meta_key, $value );
}


//  POST VIEWS COUNT  //


/**
 * Fetch current number of tracked post views.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 *
 * @return null|int             Either a positive `int` value
 *                              or `null` if given post has no count.
 */
function atomo_get_post_views( $post_id ): ?int {
	$meta_key = 'atomo_post_views_count';

	$var = get_post_meta( $post_id, $meta_key, true );
	if ( $var == '' ) {
		return null;
	}

	return intval( $var );
}


/**
 * Increment per-post view count in metadata.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 *
 * @return int                  Total view count for given post.
 */
function atomo_inc_post_views( $post_id ): int {
	$meta_key = 'atomo_post_views_count';

	$var = get_post_meta( $post_id, $meta_key, true );
	if ( $var == '' ) {
		$counter = 0;
		$deleted = delete_post_meta( $post_id, $meta_key );
		$created = add_post_meta( $post_id, $meta_key, '0' );
	} else {
		$counter = intval( $var ) + 1;
		$updated = update_post_meta( $post_id, $meta_key, $counter );
	}

	return $counter;
}

// To keep the count accurate, we disable prefetching here.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


/**
 * Update handler storing the current view count on page load.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 */
function atomo_track_post_views( $post_id ) {

	if ( ! is_singular() ) {
		return;
	}

	if ( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	atomo_inc_post_views( $post_id );
}

add_action( 'wp_head', 'atomo_track_post_views' );


require_once 'inc/bootstrap/wp_bootstrap4_pagination.php';
