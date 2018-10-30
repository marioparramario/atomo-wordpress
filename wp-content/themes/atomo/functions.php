<?php defined( 'ABSPATH' ) || die( 'Access denied' );
/**
 * Functions and constants for Átomo theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Atomo
 */

require_once __DIR__ . '/inc/pagination.php';
require_once __DIR__ . '/inc/post-types.php';
require_once __DIR__ . '/inc/taxonomies.php';


add_action( 'after_setup_theme', 'atomo_setup' );

if ( ! function_exists('atomo_setup') ) {
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
		$supported_formats = [
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		];

		add_theme_support( 'post-formats', $supported_formats );

		/*
		 * Add support for widget edit icons in customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		$nav_menus = [
			'primary' => __( 'Primary Menu', 'atomo' ),
			'social'  => __( 'Social Links Menu', 'atomo' ),
		];

		register_nav_menus( $nav_menus );

		/*
		 * Tweak common markup to utilize HTML5 features.
		 */

		$html5_elements = [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		];

		add_theme_support( 'html5', $html5_elements );
	}
}


/**
 * $content_width
 *
 * Have to have it, WP Theme Check says so:
 *
 * https://codex.wordpress.org/Content_Width
 */
if ( empty( $content_width ) ) {
	$content_width = 900;
}


add_action( 'init', 'atomo_init' );

if ( ! function_exists( 'atomo_init' ) ) {
	/**
	 * Initialize special-purpose page elements.
	 */
	function atomo_init() {
		/*
		 * Use categories and tags with attachments
		 */

		register_taxonomy_for_object_type( 'category', 'attachment' );
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );

		/*
		 * Custom taxonomy: `featured`
		 */

		// atomo_register_featured_taxonomy();
		// atomo_register_featured_terms();

		/*
		 * Custom Post Type: `slider`
		 */

		atomo_register_slider_post_type();  // XXX(fbnm): Unused by now, can be removed.
	}
}


add_action( 'widgets_init', 'atomo_widgets_init' );

if ( ! function_exists( 'atomo_widgets_init' ) ) {
	/** UNUSED */
	function atomo_widgets_init() {
		/* -- EMPTY -- */
	}
}


add_action( 'customize_register', 'atomo_customize_register' );

if ( ! function_exists( 'atomo_customize_register' ) ) {
	/** UNUSED */
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

		// wp_deregister_style( 'bootstrap' );
		// wp_enqueue_style( 'bootstrap', "$base_url/bootstrap/css/bootstrap.css", false, null, 'all' );

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

		wp_deregister_style( 'carousel' );
		wp_enqueue_style( 'carousel', "$base_url/assets/css/carousel.css", false, null, 'all' );

		wp_deregister_style( 'grid' );
		wp_enqueue_style( 'grid', "$base_url/assets/css/grid.css", false, null, 'all' );

		wp_deregister_style( 'single' );
		wp_enqueue_style( 'single', "$base_url/assets/css/single.css", false, null, 'all' );

		wp_deregister_style( 'index' );
		wp_enqueue_style( 'index', "$base_url/assets/css/index.css", false, null, 'all' );

		// -- END:STYLES
	}
}


add_filter( 'wpmem_login_redirect', 'atomo_login_redirect', 10, 2 );

/**
 * Redirect to front page after login.
 */
function atomo_login_redirect( $redirect_to, $user_id ) {

	if ( $redirect_to ) {
		return $redirect_to;
	}

	return home_url();
}


add_action( 'add_meta_boxes', 'atomo_custom_meta_boxes' );

if ( ! function_exists('atomo_custom_meta_boxes') ) {
	/**
	 * Setup meta boxes specific to Átomo functionality.
	 */
	function atomo_custom_meta_boxes() {

		add_meta_box(
			'atomo_featured_post',
			__( 'Featured Post', 'atomo' ),
			'atomo_featured_post_metabox',
			'post',
			'side',
			'high'
		);

		add_meta_box(
			'atomo_authored_post',
			__( 'Author', 'atomo' ),
			'atomo_author_metabox',
			'post',
			'side',
			'high'
		);

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

if ( ! defined('ATOMO_FEATURED_POST_TYPES')  ) {
	define( 'ATOMO_FEATURED_POST_TYPES', [ 'yes', 'primary', 'slider' ] );
}

if ( ! function_exists('atomo_featured_post') ) {
	/**
	 * Get featured post variant from meta-box.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param bool $strict (Optional) Assert feature type validity.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return string
	 */
	function atomo_featured_post( $post_id = null, bool $strict = false, array $args = null ) {
		$meta_key = $args['meta_key'] ?? 'atomo_post_featured';
		$choices  = $args['choices'] ?? ATOMO_FEATURED_POST_TYPES;

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) || $var === 'no' ) {
			return false;
		}

		if ( $strict && ! in_array( $var, $choices, true ) ) {
			return false;
		}

		return $var;
	}
}

