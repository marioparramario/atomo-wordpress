<?php
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
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Previous', 'euroamerica-v3' ); ?></span> </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Next', 'euroamerica-v3' ); ?></span> </a>
        </div>
    </section>

    <section class="grid-featured flex vertical">
      <h3 class="headline">Artículos destacados</h3>
      <div class="row flex">
        <div class="column">
          <a class="item" href="">
            <div class="thumbnail">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/walking.jpg" alt="">
            </div>
            <div class="description flex vertical">
              <h4>Caminar descalzo</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. . .</p>
              <span>by Isaac Asimov</span>
            </div>
          </a>
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
      <h3 class="headline">Todos los artículos</h3>
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
                            <span>Leer artículo</span>
                        </div>
                      </div>
                      <?php $item_number++; ?>
                  <?php endwhile; ?>
              <?php else : ?>
                  <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
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
                                <span>Leer artículo</span>
                            </div>
                          </a>
                      </div>
                      <?php $item_number++; ?>
                  <?php endwhile; ?>
              <?php else : ?>
                  <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
              <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="pagination flex">
          <?php echo paginate_links( $args ); ?>
        </div>

    </section>




    <section>
      <?php
      $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
      while ( $popularpost->have_posts() ) : $popularpost->the_post();

      the_title();

      endwhile;
      ?>
    </section>



  </div>
<?php get_footer(); ?>