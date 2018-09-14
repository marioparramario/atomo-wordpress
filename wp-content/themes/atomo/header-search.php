<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="author" content="">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>
</head>
<body class="<?php echo implode(' ', get_body_class()); ?>">

  <nav class="flex justify-between navbar-wrapper">
    <div class="align-center d-flex flex">
      <a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </div>
    <div class="flex align-center">
      <?php get_search_form( true ); ?>
      <a class="open-menu"><?php _e( 'Categoríes', 'atomo' ); ?><!-- Categorias --></a>
    </div>
    <div class="navbar-mobile">
      <?php wp_list_categories( array() ); ?>
    </div>
  </nav>

  <main>
