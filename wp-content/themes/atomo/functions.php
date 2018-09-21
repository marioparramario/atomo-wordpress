<?php

/**
 * Functions and constants for Átomo theme.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WordPress
 * @subpackage Atomo
 */

if (!function_exists('atomo_setup')) {
	/*
	 * Set up `atomo` theme with all its subdivisions.
	 */
	function atomo_setup() {
		$base_dir = get_template_directory();
		load_theme_textdomain('atomo', "$base_dir/languages");

		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');

		/* ´´post-thumbnails`` */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(825, 510, true);

		register_nav_menus([
			'primary' => __('Primary Menu', 'atomo'),
			'social'  => __('Social Links Menu', 'atomo'),
		]);

		/* ``html5`` */
		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]);

		/* ``post-formats`` */
		add_theme_support('post-formats', [
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		]);
	}
}  /* !atomo_setup */

add_action('after_setup_theme', 'atomo_setup');


if (!function_exists('atomo_init')) {
	/*
	 * Initialize special-purpose page elements.
	 */
	function atomo_init() {

		/* Use categories and tags with attachments */
		register_taxonomy_for_object_type('category', 'attachment');
		register_taxonomy_for_object_type('post_tag', 'attachment');

		/* Register custom post types */
		register_post_type('slider', [
			'labels' => [
				'name' => __('Sliders', 'atomo'),
				'singular_name' => __('Slider', 'atomo')
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
		]);
	}
}  /* !atomo_init */

add_action('init', 'atomo_init');


if (!function_exists('atomo_widgets_init')) {
	/* UNUSED */
	function atomo_widgets_init() {
		/* -- EMPTY -- */
	}
}  /* !atomo_widgets_init */

add_action('widgets_init', 'atomo_widgets_init');


if (!function_exists('atomo_customize_register')) {
	/* UNUSED */
	function atomo_customize_register(WP_Customize_Manager $wp_customize) {
	    /* -- EMPTY -- */
	}
}  /* !atomo_customize_register */

add_action('customize_register', 'atomo_customize_register');


if (!function_exists('atomo_enqueue_scripts')) {
    function atomo_enqueue_scripts($base_url = null) {

		if (!$base_url) {
			$base_url = get_template_directory_uri();
		}

		// -- BEGIN:SCRIPTS

		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', "$base_url/assets/js/jquery.min.js", false, null, true);

		wp_deregister_script('popper');
		wp_enqueue_script('popper', "$base_url/assets/js/popper.js", false, null, true);

		wp_deregister_script('bootstrap');
		wp_enqueue_script('bootstrap', "$base_url/bootstrap/js/bootstrap.min.js", false, null, true);

		wp_deregister_script('ieviewportbugworkaround');
		wp_enqueue_script('ieviewportbugworkaround', "$base_url/assets/js/ie10-viewport-bug-workaround.js", false, null, true);

		wp_deregister_script('index');
		wp_enqueue_script('index', "$base_url/assets/js/index.js", false, null, true);

		wp_deregister_script('functions');
		wp_enqueue_script('functions', "$base_url/assets/js/functions.js", false, null, true);

		// -- END:SCRIPTS


		// -- BEGIN:STYLES

		wp_deregister_style('normalize' );
		wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css', false, null, 'all');

		wp_deregister_style('bootstrap');
		wp_enqueue_style('bootstrap', "$base_url/bootstrap/css/bootstrap.css", false, null, 'all');

		wp_deregister_style('font');
		wp_enqueue_style('font', "$base_url/css/font.css", false, null, 'all');

		wp_deregister_style('layout');
		wp_enqueue_style('layout', "$base_url/css/layout.css", false, null, 'all');

		wp_deregister_style('style');
		wp_enqueue_style('style', get_bloginfo('stylesheet_url'), false, null, 'all');

		wp_deregister_style('fonts');
		wp_enqueue_style('fonts', "$base_url/assets/css/fonts.css", false, null, 'all');

		wp_deregister_style('layout');
		wp_enqueue_style('layout', "$base_url/assets/css/layout.css", false, null, 'all');

		wp_deregister_style('navbar');
		wp_enqueue_style('navbar', "$base_url/assets/css/navbar.css", false, null, 'all');

		wp_deregister_style('footer');
		wp_enqueue_style('footer', "$base_url/assets/css/footer.css", false, null, 'all');

		wp_deregister_style('slider');
		wp_enqueue_style('slider', "$base_url/assets/css/slider.css", false, null, 'all');

		wp_deregister_style('grid');
		wp_enqueue_style('grid', "$base_url/assets/css/grid.css", false, null, 'all');

		wp_deregister_style('single');
		wp_enqueue_style('single', "$base_url/assets/css/single.css", false, null, 'all');

		wp_deregister_style('index');
		wp_enqueue_style('index', "$base_url/assets/css/index.css", false, null, 'all');

		// -- END:STYLES
	}

	add_action('wp_enqueue_scripts', 'atomo_enqueue_scripts');
}


/*
 * FEATURED POSTS
 * ==============
 *
 * https://smallenvelop.com/how-to-create-featured-posts-in-wordpress/
 */

function sm_meta_featured_callback( $post_id ) {
	$featured = get_post_meta( $post_id );
	$title = _e( 'Featured this post', 'atomo');

	if ( isset ( $featured['meta-checkbox'] ) ) {
		$checked = checked( $featured['meta-checkbox'][0], 'yes', false );
	} else {
		$checked = '';
	}

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

function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'atomo' ), 'sm_meta_featured_callback', 'post' );
}

add_action( 'add_meta_boxes', 'sm_custom_meta' );



/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves
	if( isset( $_POST[ 'meta-checkbox' ] ) ) {
	    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
	} else {
	    update_post_meta( $post_id, 'meta-checkbox', '' );
	}

}
add_action( 'save_post', 'sm_meta_save' );


function wpb_set_post_views($postID) {
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


// To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
	if ( !is_single() )
		return;
	if ( empty ( $post_id) ) {
		global $post;
		$post_id = $post->ID;
	}

	wpb_set_post_views($post_id);
}

add_action( 'wp_head', 'wpb_track_post_views');


require_once 'inc/bootstrap/wp_bootstrap4_pagination.php';
