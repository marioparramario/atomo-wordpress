<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->
      <?php wp_head(); ?>
    </head>


    <body class="<?php echo implode(' ', get_body_class()); ?>">
      <nav class="nav-init flex vertical center justify-start">
        <div class="nav-init-container top flex justify-between align-center">
          <a class="nav-init-iso" href="#">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/web/logo-iso-black.svg" />
          </a>
          <a class="nav-init-logo flex-center" href="/">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/web/logo-atomo.svg"" />
          </a>
          <div class="nav-init-button init flex vertical align-end">
            <a class="" href="#">Suscríbete</a>
            <a class="" href="#">Búsqueda</a>
          </div>
          <div class="nav-init-button menu flex justify-end">
            <a class="navbar-menu-button">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
        </div>
        <div class="nav-init-container bottom flex justify-between">
          <div class="nav-init-item">
            <a href="#">Entrevistas</a>
          </div>
          <div class="nav-init-item">
            <a href="#">Ficción</a>
          </div>
          <div class="nav-init-item">
            <a href="#">Cartas y ensayos</a>
          </div>
          <div class="nav-init-item">
            <a href="#">Poesía</a>
          </div>
          <div class="nav-init-item">
            <a href="arte.html">Arte y fotografía</a>
          </div>
          <div class="nav-init-item">
            <a href="#">Ediciones</a>
          </div>
          <div class="nav-init-item">
            <a href="#">Nosotros</a>
          </div>
        </div>
      </nav>



      


<!--         
          <nav class="flex justify-between navbar-wrapper sticky">
              <div class="flex align-center">
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
          </nav> -->
