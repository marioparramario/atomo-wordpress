<!doctype html>
<html <?php language_attributes(); ?>>
    <a href="">
        <head>
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Bootstrap core CSS -->
            <!-- Layout -->
            <!-- Layout -->
            <!-- Custom styles for this template -->
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
            <?php wp_head(); ?>
        </head>
    </a>
    <body class="<?php echo implode(' ', get_body_class()); ?>">
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <nav class="flex justify-between navbar-wrapper">
            <div class="flex align-center">
                <img class="logo-euro" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-euro.png" />
                <a href="<?php echo esc_url( home_url() ); ?>" class="home-link" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="flex align-center navbar-left">
                <?php get_search_form( true ); ?>
                <a class="open-menu">
                    <span class="category-text"><?php _e( 'Categorías', 'euroamerica-v3' ); ?></span>
                    <div class="menu-icon-mobile">
                        <span></span>
                    </div>
                </a>
            </div>
            <div class="navbar-mobile">
                <?php wp_list_categories( array() ); ?>
                <?php get_search_form( true ); ?>
            </div>
        </nav>
        <main>
