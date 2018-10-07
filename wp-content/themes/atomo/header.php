<!DOCTYPE html>
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
<body <?php body_class(); ?>>
	<nav class="navbar-init flex vertical center justify-start">
		<div class="navbar-init-container top flex justify-between align-center">
			<a class="navbar-init-iso" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso-black.svg" alt="">
			</a>
			<a class="navbar-init-logo flex-center" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-atomo.svg" alt="">
			</a>
			<div class="navbar-init-button init flex vertical align-end">
				<div class="navbar-init-button-lang flex align-center">
					<a class="active" href="#"><?php _e( 'ES', 'atomo' ); ?></a>
					<div class="separator"></div>
					<a class="" href="#"><?php _e( 'EN', 'atomo' ); ?></a>
				</div>
				<a class="log-in" href="#"><?php _e( 'Log in', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-button menu flex justify-end">
				<a class="navbar-menu-button">
					<span></span>
					<span></span>
					<span></span>
				</a>
			</div>
		</div>
		<div class="navbar-init-container bottom flex align-center justify-between">
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/entrevistas/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/ficcion/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/cartas-ensayos/' ) ); ?>"><?php _e( 'Cartas y ensayos', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/poesia/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/arte-fotografia/' ) ); ?>"><?php _e( 'Arte y fotografía', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-separator"></div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
			</div>
			<div class="navbar-init-item">
				<a class="search-button" href="#"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>">Suscríbete</a>
			</div>
		</div>
	</nav>

	<nav class="navbar flex align-center justify-between" id="navbar">
		<a class="navbar-logo" href="<?php echo esc_url( home_url() ); ?>" rel="home">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso.svg" alt="">
		</a>
		<div class="navbar-wrapper flex vertical align-end">
			<div class="navbar-button init flex align-center self-end">
				<div class="navbar-button-lang flex align-center">
					<a class="active" href="#"><?php _e( 'ES', 'atomo' ); ?></a>
					<div class="separator"></div>
					<a class="" href="#"><?php _e( 'EN', 'atomo' ); ?></a>
				</div>
				<a class="log-in" href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>"><?php _e( 'Log in', 'atomo' ); ?></a>
			</div>

			<div class="navbar-container flex align-center">
				<a href="<?php echo esc_url( home_url( '/category/entrevistas/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/ficcion/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/cartas-ensayos/' ) ); ?>"><?php _e( 'Cartas y ensayos', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/poesia/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/arte-fotografia/' ) ); ?>"><?php _e( 'Arte y fotografía', 'atomo' ); ?></a>
				<div class="separator"></div>
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
				<a href="#"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>">Suscríbete</a>
			</div>
			<a class="navbar-menu-button">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
	</nav>
	<nav class="navbar-mobile flex-center">
		<div class="navbar-mobile-wrapper flex-center">
			<div class="navbar-mobile-content flex vertical">
				<a href="<?php echo esc_url( home_url( '/category/entrevistas/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/ficcion/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/cartas-ensayos/' ) ); ?>"><?php _e( 'Cartas y ensayos', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/poesia/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/arte-fotografia/' ) ); ?>"><?php _e( 'Arte y fotografía', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
			</div>
			<div class="separator"></div>
			<div class="navbar-mobile-content flex vertical">
				<div class="navbar-mobile-lang flex align-center">
					<a class="active" href="#"><?php _e( 'ES', 'atomo' ); ?></a>
					<div class="separator lang"></div>
					<a class="" href="#"><?php _e( 'EN', 'atomo' ); ?></a>
				</div>
				<div class="navbar-mobile-button flex">
					<a href="#">Log in</a>
					<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>">Suscríbete</a>
				</div>
				<?php get_search_form( true ); ?>

			</div>


		</div>

	</nav>

	<div class="search search-wrapper flex-center">
		<div class="search-container flex-center">
			<?php get_search_form( true ); ?>
		</div>

	</div>

	<main class="main">
