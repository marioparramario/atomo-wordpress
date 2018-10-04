<?php
/**
 * Custom template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Atomo
 */

get_header( 'index.html' ); ?>

<div class="container flex vertical align-center">
    <div class="card">
        <div class="card-body flex-center">
            <span><?php _e( 'Resultados de la búsqueda', 'atomo' ); ?>: </span>
            <span class="search-tag"><?php echo esc_html( get_search_query( false ) ); ?></span>
			<!-- <a href="<?php echo esc_url( home_url() ); ?>" class="close-card" rel="home"><?php bloginfo( 'name' ); ?></a> -->
        </div>
    </div>

	<section class="grid-regular flex-vertical">
	  <h3 class="headline"><?php _e( 'All Articles', 'atomo' ); ?></h3>
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
							<span><?php _e( 'Read article', 'atomo' ); ?></span>
						</div>
					  </div>
					  <?php $item_number++; ?>
				  <?php endwhile; ?>
			  <?php else : ?>
				  <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
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
								<span><?php _e( 'Read article', 'atomo' ); ?></span>
							</div>
						  </a>
					  </div>
					  <?php $item_number++; ?>
				  <?php endwhile; ?>
			  <?php else : ?>
				  <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
			  <?php endif; ?>
		  <?php endif; ?>
		</div>
		<div class="pagination-wrapper flex-center">
	        <?php wp_bootstrap4_pagination( array() ); ?>
	    </div>

	</section>
    <section class="suscribe flex-center">
      <div class="suscribe-container flex-vertical">
        <h2>Suscríbete a Átomo</h2>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  	  <a class="button" href="#">Suscríbete</a>
      </div>
    </section>


</div>

<?php get_footer( 'index.html' ); ?>
