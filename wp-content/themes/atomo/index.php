<?php
/**
 * Main Átomo template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Atomo
 */

get_header(); ?>

<div class="container flex vertical align-center">
	<section class="slider flex">
		<?php
			$atomo_slider_number = 0;
			$atomo_slider_args = [
				'meta_key'      => 'atomo_post_featured',
				'meta_value'    => 'slider',
				'nopaging'      => true,
				'order'         => 'ASC',
				'orderby'       => 'date',
				'post_per_page' => 4,
			];

			$atomo_slider = new WP_Query( $atomo_slider_args );
		?>
		<div id="home-carousel" class="carousel slide" data-ride="carousel">
		<?php if ( ! $atomo_slider->have_posts() ) : ?>
			<div class="carousel-inner empty">
				<p class="sorry"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
			</div>
		<?php else : ?>
			<div class="carousel-inner">
				<?php if ( is_singular() ) : ?>
					<?php while ( $atomo_slider->have_posts() ) : $atomo_slider->the_post(); ?>
					<div class="carousel-item<?php if ( $atomo_slider_number === 0 ) { echo ' active'; } ?> <?php echo esc_attr( join( ' ', get_post_class( '' ) ) ); ?>" id="post-<?php the_ID(); ?>">
						<div class="slider-image-wrapper flex-center">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail([ 1280, 1024 ], [ 'class' => 'slider-image' ]); } ?>
						</div>
						<div class="slider-text-wrapper flex vertical justify-end">
							<ol class="pagination list-unstyled flex">
								<li class="pagination-indicator active" data-target="home-carousel" data-slide-to="0"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="1"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="2"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="3"></li>
							</ol>
							<div class="slider-text-container">
								<h3 class="title"><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
								<div class="line"></div>
								<?php $atomo_author = atomo_post_author( $post->ID ); ?>
								<?php if ( ! empty( $atomo_author ) ) { echo '<span class="author">' . $atomo_author . '</span>'; } ?>
							</div>
						</div><!-- .slider-text-wrapper -->
					</div><!-- .carousel-item -->
					<?php $atomo_slider_number++; ?>
					<?php endwhile; ?>
				<?php else :  /* is_singular */ ?>
					<?php while ( $atomo_slider->have_posts() ) : $atomo_slider->the_post(); ?>
					<div class="carousel-item<?php if ( $atomo_slider_number === 0 ) { echo ' active'; } ?> <?php echo esc_attr( join( ' ', get_post_class( '' ) ) ); ?>" id="post-<?php the_ID(); ?>">
						<a class="slider-link" href="<?php echo esc_url( get_permalink() ); ?>">
							<div class="slider-image-wrapper flex-center">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail([ 1280, 1024 ], [ 'class' => 'slider-image' ]); } ?>
							</div>
						</a>
						<div class="slider-text-wrapper flex vertical justify-end">
							<ol class="pagination list-unstyled flex">
								<li class="pagination-indicator active" data-target="home-carousel" data-slide-to="0"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="1"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="2"></li>
								<li class="pagination-indicator" data-target="home-carousel" data-slide-to="3"></li>
							</ol>
							<div class="slider-text-container">
								<h3 class="title"><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
								<div class="line"></div>
								<?php $atomo_author = atomo_post_author( $post->ID ); ?>
								<?php if ( ! empty( $atomo_author ) ) { echo '<span class="author">' . $atomo_author . '</span>'; } ?>
							</div>
						</div><!-- .slider-text-wrapper -->
					</div><!-- .carousel-item -->
					<?php $atomo_slider_number++; ?>
					<?php endwhile; ?>
				<?php endif; /* !is_singular */ ?>

				<?php wp_reset_postdata(); ?>
			</div><!-- .carousel-inner -->
		<?php endif; /* has_posts */ ?>
		</div><!-- #home-carousel -->
	</section><!-- #slider -->


	<section id="featured" class="grid-featured flex vertical">
		<?php
			$atomo_featured_args = [
				'meta_key'          => 'atomo_post_featured',
				'meta_value'        => 'yes',
				'posts_per_page' 	=> 2,
			];

			$atomo_primary_args = [
				'meta_key'          => 'atomo_post_featured',
				'meta_value'        => 'primary',
				'posts_per_page'    => 1,
			];

			$atomo_featured = new WP_Query( $atomo_featured_args );
			$atomo_primary = new WP_Query( $atomo_primary_args );
		?>
		<h3 class="headline">
			<?php esc_html_e( 'Artícuos destacados', 'atomo' ); ?>
		</h3>
		<div class="row flex">
			<div class="column">
			<?php while ( $atomo_primary->have_posts() ) : $atomo_primary->the_post(); ?>
				<a class="item item-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail main">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					</div>
					<div class="description flex vertical">
						<h4 class="title"><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<p class="category"><?php esc_html_e( get_the_category()[0]->cat_name ); ?></p>
					</div>
				</a><!-- .item -->
			<?php endwhile; ?>
			</div><!-- .column -->

			<?php wp_reset_query(); ?>

			<div class="column flex vertical justify-between">
			<?php while ( $atomo_featured->have_posts() ) : $atomo_featured->the_post(); ?>
				<div class="column-sub flex">
					<a class="item item-link landscape flex" href="<?php the_permalink(); ?>">
						<div class="thumbnail">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }	?>
						</div>
						<div class="description flex vertical justify-center">
							<h4 class="title"><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
							<p class="category"><?php esc_html_e( get_the_category()[0]->cat_name ); ?></p>
						</div>
					</a><!-- .item -->
				</div><!-- .column-sub -->
			<?php endwhile; ?>
			</div><!-- .column -->
		</div><!-- .row -->
	</section><!-- #featured -->


	<section id="current-issue" class="issue flex-center">
		<div class="issue-container flex-center">
			<img class="issue-version" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/version.svg" alt="">
			<div class="issue-image">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/issue-n1.jpg" alt="<?php _e( 'Current issue', 'atomo' ); ?>">
			</div>
			<div class="issue-text">
				<h2 class="title">Átomo N1</h2>
				<h3>Corrección política</h3>
				<p class="description">Revista recién nacida, vamos en nuestro primer número.</p>
			</div>
		</div>
	</section><!-- #current-issue -->


	<section id="popular" class="grid-read flex-vertical">
	<?php
		$atomo_popular_args = [
			'meta_key'       => 'atomo_post_views_count',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
			'posts_per_page' => 6,
		];

		$atomo_popular = new WP_Query( $atomo_popular_args );
	?>
		<h3 class="headline">
			<?php esc_html_e( 'Artículos más leídos', 'atomo' ); ?>
		</h3>
		<div class="row flex">

		<?php while ( $atomo_popular->have_posts() ) : $atomo_popular->the_post(); ?>
			<div class="column flex">

				<a class="item item-link flex" href="<?php the_permalink(); ?>">
					<div class="thumbnail">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					</div>
					<div class="description flex vertical justify-center">
						<h4 class="title"><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<p class="category"><?php esc_html_e( get_the_category()[0]->cat_name ); ?></p>
					</div>
				</a>

			</div><!-- .column -->
		<?php endwhile; ?>

		</div><!-- .row -->
	</section><!-- #popular -->


	<section class="subscribe flex-center">
		<div class="subscribe-container flex-vertical">
			<h2 class="title">Suscríbete a Átomo</h2>
			<p>Para suscribirse y recibir la revista física en tu casa u oficina envíanos un email!</p>
			<a class="button" href="mailto:suscripciones@revistaatomo.com">Suscríbete</a>
		</div>
	</section><!-- .subscribe -->


	<section id="posts" class="grid-regular flex-vertical">
		<?php $atomo_item_number = 0; ?>
		<h3 class="headline">
			<?php esc_html_e( 'Todos los artículos', 'atomo' ); ?>
		</h3>
		<div class="row flex">
		<?php if ( ! have_posts() ) : ?>
			<div class="column flex empty">
				<p class="sorry"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
			</div>
		<?php else : ?>

			<?php if ( is_singular() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
						<div class="thumbnail">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
						</div>

						<div class="description flex vertical justify-center">
							<h4 class="title"><?php the_title(); ?></h4>
							<?php the_excerpt( ); ?>
							<p class="category"><?php esc_html_e( get_the_category()[0]->cat_name ?? 'uncategorized' ); ?></p>
						</div>
					</div>
					<?php $atomo_item_number++; ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
						<a class="item item-link flex vertical" href="<?php echo esc_url( get_permalink() ); ?>">
							<div class="thumbnail">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							</div>
							<div class="description flex vertical justify-center">
								<h4 class="title"><?php the_title(); ?></h4>
								<?php the_excerpt( ); ?>
								<p class="category"><?php esc_html_e( get_the_category()[0]->cat_name ); ?></p>
							</div>
						</a>
					</div>
					<?php $atomo_item_number++; ?>
				<?php endwhile; ?>
			<?php endif; /* !is_singular */ ?>

		<?php endif; /* have_posts */ ?>
		</div><!-- .row -->

		<!-- <div class="pagination flex">
			<?php echo paginate_links( $atomo_popular_args ); ?>
		</div> -->
	</section><!-- #posts -->

</div><!-- .container -->

<?php get_footer(); ?>
