<?php

/*
 * Atomo Page Header
 *
 * @package      WordPress
 * @subpackage   atomo
 */

$logo_id = get_theme_mod( 'custom_logo' );
$logo_image = wp_get_attachment_image_src( $logo_id, 'full' );

$home_url = esc_url( home_url() );
$theme_url = esc_url( get_template_directory_uri() );
$assets_url = $theme_url . '/assets';

?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="author" content="Mario Parra">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <nav id="site-nav" class="nav-init flex vertical center justify-start">
    <div class="nav-init-container top flex justify-between align-center">
      <a class="nav-init-iso" href="<?php echo $home_url; ?>">
        <img src="<?php echo "$assets_url/images/logo-iso-black.svg"; ?>" alt="Átomo Circular Logo">
      </a>
      <a class="nav-init-logo flex-center" href="<?php echo $home_url; ?>">
        <img src="<?php echo "$assets_url/images/logo-atomo.svg"; ?>" alt="Átomo Logo">
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
        <a href="<?php echo home_url('category/entrevistas'); ?>">
		  Entrevistas
	    </a>
      </div>
      <div class="nav-init-item">
        <a href="<?php echo home_url('category/ficcion/'); ?>">
		  Ficción
	    </a>
      </div>
      <div class="nav-init-item">
        <a href="<?php echo home_url('category/cartas-ensayos/'); ?>">
		  Cartas y ensayos
	    </a>
      </div>
      <div class="nav-init-item">
        <a href="<?php echo home_url('category/poesia/'); ?>">
		  Poesía
	    </a>
      </div>
      <div class="nav-init-item">
        <a href="<?php echo home_url('category/arte-fotografia/'); ?>">
		  Arte y fotografía
	    </a>
      </div>

      <div class="nav-init-item">
        <a href="#">Ediciones</a>
      </div>
      <div class="nav-init-item">
        <a href="#">Nosotros</a>
      </div>
    </div>
  </nav><!-- #site-nav -->

  <nav id="site-navbar" class="navbar" id="navbar">
    <div class="navbar-wrapper flex align-center justify-between">
      <a class="navbar-logo" href="<?php echo $home_url; ?>">
        <img src="<?php echo "$assets_url/images/logo-iso.svg"; ?>" alt="Átomo Circular Logo">
      </a>
      <div class="navbar-container flex">
        <a href="<?php echo esc_url( home_url('category/entrevistas/') ); ?>">
          Entrevistas
        </a>
        <a href="<?php echo esc_url( home_url('category/ficcion/') ); ?>">
          Ficción
        </a>
        <a href="<?php echo esc_url( home_url('category/cartas-ensayos/') ); ?>">
          Cartas y ensayos
        </a>
        <a href="<?php echo esc_url( home_url('category/poesia/') ); ?>">
          Poesía
        </a>
        <a href="<?php echo esc_url( home_url('category/arte-fotografia/') ); ?>">
          Arte y fotografía
        </a>
        <a href="#">
          Ediciones
        </a>
        <a href="#">
          Nosotros
        </a>
      </div>
      <a class="navbar-menu-button">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
  </nav><!-- #site-navbar -->

  <nav id="lateral" class="nav-lateral flex justify-between">
    <a href="#">Suscríbete</a>
    <a href="#">Búsqueda</a>
  </nav><!-- #lateral -->

  <main class="main">
