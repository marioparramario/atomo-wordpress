<?php

/*
 * Atomo Entry Page
 */

$query_args = [
	'post_type' => 'slider',
	'nopaging'  => true,
	'order'     => 'ASC',
	'orderby'   => 'date',
];

$qs = new WP_Query( $query_args );
$count = 0;

/*
 * Fetch thumbnail of current post.
 *
 * @return WP_Post
 */
function post_thumbnail( $post = null, $size = 'post-thumbnail', array $attr = null ) : WP_Post {
	$class = $attr['class'] ?? 'd-block w-100';
	if ( is_array( $class ) ) {
		$class = join( ' ', $class );
	}

	$thumb = $attr or [];
	$thumb['class'] = $class;

	return get_the_post_thumbnail( $post, $size, $thumb );
}


/*
 * Render thumbnail of current post.
 */
function display_thumbnail( $post = null, $size = 'post-thumbnail', array $attr = null ) {
	if ( ! has_post_thumbnail( $post ) ) {
		return null;
	}

	$thumb = post_thumbnail( $post, $size, $attr );
	echo esc_html( $thumb );
}


get_header(); ?>

<div class="container flex vertical align-center">

  <section class="slider flex">
    <div id="carousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php if ( is_singular() ): ?>
	       <?php while ( $qs->have_posts() ): $qs->the_post(); ?>
		     <?php
			   $item_class = join( ' ', get_post_class( 'carousel-item' ));
			   if ( ! $count ) $item_class .= ' active';
			 ?>
             <div class="<?php echo $item_class; ?>" id="<?php printf('post-%d', get_the_ID()); ?>">

               <div class="slider-image-wrapper">
		         <?php display_thumbnail(null, 'normal'); ?>
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

        <?php $count++; ?>

	  <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

	<?php if ( $count == 0 ): ?>
	  <p class="no-posts">
		<?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?>
	  </p>
    <?php endif; ?>

<?php else: /* END-OF: is_singular */ ?>

	<?php if ( $qs->have_posts() ): ?>
	  <?php while ( $qs->have_posts() ): $qs->the_post(); ?>
	  <?php $item_class = join( ' ', get_post_class( 'carousel-item' ) );
	        if ( ! $count ) $item_class .= ' active'; ?>
        <div class="<?php echo $item_class; ?>" id="<?php printf('post-%d', get_the_ID()); ?>">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="slider-image-wrapper">
              <?php display_thumbnail(null, 'normal'); ?>
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
        <?php $count++; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else: ?>
	  <p class="no-posts">
		<?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?>
	  </p>
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




  <section class="grid-featured flex vertical">
    <h3 class="headline">Artículos destacados</h3>
    <div class="row flex">
      <div class="column">
        <div class="">
          <?php query_posts('posts_per_page=1&cat=7'); ?>
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <a class="item" href="<?php the_permalink(); ?>">
            <div class="thumbnail">
              <?php
                  if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                  }
               ?>
            </div>
            <div class="description flex vertical">
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt(); ?></p>
              <span><?php the_category(', '); ?></span>
            </div>
          </a>
          <?php endwhile; ?> <?php wp_reset_query(); ?>
        </div>
      </div>




      <div class="column flex vertical justify-between">
        <?php
          $args = array(
                'posts_per_page' => 5,
                'meta_key' => 'meta-checkbox',
                'meta_value' => 'yes'
            );
            $featured = new WP_Query($args);
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
              <span>by <?php the_author(); ?></span>
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
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/issue.jpg" alt="">
      </div>
      <div class="issue-text">
        <h2>Milie atqui publium ne ad iaequast auden</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <a href="#">A link doesn't hurt</a>
      </div>
    </div>
  </section>

  <section class="grid-read flex-vertical">
    <h3 class="headline">Artículos más leídos</h3>
    <div class="row flex">
      <div class="column featured flex">
        <a class="item flex" href="">
          <div class="thumbnail">
          </div>
          <div class="description flex vertical justify-center">
            <h4></h4>
            <p></p>
            <span></span>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section class="suscribe flex-center">
    <div class="suscribe-container flex-vertical">
      <h2>Suscríbete a Átomo</h2>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <div class="input-container flex">
        <input type="text" name="" value="" placeholder="email">
        <button class="button" type="button" name="button">Enviar</button>
      </div>
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
                          <span><?php _e( 'Read article', 'atomo' ); ?></span>
                      </div>
                    </div>
                    <?php $item_number++; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'atomo3' ); ?></p>
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
      <div class="pagination flex">
        <?php echo paginate_links( $args ); ?>
      </div>

  </section>



</div>

<?php get_footer(); ?>
