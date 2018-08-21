<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>           
  <body class="body <?php echo implode(' ', get_body_class()); ?>">
    <div class="loader"></div>


    <nav class="nav-init flex vertical center justify-start">
      <div class="nav-init-container top flex justify-between align-center">
        <a class="nav-init-iso" href="#">
          <img src="images/web/logo-iso-black.svg" alt="">
        </a>
        <a class="nav-init-logo flex-center" href="/">
          <img src="images/web/logo-atomo.svg" alt="">
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
      </div>
    </nav>


    
    <nav class="navbar" id="navbar">
      <div class="navbar-wrapper flex align-center justify-between">
        <a class="navbar-logo" href="/">
          <img src="images/web/logo-iso.svg" alt="">
        </a>
        <div class="navbar-container flex">
          <a href="#">Entrevistas</a>
        </div>
        <a class="navbar-menu-button">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </nav>
    <nav class="nav-lateral flex justify-between" id="lateral">
      <a href="#">Suscríbete</a>
      <a href="#">Búsqueda</a>
    </nav>
    <nav class="navbar-menu flex-center" id="navbar-menu">
      <div class="navbar-menu-container flex vertical">
          <a class="class" href="#">Entrevistas</a>
          <a class="class" href="single.html">Ficción</a>
          <a class="class" href="#">Cartas y ensayos</a>
          <a class="class" href="#">Poesía</a>
          <a class="class" href="arte.html">Arte y fotografía</a>
          <a class="class" href="#">Ediciones</a>
          <a class="class" href="#">Nosotros</a>
      </div>
    </nav>

