<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<nav class="navbar-init flex vertical center justify-start">
		<div class="navbar-init-container top flex justify-between align-center">
			<a class="navbar-init-iso" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso-black.svg" alt="Átomo">
			</a>
			<a class="navbar-init-logo flex-center" href="<?php echo esc_url( home_url() ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-atomo.svg" alt="Átomo">
			</a>
			<div class="navbar-init-button init flex vertical align-end">
				<div class="navbar-init-button-lang flex align-center">
					<a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a>
					<div class="separator"></div>
					<a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a>
				</div>
				<a class="login" href="#"><?php _e( 'Log in', 'atomo' ); ?></a>
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
				<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos Á', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/interviews/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/category/books/' ) ); ?>"><?php _e( 'Libros', 'atomo' ); ?></a>
			</div>
			<div class="navbar-init-item dropdown">
				<a href="<?php echo esc_url( home_url( '/category/chronicle-others/' ) ); ?>"><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
				<div class="sub-menu flex vertical align-start">
					<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
				</div>

			</div>
			<div class="navbar-init-item dropdown">
				<a href="<?php echo esc_url( home_url( '/category/music/' ) ); ?>"><?php _e( 'Música', 'atomo' ); ?></a>
				<div class="sub-menu flex vertical align-start">
					<a href="<?php echo esc_url( home_url( '/category/classic/' ) ); ?>"><?php _e( 'Música Clásica', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/jazz/' ) ); ?>"><?php _e( 'Jazz', 'atomo' ); ?></a>
				</div>
			</div>
			<div class="navbar-init-separator"></div>
			<div class="navbar-init-item">
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
			</div>
			<div class="navbar-init-item">
				<a class="search-button" href="<?php echo esc_url( home_url( '/search' ) ); ?>"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
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
					<a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a>
					<div class="separator"></div>
					<a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a>
				</div>
				<a class="login" href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>"><?php _e( 'Log in', 'atomo' ); ?></a>
			</div>

			<div class="navbar-container flex align-center">
				<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos Á', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/interviews/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/books/' ) ); ?>"><?php _e( 'Libros', 'atomo' ); ?></a>

				<div class="navbar-init-item dropdown">
					<a href="<?php echo esc_url( home_url( '/category/chronicle-others/' ) ); ?>"><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
					</div>

				</div>
				<div class="navbar-init-item dropdown">
					<a href="<?php echo esc_url( home_url( '/category/music/' ) ); ?>"><?php _e( 'Música', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/classic/' ) ); ?>"><?php _e( 'Música Clásica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/jazz/' ) ); ?>"><?php _e( 'Jazz', 'atomo' ); ?></a>
					</div>
				</div>




				<div class="separator"></div>

				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
				<a href="<?php echo esc_url( home_url( '/search' ) ); ?>">Búsqueda</a>
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
				<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos Á', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/interviews/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/books/' ) ); ?>"><?php _e( 'Libros', 'atomo' ); ?></a>
				<div class="navbar-init-item dropdown">
					<a href="<?php echo esc_url( home_url( '/category/chronicle-others/' ) ); ?>"><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
					</div>

				</div>
				<div class="navbar-init-item dropdown">
					<a href="<?php echo esc_url( home_url( '/category/music/' ) ); ?>"><?php _e( 'Música', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/classic/' ) ); ?>"><?php _e( 'Música Clásica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/jazz/' ) ); ?>"><?php _e( 'Jazz', 'atomo' ); ?></a>
					</div>
				</div>
				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>">Ediciones</a>
			</div>
			<div class="separator"></div>
			<div class="navbar-mobile-content flex vertical">
				<div class="navbar-mobile-lang flex align-center">
					<a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a>
					<div class="separator lang"></div>
					<a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a>
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
