<?php

/**
 * Functions and constants for Átomo theme.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WordPress
 * @subpackage Atomo
 */

if ( ! function_exists( 'atomo_setup' ) ) {
	/*
	 * Set up `atomo` theme with all its subdivisions.
	 */
	function atomo_setup() {
		$base_dir = get_template_directory();

		/* Make theme available for translation */
		load_theme_textdomain( 'atomo', "$base_dir/languages" );

		/* Add default RSS feed links to posts and comments */
		add_theme_support( 'automatic-feed-links' );

		/* Manage page title dynamically via WordPress */
		add_theme_support( 'title-tag' );

		/* ´´post-thumbnails`` */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );

<<<<<<< HEAD
		register_nav_menus([
=======
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
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2
			'primary' => __( 'Primary Menu', 'atomo' ),
			'social'  => __( 'Social Links Menu', 'atomo' ),
		] );

		/* ``html5`` */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );
	}
}

<<<<<<< HEAD
		/* ``post-formats`` */
		add_theme_support( 'post-formats', [
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		] );
=======

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
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2
	}
}  /* !atomo_setup */

add_action( 'after_setup_theme', 'atomo_setup' );


if ( ! function_exists( 'atomo_init' ) ) {
	/*
	 * Initialize special-purpose page elements.
	 */
	function atomo_init() {
<<<<<<< HEAD

		/* Use categories and tags with attachments */
		register_taxonomy_for_object_type( 'category', 'attachment' );
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

		/* Register custom post types */
		register_post_type( 'slider', [
			'labels' => [
				'name' => __( 'Sliders', 'atomo' ),
				'singular_name' => __( 'Slider', 'atomo' )
			],
			'public' => true,
			'show_in_menu' => true,
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
		] );
=======
		/*
		 * Use categories and tags with attachments
		 */
		register_taxonomy_for_object_type( 'category', 'attachment' );
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

		atomo_register_slider_post_type();
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2
	}
}  /* !atomo_init */

add_action( 'init', 'atomo_init' );


if ( ! function_exists( 'atomo_widgets_init' ) ) {
	/* UNUSED */
	function atomo_widgets_init() {
		/* -- EMPTY -- */
	}
}  /* !atomo_widgets_init */

add_action( 'widgets_init', 'atomo_widgets_init' );


if ( ! function_exists( 'atomo_customize_register' ) ) {
	/* UNUSED */
	function atomo_customize_register( $wp_customize ) {
	    /* -- EMPTY -- */
	}
}  /* !atomo_customize_register */

add_action( 'customize_register', 'atomo_customize_register' );


add_action( 'wp_enqueue_scripts', 'atomo_enqueue_scripts' );

if ( ! function_exists( 'atomo_enqueue_scripts' ) ) {
<<<<<<< HEAD
    function atomo_enqueue_scripts( $base_url = null ) {
=======

    function atomo_enqueue_scripts() {
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2

		if ( ! $base_url ) {
			$base_url = get_template_directory_uri();
		}

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
<<<<<<< HEAD
 */

function atomo_meta_featured_callback( $post_id ) {
	$featured = get_post_meta( $post_id );
	$title = __( 'Featured this post', 'atomo' );
=======
 * https://github.com/lesterchan/wp-postviews/blob/master/wp-postviews.php
 *
 * https://gist.github.com/Kevinlearynet/3852648
 */

// function atomo_meta_featured_article( $post_id ) {
// 	$title = __( 'Featured this post', 'atomo' );
// 	$data = get_post_meta( $post_id );
//
// 	$meta_key = $meta_key ?: 'meta-checkbox';
// 	$meta = $data[ $meta_key ] ?? null;
// 	if ( $meta !== null ) {
// 		$checked = checked( $meta[0], 'yes', false );
// 	} else {
// 		$checked = '';
// 	}
//
// 	if ( isset ( $data[ 'meta-checkbox' ] ) ) {
// 		$checked = checked( $featured['meta-checkbox'][0], 'yes', false );
// 	} else {
// 		$checked = '';
// 	}
//
// 	$checkbox = $meta[ 'meta-checkbox' ] ?? '';
// 	$checked = checked( $checkbox[0], 'yes', false );
//
// 	var_dump( $checkbox );
// 	var_dump( $checked );
//
// 	if ( isset ( $featured['meta-checkbox'] ) ) {
// 		$checked = checked( $featured['meta-checkbox'][0], 'yes', false );
// 	} else {
// 		$checked = '';
// 	}
//
// 	echo <<<EOS
// <p>
//     <div class="sm-row-content">
//         <label for="meta-checkbox">
//             <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" {$checked} />
//             <span>{$checked}</span>
//         </label>
//     </div>
// </p>
// EOS;
// }


/**
 * Check if given post is currently featured.
 *
 * @param int|WP_Post $post_id  Post ID or post object.
 *
 * @return bool
 */
function atomo_is_featured_post( $post_id, array $args = null ): bool {
	$meta_key = $args['meta_key'] ?? 'atomo_post_featured';
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2

	if ( isset ( $featured['meta-checkbox'] ) ) {
		$checked = checked( $featured['meta-checkbox'][0], 'yes', false );
	} else {
		$checked = '';
	}

<<<<<<< HEAD
	echo <<<EOS
<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" {$checked} />
            <span>{$checked}</span>
        </label>
    </div>
</p>
EOS;
}

function atomo_custom_meta() {
    add_meta_box( 'atomo_meta', __( 'Featured Articles', 'atomo' ), 'atomo_meta_featured_callback', 'post' );
}

add_action( 'add_meta_boxes', 'atomo_custom_meta' );
=======
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
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2



/**
<<<<<<< HEAD
 * Saves the custom meta input
 */
function atomo_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = isset( $_POST[ 'sm_nonce' ] );
	if ( $is_valid_nonce ) {
		$is_valid_nonce = wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) );  // XXX: ? 'true' : 'false';
	}

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves
	if( isset( $_POST[ 'meta-checkbox' ] ) ) {
	    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
=======
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
		error_log( 'Missing nonce' . $_POST['atomo_featured_post_nonce'] );
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
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2
	} else {
	    update_post_meta( $post_id, 'meta-checkbox', '' );
	}

<<<<<<< HEAD
}

add_action( 'save_post', 'atomo_meta_save' );
=======
	// XXX Ideally we want some sort of timestamp here.
	update_post_meta( $post_id, $meta_key, $value );
}


//  POST VIEWS COUNT  //
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2


function atomo_set_post_views( $post_id ) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta( $post_id, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
	} else {
		$count++;
		update_post_meta( $post_id, $count_key, $count );
	}
}


// To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

function atomo_track_post_views( $post_id ) {
<<<<<<< HEAD
	if ( ! is_single() )
=======

	if ( ! is_singular() ) {
>>>>>>> 30118db8fbb92bd729fdf43270f4ca552ae136d2
		return;
	if ( empty( $post_id) ) {
		global $post;
		$post_id = $post->ID;
	}

	atomo_set_post_views( $post_id );
}

add_action( 'wp_head', 'atomo_track_post_views' );


require_once 'inc/bootstrap/wp_bootstrap4_pagination.php';
