<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<nav class="nav-init flex vertical center justify-start">
		<div class="nav-init-container top flex justify-between align-center">
			<a class="nav-init-iso" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso-black.svg" alt="">
			</a>
			<a class="nav-init-logo flex-center" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-atomo.svg" alt="">
			</a>
			<div class="nav-init-button init flex vertical align-end">
				<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>"><?php _e( 'Suscríbete', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/search' ) ); ?>"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
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
				<a href="<?php echo esc_url( home_url( '/category/entrevistas/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
			</div>
			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/category/ficcion/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
			</div>
			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/category/cartas-ensayos/' ) ); ?>"><?php _e( 'Cartas y ensayos', 'atomo' ); ?></a>
			</div>
			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/category/poesia/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
			</div>
			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/category/arte-fotografia/' ) ); ?>"><?php _e( 'Arte y fotografía', 'atomo' ); ?></a>
			</div>

			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
			</div>
			<div class="nav-init-item">
				<a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">Nosotros</a>
			</div>
		</div>
	</nav>

	<nav class="navbar" id="navbar">
		<div class="navbar-wrapper flex align-center justify-between">
			<a class="navbar-logo" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso.svg" alt="">
			</a>
			<div class="navbar-container flex">
				<a href="<?php echo esc_url( home_url( '/category/entrevistas/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/ficcion/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/cartas-ensayos/' ) ); ?>"><?php _e( 'Cartas y ensayos', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/poesia/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/arte-fotografia/' ) ); ?>"><?php _e( 'Arte y fotografía', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
				<a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">Nosotros</a>
			</div>
			<a class="navbar-menu-button">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
	</nav>

	<nav class="nav-lateral flex justify-between" id="lateral">
		<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>"><?php _e( 'Suscríbete', 'atomo' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/search' ) ); ?>"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
	</nav>

	<main class="main">
