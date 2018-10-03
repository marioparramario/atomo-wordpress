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
      <div id="carousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <?php if ( is_singular() ) : ?>
                  <?php
                      $slider_args = array(
                          'post_type' => 'slider',
                          'nopaging' => true,
                          'order' => 'ASC',
                          'orderby' => 'date'
                      )
                  ?>
                  <?php $slider = new WP_Query( $slider_args ); ?>
                  <?php if ( $slider->have_posts() ) : ?>
                      <?php $slider_item_number = 0; ?>
                      <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
                          <div class="carousel-item<?php if( $slider_item_number == 0) echo ' active'; ?> <?php echo join( ' ', get_post_class( '' ) ) ?>" id="post-<?php the_ID(); ?>">
                            <div class="slider-image-wrapper">
                              <?php
                                  if ( has_post_thumbnail() ) {
                                      the_post_thumbnail( 'normal', array(
                                      'class' => 'd-block w-100'
                                  ) );
                                  }
                               ?>
                            </div>
                            <div class="slider-text-wrapper flex vertical justify-end">
                              <div class="pagination flex">
                                <span></span>
                                <span class="active"></span>
                                <span></span>
                                <span></span>
                              </div>
                              <div class="slider-text-container">
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                                <div class="line"></div>
                                <span>por Friedrich Nietzsche</span>
                              </div>
                            </div>
                          </div>
                          <?php $slider_item_number++; ?>
                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                  <?php else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
                  <?php endif; ?>
              <?php else : ?>
                  <?php
                      $slider_args = array(
                          'post_type' => 'slider',
                          'nopaging' => true,
                          'order' => 'ASC',
                          'orderby' => 'date'
                      )
                  ?>
                  <?php $slider = new WP_Query( $slider_args ); ?>
                  <?php if ( $slider->have_posts() ) : ?>
                      <?php $slider_item_number = 0; ?>
                      <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
                          <div class="carousel-item<?php if( $slider_item_number == 0) echo ' active'; ?> <?php echo join( ' ', get_post_class( '' ) ) ?>" id="post-<?php the_ID(); ?>">
                              <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <div class="slider-image-wrapper">
                                  <?php
                                      if ( has_post_thumbnail() ) {
                                          the_post_thumbnail( 'normal', array(
                                          'class' => 'd-block w-100'
                                      ) );
                                      }
                                   ?>
                                </div>
                                <div class="slider-text-wrapper flex vertical justify-end">
                                  <div class="pagination flex">
                                    <span></span>
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                  </div>
                                  <div class="slider-text-container">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <div class="line"></div>
                                    <span>por Friedrich Nietzsche</span>
                                  </div>
                                </div>
                              </a>
                          </div>
                          <?php $slider_item_number++; ?>
                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                  <?php else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
                  <?php endif; ?>
              <?php endif; ?>
          </div>
          <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only"><?php _e( 'Previous', 'atomo' ); ?></span>
		  </a>
          <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
		 	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only"><?php _e( 'Next', 'atomo' ); ?></span>
		  </a>
      </div>
  </section>

	<section id="featured" class="grid-featured flex vertical">
	<?php
		$featured_args = [
			'meta_key'          => 'atomo_post_featured',
			'meta_value'        => 'yes',
			'posts_per_page' 	=> 3,
		];

		$featured = new WP_Query( $featured_args );
	?>
		<h3 class="headline">
			<?php esc_html_e( 'Featured Articles', 'atomo' ); ?>
		</h3>
		<div class="row flex">

		<?php if ( $featured->have_posts() ): $featured->the_post(); ?>
			<div class="column featured-column">
				<a class="item featured-item" href="<?php the_permalink(); ?>">
					<div class="thumbnail main">
						<?php if ( has_post_thumbnail() ) {	the_post_thumbnail(); } ?>
					</div>
					<div class="description flex vertical">
						<h4><?php the_title(); ?></h4>
						<p class="excerpt"><?php atomo_excerpt(); ?></p>
						<span class="category"><?php the_category( ', ' ); ?></span>
					</div>
				</a><!-- .item -->
			</div>

			<?php if ( $featured->have_posts() ): $featured->the_post(); ?>
			<div class="column featured-column flex vertical justify-between">
			<?php while ( $featured->have_posts() ): $featured->the_post(); ?>
				<div class="column-sub flex">
					<a class="item featured-item landscape flex" href="<?php the_permalink(); ?>">
						<div class="thumbnail">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
						</div>
						<div class="description flex vertical justify-center">
							<h4><?php the_title(); ?></h4>
							<p class="excerpt"><?php atomo_excerpt(); ?></p>
							<span class="category"><?php the_category( ', ' ); ?></span>
						</div>
					</a><!-- .item -->
				</div>
			<?php endwhile; ?>
			</div><!-- .featured-column -->
			<?php endif; ?>
		<?php else: ?>
			<div class="column">
				<p class="empty"><?php _e( 'No featured articles yet.', 'atomo' ); ?></p>
			</div>
		<?php endif; ?>
		</div><!-- .row -->
	</section><!-- #featured -->


	<?php wp_reset_query(); ?>


	<section id="current" class="issue flex-center">
		<div class="issue-container flex-center">
			<img class="issue-version" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/version.svg" alt="">
			<div class="issue-image">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/issue.jpg" alt="">
			</div>
			<div class="issue-text">
				<h2>Milie atqui publium ne ad iaequast auden</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				<a href="#">A link doesn't hurt</a>
			</div>
		</div>
	</section><!-- #current -->


	<section id="popular" class="grid-read flex-vertical">
	<?php
		$popular_args = [
			'meta_key'        => 'atomo_post_views_count',
			'orderby'         => 'meta_value_num',
			'order'           => 'DESC',
			'posts_per_page'  => 6,
		];

		$popular = new WP_Query( $popular_args );
	?>
		<h3 class="headline">
			<?php esc_html_e( 'Most Read Articles', 'atomo' ); ?>
		</h3>
		<div class="row popular-row flex">
		<?php if ( $popular->have_posts() ): ?>
			<?php while ( $popular->have_posts() ): $popular->the_post(); ?>
			<div class="column popular-column">

				<a class="item flex" href="<?php the_permalink(); ?>">
					<div class="thumbnail">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					</div>
					<div class="description flex vertical justify-center">
						<h4><?php the_title(); ?></h4>
						<p class="excerpt"><?php atomo_excerpt();?></p>
						<span class="author">by <?php the_author(); ?></span>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
		<?php else: ?>
			<div class="column popular-column empty">
				<p><?php _e( 'No articles', 'atomo' ); ?></p>
			</div>
		<?php endif; ?>
		</div>
	</section><!-- #popular -->


	<section id="subscribe" class="suscribe flex-center">
		<div class="suscribe-container flex-vertical">
			<h2>Suscríbete a Átomo</h2>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<a class="button" href="#">Suscríbete</a>
		</div>
	</section><!-- #subscribe -->


	<section id="all" class="grid-regular flex-vertical">
		<h3 class="headline">
			<?php esc_html_e( 'All Articles', 'atomo' ); ?>
		</h3>
		<div class="row all-row flex">
		<?php if ( is_singular() ): ?>
			<?php if ( have_posts() ): $item_number = 0; ?>
			<?php while ( have_posts() ): the_post(); ?>
			<div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
				<div class="thumbnail">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				</div>

				<div class="description flex vertical justify-center">
					<h4><?php the_title(); ?></h4>
					<p class="excerpt"><?php atomo_excerpt( ); ?></p>
					<span><?php _e( 'Read article', 'atomo' ); ?></span>
				</div>
			</div><!-- .column -->
			<?php $item_number++; ?>
			<?php endwhile; ?>
			<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
			<?php endif; ?>
		<?php else: ?>
		<?php if ( have_posts() ): $item_number = 0; ?>
		<?php while ( have_posts() ): the_post(); ?>
		<div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
			<a class="item flex vertical" href="<?php echo esc_url( get_permalink() ); ?>">
				<div class="thumbnail">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				</div>
				<div class="description flex vertical justify-center">
					<h4><?php the_title(); ?></h4>
					<p class="excerpt"><?php atomo_excerpt(); ?></p>
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
		</div><!-- .all-row -->

		<div class="pagination flex">
			<?php echo paginate_links( $popular_args ); ?>
		</div>
	</section><!-- #all -->


</div><!-- .container -->

<?php get_footer(); ?>
