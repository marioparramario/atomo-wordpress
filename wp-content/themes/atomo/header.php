<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/atomo-icon.png" />
	<!-- <link rel="shortcut icon" type="image/png" href="./assets/images/atomo-icon.png"> -->

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
					<!-- <a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a> -->
					<a class="lang-link active" rel="alternate"><abbr title="Español">ES</abbr></a>
					<div class="separator"></div>
					<!-- <a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a> -->
						<a class="lang-link" rel="alternate"><abbr title="English">EN</abbr></a>
				</div>
			<!-- <?php if ( is_user_logged_in() ): ?>
				<a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log out', 'atomo' ); ?></a>
			<?php else: ?> -->
				<a class="login"><?php _e( 'Inicio', 'atomo' ); ?></a>
			<!-- <?php endif; ?> -->
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
				<a><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
				<div class="sub-menu flex vertical align-start">
					<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/fiction/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
				</div>

			</div>
			<div class="navbar-init-item dropdown">
				<a><?php _e( 'Música', 'atomo' ); ?></a>
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
				<a class="search-button"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
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
					<!-- <a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a> -->
					<a class="lang-link active" rel="alternate"><abbr title="Español">ES</abbr></a>
					<div class="separator"></div>
					<!-- <a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a> -->
					<a class="lang-link" rel="alternate"><abbr title="English">EN</abbr></a>
				</div>
				<!-- <a class="login" href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>"><?php _e( 'Inicio', 'atomo' ); ?></a> -->
				<a class="login"><?php _e( 'Inicio', 'atomo' ); ?></a>
			</div>

			<div class="navbar-container flex align-center">
				<a href="<?php echo esc_url( home_url( '/category/essays/' ) ); ?>"><?php _e( 'Ensayos Á', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/interviews/' ) ); ?>"><?php _e( 'Entrevistas', 'atomo' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/category/books/' ) ); ?>"><?php _e( 'Libros', 'atomo' ); ?></a>

				<div class="navbar-init-item dropdown">
					<a><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/fiction/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
					</div>

				</div>
				<div class="navbar-init-item dropdown">
					<a><?php _e( 'Música', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/classic/' ) ); ?>"><?php _e( 'Música Clásica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/jazz/' ) ); ?>"><?php _e( 'Jazz', 'atomo' ); ?></a>
					</div>
				</div>




				<div class="separator"></div>

				<a href="<?php echo esc_url( home_url( '/issues' ) ); ?>"><?php _e( 'Ediciones', 'atomo' ); ?></a>
				<a class="search-button"><?php _e( 'Búsqueda', 'atomo' ); ?></a>
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
					<a><?php _e( 'Crónica y otros', 'atomo' ); ?></a>
					<div class="sub-menu flex vertical align-start">
						<a href="<?php echo esc_url( home_url( '/category/chronic/' ) ); ?>"><?php _e( 'Crónica', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/poetry/' ) ); ?>"><?php _e( 'Poesía', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/fiction/' ) ); ?>"><?php _e( 'Ficción', 'atomo' ); ?></a>
						<a href="<?php echo esc_url( home_url( '/category/visual-arts/' ) ); ?>"><?php _e( 'Artes visuales', 'atomo' ); ?></a>
					</div>

				</div>
				<div class="navbar-init-item dropdown">
					<a><?php _e( 'Música', 'atomo' ); ?></a>
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
					<!-- <a class="lang-link active" href="#spanish" rel="alternate" hreflang="es"><abbr title="Español">ES</abbr></a> -->
					<a class="lang-link active" rel="alternate" ><abbr title="Español">ES</abbr></a>
					<div class="separator lang"></div>
					<!-- <a class="lang-link" href="#english" rel="alternate" hreflang="en"><abbr title="English">EN</abbr></a> -->
					<a class="lang-link" rel="alternate"><abbr title="English">EN</abbr></a>

				</div>
				<div class="navbar-mobile-button flex">
				<!-- <?php if ( is_user_logged_in() ): ?>
					<a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log out', 'atomo' ); ?></a>
				<?php else : ?>
					<a class="login" href="#"><?php _e( 'Inicio', 'atomo' ); ?></a>
				<?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/subscribe' ) ); ?>">Suscríbete</a> -->
					<a class="login"><?php _e( 'Inicio', 'atomo' ); ?></a>
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

	<?php if ( is_user_logged_in() ) : ?>
	<div class="log-out flex-center">
		<div class="log-out-container flex vertical">
			<a class="logout logout-link" href="<?php echo wp_logout_url( home_url() ); ?>"></a>
		</div>
	</div><!-- .log-out -->
<?php else : ?>
	<div class="log-in flex-center">
		<div class="log-in-container flex vertical">
			<a class="login login-link"></a>
			<h3>Iniciar sesión</h3>
			<p>Próximamente podrás ser parte de la comunidad virtual Átomo y hacer tu usuario personal.</p>
			<!-- <h3>Log in</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>

			<form id="login-form" class="form" action="<?php echo home_url( 'login' ); ?>" method="post">

				<input type="text" name="log" class="username" placeholder="user">
				<input type="password" name="pwd" class="password" placeholder="password">

				<input name="redirect_to" type="hidden" value="<?php home_url(); ?>">
				<input name="a" type="hidden" value="login">

				<button class="submit self-end" value="Login">Entrar</button>
			</form> -->
		</div>
	</div><!-- .log-in -->
<?php endif; ?>

	<main class="main">
