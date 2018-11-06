<?php
/**
 * Custom template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Atomo
 */

get_header(); ?>

<div class="container flex vertical align-center">
    <div class="search-result flex-vertical">
        <div class="flex-center">
            <span><?php _e( 'Resultados de la búsqueda', 'atomo' ); ?>: </span>
            <span class="search-tag"><?php echo esc_html( get_search_query( false ) ); ?></span>
			<a class="search-close" href="<?php echo esc_url( home_url() ); ?>"  rel="home"></a>
        </div>
    </div>

	<section class="grid-regular flex-vertical">
		<div class="row flex">
		  <?php if ( is_singular() ) : ?>
			  <?php if ( have_posts() ) : ?>
				  <?php $item_number = 0; ?>
				  <?php while ( have_posts() ) : the_post(); ?>
					  <div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
						<div class="thumbnail">
						  <?php
							  if ( has_post_thumbnail() ) {
								  the_post_thumbnail();
							  }
						   ?>
						</div>

						<div class="description flex vertical justify-center">
							<h4><?php the_title(); ?></h4>
							<?php the_excerpt( ); ?>
							<p class="category">
								<?php $category = get_the_category();
								echo $category[0]->cat_name;
								?>
							</p>
						</div>
					  </div>
					  <?php $item_number++; ?>
				  <?php endwhile; ?>
			  <?php else : ?>
				  <p><?php _e( 'Lo sentimos, no hay entrada que coincida con tu criterio', 'atomo' ); ?></p>
			  <?php endif; ?>
		  <?php else : ?>
			  <?php if ( have_posts() ) : ?>
				  <?php $item_number = 0; ?>
				  <?php while ( have_posts() ) : the_post(); ?>
					  <div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
						  <a class="item flex vertical" href="<?php echo esc_url( get_permalink() ); ?>">
							<div class="thumbnail">
							  <?php
								  if ( has_post_thumbnail() ) {
									  the_post_thumbnail();
								  }
							   ?>
							</div>
							<div class="description flex vertical justify-center">
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt( ); ?>
								<p class="category">
									<?php $category = get_the_category();
									echo $category[0]->cat_name;
									?>
								</p>
							</div>
						  </a>
					  </div>
					  <?php $item_number++; ?>
				  <?php endwhile; ?>
			  <?php else : ?>
				  <p><?php _e( 'Lo sentimos, no hay entrada que coincida con tus criterio', 'atomo' ); ?></p>
			  <?php endif; ?>
		  <?php endif; ?>
		</div>
		<!-- <div class="pagination-wrapper flex-center">
	        <?php atomo_pagination(); ?>
	    </div> -->

	</section>
	<section class="subscribe flex-center">
		<div class="subscribe-container flex-vertical">
			<h2 class="title">Suscríbete a Átomo</h2>
			<p>Para suscribirse y recibir la revista física en tu casa u oficina envíanos un email!</p>
			<a class="button" href="mailto:suscripciones@revistaatomo.com">Suscríbete</a>
		</div>
	</section><!-- .subscribe -->


</div>

<?php get_footer(); ?>
