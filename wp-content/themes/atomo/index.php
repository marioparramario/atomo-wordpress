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
	  $atomo_slider_args = [
	      'post_type' => 'post',
	      'meta_key' => 'atomo_post_featured',
	      'meta_value' => 'slider',
	      'post_per_page' => 4,
	      'nopaging' => true,
	      'order' => 'ASC',
	      'orderby' => 'date'
	  ]; ?>
      <div id="home-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <?php if ( is_singular() ) : ?>
                  <?php $atomo_slider = new WP_Query( $atomo_slider_args ); ?>
                  <?php if ( $atomo_slider->have_posts() ): ?>
                      <?php $atomo_slider_item_number = 0; ?>
                      <?php while ( $atomo_slider->have_posts() ): $atomo_slider->the_post(); ?>
                          <div class="carousel-item<?php if ( $atomo_slider_item_number === 0 ) echo ' active'; ?> <?php echo esc_attr( join( ' ', get_post_class( '' ) ) ); ?>" id="post-<?php the_ID(); ?>">
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
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                                <div class="line"></div>
								<?php $meta_value = get_post_meta($post->ID, "author-article", true);
									if (!empty($meta_value)) {
										echo '<span>'. $meta_value .'</span>';
									}
								?>
                              </div>
                            </div>
                          </div>
                          <?php $atomo_slider_item_number++; ?>
                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                  <?php else: ?>
                      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
                  <?php endif; ?>
              <?php else: ?>
                  <?php $atomo_slider = new WP_Query( $atomo_slider_args ); ?>
                  <?php if ( $atomo_slider->have_posts() ): ?>
                      <?php $atomo_slider_item_number = 0; ?>
                      <?php while ( $atomo_slider->have_posts() ): $atomo_slider->the_post(); ?>
                          <div class="carousel-item<?php if ( $atomo_slider_item_number === 0 ) echo ' active'; ?> <?php echo esc_attr( join( ' ', get_post_class( '' ) ) ); ?>" id="post-<?php the_ID(); ?>">
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
                                  <h3><?php the_title(); ?></h3>
                                  <?php the_excerpt(); ?>
                                  <div class="line"></div>
								  <?php $meta_value = get_post_meta($post->ID, "author-article", true);
		  							if (!empty($meta_value)) {
		  								echo '<span>'. $meta_value .'</span>';
		  							}
		  						?>
                                </div>
                              </div>
                          </div>
                          <?php $atomo_slider_item_number++; ?>
                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                  <?php else: ?>
                      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
                  <?php endif; ?>
              <?php endif; ?>
          </div>
      </div>
  </section>

  <section class="grid-featured flex vertical">
    <h3 class="headline"><?php _e( 'Featured Articles', 'atomo' ); ?></h3>
    <div class="row flex">
      <div class="column">
		<?php query_posts('posts_per_page=1&meta_key=atomo_post_featured&meta_value=primary'); ?>
  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  		<a class="item" href="<?php the_permalink(); ?>">
  		  <div class="thumbnail main">
  			<?php
  				if ( has_post_thumbnail() ) {
  					the_post_thumbnail();
  				}
  			 ?>
  		  </div>
  		  <div class="description flex vertical">
  			<h4><?php the_title(); ?></h4>
  			<p><?php the_excerpt(); ?></p>
  			<p class="category">
				<?php $category = get_the_category();
				echo $category[0]->cat_name;
				?>
			</p>
  		  </div>
  		</a>
  		<?php endwhile; ?> <?php wp_reset_query(); ?>
      </div>
      <div class="column flex vertical justify-between">
        <?php
           $featured_args = [
                'posts_per_page' 	=> 2,
                'meta_key'          => 'atomo_post_featured',
                'meta_value'        => 'yes',
            ];
            $featured = new WP_Query( $featured_args );
        if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
        <div class="column-sub flex">
          <a class="item landscape flex" href="<?php the_permalink(); ?>">
            <div class="thumbnail">
              <?php if (has_post_thumbnail()) : ?>
              <?php
                  if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                  }
               ?>
            </div>
            <div class="description flex vertical justify-center">
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt();?></p>
			  <p class="category">
  				<?php $category = get_the_category();
  				echo $category[0]->cat_name;
  				?>
  			</p>
            </div>
          </a>
      </div>
      <?php
      endif;
      endwhile; else:
      endif;
      ?>
    </div>
  </section>

  <section class="issue flex-center">
    <div class="issue-container flex-center">
      <img class="issue-version" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/version.svg" alt="">
      <div class="issue-image">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/issue-n1.jpg" alt="">
      </div>
      <div class="issue-text">
        <h2>Átomo N1</h2>
		<h3>Corrección política</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <a class="button" href="#">Download this issue!</a>
      </div>
    </div>
  </section>

  <section class="grid-read flex-vertical">
    <h3 class="headline"><?php _e( 'Most Read Articles', 'atomo' ); ?></h3>
    <div class="row flex">
		<?php
	   $popular_args = [
		  'meta_key'        => 'atomo_post_views_count',
		  'orderby'         => 'meta_value_num',
		  'order'           => 'DESC',
		  'posts_per_page'  => 6,
		];
		$popular = new WP_Query( $popular_args );

	  if ($popular->have_posts() ): while ($popular->have_posts()): $popular->the_post(); ?>
		<div class="column flex">

		  <a class="item flex" href="<?php the_permalink(); ?>">
			<div class="thumbnail">
			<?php if (has_post_thumbnail()) : ?>
  	      	<?php
  	        	if ( has_post_thumbnail() ) {
  	          	the_post_thumbnail();
  	        	}
  	       	?>
			</div>
			<div class="description flex vertical justify-center">
				<h4><?php the_title(); ?></h4>
  	      		<p><?php the_excerpt();?></p>
				<p class="category">
					<?php $category = get_the_category();
					echo $category[0]->cat_name;
					?>
				</p>
			</div>
		  </a>

		</div>
		<?php
		endif;
		endwhile; else:
		endif;
		?>

    </div>
  </section>

  <section class="subscribe flex-center">
    <div class="subscribe-container flex-vertical">
      <h2>Suscríbete a Átomo</h2>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	  <a class="button" href="#">Suscríbete</a>
    </div>
  </section>

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
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
            <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="pagination flex">
        <?php echo paginate_links( $popular_args ); ?>
      </div>
  </section>

  <div class="log-in flex-center">
  	<div class="log-in-container flex vertical">
		<a class="login"></a>
		<h3>Log in</h3>
	  	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
		<input type="search" placeholder="user" value="">
		<input type="search" placeholder="password" value="">
		<a class="submit self-end">Entrar</a>
  	</div>
  </div>

</div>

<?php get_footer(); ?>