if ( ! function_exists('atomo_is_featured_post') ) {
	/**
	 * Check if given post is currently featured.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param string $type (Optional) Specific feature type variant to check.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return bool
	 */
	function atomo_is_featured_post( $post_id = null, string $type = '*', array $args = null ): bool {
		$meta_key = $args['meta_key'] ?? 'atomo_post_featured';
		$choices  = $args['choices'] ?? ATOMO_FEATURED_POST_TYPES;

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) || $var === 'no' ) {
			return false;
		}

		if ( empty( $type ) ) {
			$type = '*';
		}

		if ( in_array( $type, $choices, true ) ) {
			return $var === $type;
		}

		return in_array( $var, $choices, true );
	}
}

if ( ! function_exists('atomo_featured_post_metabox') ) {
	/**
	 * Provide control interface for featured posts.
	 *
	 * @param WP_Post $post Post object to feature.
	 */
	function atomo_featured_post_metabox( WP_Post $post ) {

		$meta_key = 'atomo_post_featured';
		$value = get_post_meta( $post->ID, $meta_key, true );
		$out = '';

		wp_nonce_field('atomo_featured_post', 'atomo_featured_post_nonce');

		$checked = empty( $value ) ? ' checked' : '';

		$out .= '<div>';
		$out .= '  <label>';
		$out .= '    <span>' . __( 'Not featured', 'atomo' ) . '</span>';
		$out .= '    <input type="radio" name="feature-post" value=""' . $checked . '>';
		$out .= '  </label>';
		$out .= '</div>';

		$checked = 'yes' === $value ? ' checked' : '';

		$out .= '<div>';
		$out .= '  <label>';
		$out .= '    <span>' . __( 'Featured post', 'atomo' ) . '</span>';
		$out .= '    <input type="radio" name="feature-post" value="yes"' . $checked . '>';
		$out .= '  </label>';
		$out .= '</div>';

		$checked = 'primary' === $value ? ' checked' : '';

		$out .= '<div>';
		$out .= '  <label>';
		$out .= '    <span>' . __( 'Main featured post', 'atomo' ) . '</span>';
		$out .= '    <input type="radio" name="feature-post" value="primary"' . $checked . '>';
		$out .= '  </label>';
		$out .= '</div>';

		$checked = 'slider' === $value ? ' checked' : '';

		$out .= '<div>';
		$out .= '  <label>';
		$out .= '    <span>' . __( 'Feature in slider', 'atomo' ) . '</span>';
		$out .= '    <input type="radio" name="feature-post" value="slider"' . $checked . '>';
		$out .= '  </label>';
		$out .= '</div>';

		echo $out;
	}
}


add_action( 'save_post', 'atomo_save_post_meta' );

if ( ! function_exists('atomo_save_post_meta') ) {
	/**
	 * Save custom post metadata from input.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Parameters for wp_save_meta.
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

		if ( isset( $_POST[ $form_key ] ) ) {
			$value = trim( $_POST[ $form_key ] );
		} else {
			$value = '';
		}

		/*  ARTICLE AUTHOR  */
		$meta_key = $args['meta_key'] ?? 'atomo_post_author';
		$form_key = $args['form_key'] ?? 'post-author';

		if ( isset( $_POST[ $form_key ] ) ) {
			$value = trim( $_POST[ $form_key ] );
		} else {
			$value = '';
		}

		/*  ARTICLE AUTHOR DESIGNATION  */
		$meta_key = $args['meta_key'] ?? 'atomo_post_author_designation';
		$form_key = $args['form_key'] ?? 'post-author-designation';

		if ( isset( $_POST[ $form_key ] ) ) {
			$value = trim( $_POST[ $form_key ] );
		} else {
			$value = '';
		}

		/*  LOCATION  */
		$meta_key = $args['meta_key'] ?? 'atomo_post_location';
		$form_key = $args['form_key'] ?? 'post-author-location';

		if ( isset( $_POST[ $form_key ] ) ) {
			$value = trim( $_POST[ $form_key ] );
		} else {
			$value = '';
		}

		// XXX Ideally we want some sort of timestamp here.
		update_post_meta( $post_id, $meta_key, $value );
	}
}


/*  ===  AUTHOR  ===  */

if ( ! function_exists('atomo_post_author') ) {
	/**
	 * Get article's author
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return string
	 */
	function atomo_post_author( $post_id = null, array $args = null ): string {
		$meta_key = $args['meta_key'] ?? 'atomo_post_author';

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) ) {
			return '';
		}

		return $var;
	}
}

if ( ! function_exists('atomo_post_author_designation') ) {
	/**
	 * Get article author's designation.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return string
	 */
	function atomo_post_author_designation( $post_id = null, array $args = null ): string {
		$meta_key = $args['meta_key'] ?? 'atomo_post_author_designation';

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) ) {
			return '';
		}

		return $var;
	}
}

