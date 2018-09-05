<?php
if ( ! function_exists( 'atomo_setup' ) ) :

function atomo_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'euroamerica-v3', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'atomo' ),
        'social'  => __( 'Social Links Menu', 'atomo' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // atomo_setup

add_action( 'after_setup_theme', 'atomo_setup' );


if ( ! function_exists( 'atomo_init' ) ) :

function atomo_init() {


    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    register_post_type('slider', array(
        'labels' =>
            array(
                'name' => __( 'Sliders', 'euroamerica-v3' ),
                'singular_name' => __( 'Slider', 'euroamerica-v3' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'show_in_menu' => true
    ));

    register_post_type('slider', array(
        'labels' =>
            array(
                'name' => __( 'Sliders', 'euroamerica-v3' ),
                'singular_name' => __( 'Slider', 'euroamerica-v3' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        'show_in_menu' => true
    ));

    /* Pinegrow generated Custom Post Types End */

    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // atomo_setup

add_action( 'init', 'atomo_init' );


if ( ! function_exists( 'atomo_widgets_init' ) ) :

function atomo_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'atomo_widgets_init' );
endif;// atomo_widgets_init



if ( ! function_exists( 'atomo_customize_register' ) ) :

function atomo_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'atomo_customize_register' );
endif;// atomo_customize_register


if ( ! function_exists( 'atomo_enqueue_scripts' ) ) :
    function atomo_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    // wp_deregister_script( 'jquery' );
    // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);

    // wp_deregister_script( 'popper' );
    // wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js', false, null, true);

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);

    wp_deregister_script( 'popper' );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', false, null, true);


    wp_deregister_script( 'ieviewportbugworkaround' );
    wp_enqueue_script( 'ieviewportbugworkaround', get_template_directory_uri() . '/assets/js/ie10-viewport-bug-workaround.js', false, null, true);

    wp_deregister_script( 'functions' );
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'normalize' );
    wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css', false, null, 'all');

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null, 'all');


    wp_deregister_style( 'fonts' );
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css', false, null, 'all');

    wp_deregister_style( 'layout' );
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css', false, null, 'all');

    wp_deregister_style( 'navbar' );
    wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/navbar.css', false, null, 'all');

    wp_deregister_style( 'footer' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/css/footer.css', false, null, 'all');

    wp_deregister_style( 'slider' );
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/slider.css', false, null, 'all');

    wp_deregister_style( 'grid' );
    wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css', false, null, 'all');

    wp_deregister_style( 'single' );
    wp_enqueue_style( 'single', get_template_directory_uri() . '/assets/css/single.css', false, null, 'all');

    wp_deregister_style( 'index' );
    wp_enqueue_style( 'index', get_template_directory_uri() . '/assets/css/index.css', false, null, 'all');


    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'atomo_enqueue_scripts' );
endif;

/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
// require_once "inc/bootstrap/wp_bootstrap4_pagination.php";
    /* Pinegrow generated Include Resources End */

    /*=============================================
    =            BREADCRUMBS			            =
    =============================================*/

    //  to include in functions.php
    function the_breadcrumb() {

        $sep = ' / ';

        if (!is_front_page()) {

    	// Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            bloginfo('name');
            echo '</a>' . $sep;

    	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }

    	// If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }

    	// If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }

    	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) {
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }

            echo '</div>';
        }
    }

    function wpb_set_post_views($postID) {
      $count_key = 'wpb_post_views_count';
      $count = get_post_meta($postID, $count_key, true);
      if($count==''){
          $count = 0;
          delete_post_meta($postID, $count_key);
          add_post_meta($postID, $count_key, '0');
      }else{
          $count++;
          update_post_meta($postID, $count_key, $count);
      }
  }
  //To keep the count accurate, lets get rid of prefetching
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');
?>
