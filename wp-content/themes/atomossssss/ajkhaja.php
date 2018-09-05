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
                        <div class="overlay"></div>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'normal', array(
                                'class' => 'd-block w-100'
                            ) );
                            }
                        ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php $slider_item_number++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
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
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                             </div>
                            
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </div> -->
                        </a>
                    </div>
                    <?php $slider_item_number++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
            <?php endif; ?>
        <?php endif; ?>



    </div>
    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Previous', 'euroamerica-v3' ); ?></span> </a>
    <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Next', 'euroamerica-v3' ); ?></span> </a>
</div>




    <section class="slider flex xxx">
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
              <h3><?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
          </div>
          <?php $slider_item_number++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
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
              <h3><?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
          </div>
          <?php $slider_item_number++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
      <?php endif; ?>
    <?php endif; ?>
  <section>



  
		
		
<!-- <div class="row">
<?php if ( is_singular() ) : ?>
            <?php if ( have_posts() ) : ?>
                <?php $item_number = 0; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div <?php post_class( 'post-container col-lg-3 col-md-4 col-sm-6 col-12' ); ?> id="post-<?php the_ID(); ?>">
                        <div class="post-wrapper">
                            <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                            <div class="pg-empty-placeholder thumbnail-wrapper" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
                            <div class="post-text-wrapper">
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt( ); ?>
                            </div>
                        </div>
                    </div>
                    <?php $item_number++; ?>
                    <?php if( $item_number % 4 == 0 ) echo '<div class="clearfix visible-lg-block"></div>'; ?>
                    <?php if( $item_number % 3 == 0 ) echo '<div class="clearfix visible-md-block"></div>'; ?>
                    <?php if( $item_number % 2 == 0 ) echo '<div class="clearfix visible-sm-block"></div>'; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
            <?php endif; ?>
        <?php else : ?>
            <?php if ( have_posts() ) : ?>
                <?php $item_number = 0; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div <?php post_class( 'post-container col-lg-3 col-md-4 col-sm-6 col-12' ); ?> id="post-<?php the_ID(); ?>">
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <div class="post-wrapper">
                                <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                                <div class="pg-empty-placeholder thumbnail-wrapper" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
                                <div class="post-text-wrapper">
                                    <h4><?php the_title(); ?></h4>
                                    <?php the_excerpt( ); ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $item_number++; ?>
                    <?php if( $item_number % 4 == 0 ) echo '<div class="clearfix visible-lg-block"></div>'; ?>
                    <?php if( $item_number % 3 == 0 ) echo '<div class="clearfix visible-md-block"></div>'; ?>
                    <?php if( $item_number % 2 == 0 ) echo '<div class="clearfix visible-sm-block"></div>'; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="pagination-wrapper flex-center">
        <?php wp_bootstrap4_pagination( array() ); ?>
    </div>
</div> -->