if ( ! function_exists('atomo_post_location') ) {
	/**
	 * Get article's posted location.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return string
	 */
	function atomo_post_location( $post_id = null, array $args = null ): string {
		$meta_key = $args['meta_key'] ?? 'atomo_post_location';

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) ) {
			return '';
		}

		return $var;
	}
}

if ( ! function_exists('atomo_author_metabox') ) {
	/**
	 * Provide control interface for marking of articles's authors.
	 *
	 * @param WP_Post $post Post object to feature.
	 */
	function atomo_author_metabox( WP_Post $post ) {
		$out = '';

		wp_nonce_field('atomo_author', 'atomo_author_nonce');

		$author = atomo_post_author( $post->ID );

		$out .= '<p>';
		$out .= '  <div><label for="atomo-post-author">' . __( 'Author of article', 'atomo' ) . '</label></div>';
		$out .= '  <input id="atomo-post-author" type="text" name="post-author" value="' . $author . '">';
		$out .= '</p>';

		$designation = atomo_post_author_designation( $post->ID );

		$out .= '<p>';
		$out .= '  <div><label class="form-check-label" for="atomo-post-author-designation">' . __( 'Author designation', 'atomo' ) . '</label></div>';
		$out .= '  <textarea id="atomo-post-author-designation" name="post-author-designation">' . $designation . '</textarea>';
		$out .= '</p>';

		$location = atomo_post_location( $post->ID );

		$out .= '<p>';
		$out .= '  <div><label for="atomo-post-location">' . __( 'Location', 'atomo' ) . '</label></div>';
		$out .= '  <textarea id="atomo-post-location" name="post-location">' . $location . '</textarea>';
		$out .= '</p>';

		$out .= '<input class="button button-primary button-large" type="submit" name="author-update" value="Update">';

		echo $out;
	}
}


/*  ===  POST VIEWS COUNT  ===  */


if ( ! function_exists('atomo_count_post_views') ) {
	/**
	 * Fetch current number of tracked post views.
	 *
	 * @param null|int|WP_Post $post_id (Optional) Post ID or post object.
	 * @param null|array $args (Optional) Alternative parameters.
	 *
	 * @return int Positive integral number or `0` if given post has no count yet.
	 */
	function atomo_count_post_views( $post_id = null, array $args = null ): int {
		$meta_key = $args['meta_key'] ?? 'atomo_post_views_count';

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) ) {
			return 0;
		}

		return intval( $var );
	}
}

if ( ! function_exists('atomo_has_post_views') ) {
	/**
	 * Check if given post has had any views yet.
	 *
	 * @param null|int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return bool
	 */
	function atomo_has_post_views( $post_id = null, array $args = null ): bool {
		$meta_key = $args['meta_key'] ?? 'atomo_post_views_count';

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( empty( $var ) ) {
			return false;
		}

		return intval( $var ) > 0;
	}
}

if ( ! function_exists('atomo_reset_post_views') ) {
	/**
	 * Reset per-post view count to zero.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param int $count (Optional) Initial number of views.
	 * @param array $args (Optional) Alternative parameters.
	 */
	function atomo_reset_post_views( $post_id, int $count = 0, array $args = null ) {
		$meta_key = $args['meta_key'] ?? 'atomo_post_views_count';

		if ( empty( $count ) ) {
			$count = 0;
		}

		if ( $count < 0 ) {
			throw new OutOfRangeException('Initial view count cannot be negative');
		}

		update_post_meta( $post_id, $meta_key, $count );
	}
}

if ( ! function_exists('atomo_inc_post_views') ) {
	/**
	 * Increment per-post view count in metadata.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 *
	 * @return int Total view count for given post.
	 */
	function atomo_inc_post_views( $post_id, array $args = null ): int {
		$meta_key = $args['meta_key'] ?? 'atomo_post_views_count';

		$var = get_post_meta( $post_id, $meta_key, true );
		if ( $var === '' ) {
			$counter = 0;
			$deleted = delete_post_meta( $post_id, $meta_key );
			$created = add_post_meta( $post_id, $meta_key, '0' );
		} else {
			$counter = intval( $var ) + 1;
			$updated = update_post_meta( $post_id, $meta_key, $counter );
		}

		return $counter;
	}
}

// To keep the count accurate, we disable prefetching here.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


if ( ! function_exists('atomo_track_post_views') ) {
	/**
	 * Update handler storing the current view count on page load.
	 *
	 * @param int|WP_Post $post_id  Post ID or post object.
	 * @param array $args (Optional) Alternative parameters.
	 */
	function atomo_track_post_views( $post_id, array $args = null ) {

		if ( ! is_singular() ) {
			return;
		}

		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}

		atomo_inc_post_views( $post_id, $args );
	}
}

add_action( 'wp_head', 'atomo_track_post_views' );

add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}



/**
 * Social media share buttons
 */
function wcr_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include( locate_template('share-template.php', false, false) );
}
