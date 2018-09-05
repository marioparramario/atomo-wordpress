<?php
get_header(); ?>




<main class="main">
  <div class="container flex vertical align-center">

    <section>
      <?php
$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();

the_title();

endwhile;
?>
    </section>
    <section class="grid-regular flex-vertical">
      <h3 class="headline">Todos los artículos</h3>
      <div class="row flex">
        <?php if ( is_singular() ) : ?>
            <?php if ( have_posts() ) : ?>
                <?php $item_number = 0; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div <?php post_class( 'column flex vertical' ); ?> id="post-<?php the_ID(); ?>">
                      <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                      <div class="thumbnail" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
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
                    <div <?php post_class( 'column flex vertical' ); ?> id="post-<?php the_ID(); ?>">
                        <a class="item flex vertical" href="<?php echo esc_url( get_permalink() ); ?>">
                          <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                          <div class="thumbnail" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
                          <div class="description flex vertical justify-center">
                              <h4><?php the_title(); ?></h4>
                              <?php the_excerpt( ); ?>
                          </div>
                        </a>
                    </div>
                    <?php $item_number++; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
            <?php endif; ?>
        <?php endif; ?>
        <div class="pagination-wrapper flex-center">
            <?php wp_bootstrap4_pagination( array() ); ?>
        </div>
      </div>
    </section>


    <section class="slider flex">
        <div id="carousel1" class="carousel slide" data-ride="carousel">
          <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Previous', 'euroamerica-v3' ); ?></span> </a>
          <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only"><?php _e( 'Next', 'euroamerica-v3' ); ?></span> </a>

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
                            <div class="carousel-item flex<?php if( $slider_item_number == 0) echo ' active'; ?> <?php echo join( ' ', get_post_class( '' ) ) ?>" id="post-<?php the_ID(); ?>">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'normal', array(
                                        'class' => 'd-block w-100'
                                    ) );
                                    }
                                 ?>
                                <div class="slider-text-wrapper carousel-caption d-none d-md-block">
                                  <div class="slider-text-container">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <div class="line"></div>
                                    <span><?php the_author(); ?></span>
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
                            <div class="carousel-item flex<?php if( $slider_item_number == 0) echo ' active'; ?> <?php echo join( ' ', get_post_class( '' ) ) ?>" id="post-<?php the_ID(); ?>">
                                <a class="slider-image-wrapper" href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'normal', array(
                                            'class' => 'd-block w-100'
                                        ) );
                                        }
                                     ?>
                                </a>
                                <div class="slider-text-wrapper carousel-caption d-none d-md-block">
                                  <div class="slider-text-container">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <div class="line"></div>
                                    <span><?php the_author(); ?></span>
                                  </div>
                                </div>
                            </div>
                            <?php $slider_item_number++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="slider flex">
      <div class="slider-image-wrapper"></div>

          <div class="slider-text-wrapper flex vertical justify-end">
            <div class="pagination flex">
              <span></span>
              <span class="active"></span>
              <span></span>
              <span></span>
            </div>
            <div class="slider-text-container">
              <h3>Así habló Zaratustra</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
              <div class="line"></div>
              <span>por Friedrich Nietzsche</span>
            </div>
          </div>
        </section>





        <section class="grid-featured flex vertical">
          <h3 class="headline">Artículos destacados</h3>
          <div class="row flex">
            <div class="column">
              <a class="item" href="">
                <div class="thumbnail">
                  <img src="images/placeholders/walking.jpg" alt="">
                </div>
                <div class="description flex vertical">
                  <h4>Caminar descalzo</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. . .</p>
                  <span>by Isaac Asimov</span>
                </div>
              </a>
            </div>
            <div class="column flex vertical justify-between">
              <div class="column-sub flex">
                <a class="item landscape flex" href="#">
                  <div class="thumbnail">
                    <img src="images/placeholders/car.jpg" alt="">
                  </div>
                  <div class="description flex vertical justify-center">
                    <h4>Autos modernos</h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. . .</p>
                    <span>by Werner Heisenberg</span>
                  </div>
                </a>
              </div>
              <div class="column-sub flex">
                <a class="item landscape flex" href="#">
                  <div class="thumbnail">
                    <img src="images/placeholders/autumn.jpg" alt="">
                  </div>
                  <div class="description flex vertical justify-center">
                    <h4>Lugares desconocidos</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim. . .</p>
                    <span>by Noam Chomsky</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </section>

        <section class="issue flex-center">
          <div class="issue-container flex-center">
            <img class="issue-version" src="images/web/version.svg" alt="">
            <div class="issue-image">
              <img src="images/web/issue.jpg" alt="">
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
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/parra.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>No sé usted pero yo me muero de la risa</h4>
                  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/cortazar.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Me caigo y me levanto</h4>
                  <p>Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/bolano.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Mis estrellas más distantes</h4>
                  <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/mistral.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Donde el indio lo está llamando</h4>
                  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/borges.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Alephico caleidoscópico</h4>
                  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/fuentes.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Alguien va a decir algo peligroso</h4>
                  <p>Nam libero tempore, cum soluta nobis est eligendi optio . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/nano.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Yo soy el músico errante</h4>
                  <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex" href="#">
                <div class="thumbnail">
                  <img src="images/poetry/llosa.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Mis estrellas más distantes</h4>
                  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum . . .</p>
                  <span>Leer artículo</span>
                </div>
              </div>
              </a>
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
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/camp.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Damit Ihr indess erkennt</h4>
                  <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/lines.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Omnis dolor repellendus</h4>
                  <p>Sunt in culpa qui officia deserunt mollit anim id est laborum . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/sofa.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Pflichten oder von sachlicher Noth</h4>
                  <p>Temporibus autem quibusdam et aut officiis debitis. . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/pool.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Was ist also Wahrheit?</h4>
                  <p>Itaque earum rerum hic tenetur a sapiente delectus . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/street.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Zu allem Handeln gehört Vergessen</h4>
                  <p>Münzen, die ihr Bild verloren haben und nun als Metall . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/jellyfish.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Wenn der Mensch</h4>
                  <p>Bedürfniss zur kritischen, das heisst richtenden . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/house.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Der Mensch, welcher nicht zur Masse </h4>
                  <p>Sei du selbst! Das bist du alles nicht . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>

            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/car-2.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Pflichten oder von sachlicher Noth</h4>
                  <p>Temporibus autem quibusdam et aut officiis debitis. . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/hat.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Was ist also Wahrheit?</h4>
                  <p>Itaque earum rerum hic tenetur a sapiente delectus . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/autumn.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Zu allem Handeln gehört Vergessen</h4>
                  <p>Münzen, die ihr Bild verloren haben und nun als Metall . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/walking.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Wenn der Mensch</h4>
                  <p>Bedürfniss zur kritischen, das heisst richtenden . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>
            <div class="column flex">
              <a class="item flex vertical" href="#">
                <div class="thumbnail">
                  <img src="images/placeholders/dancer.jpg" alt="">
                </div>
                <div class="description flex vertical justify-center">
                  <h4>Der Mensch, welcher nicht zur Masse </h4>
                  <p>Sei du selbst! Das bist du alles nicht . . .</p>
                  <span>Leer artículo</span>
                </div>
              </a>
            </div>

          </div>
          <div class="pagination flex">
            <a class="active" href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
          </div>
        </section>


      </div><!-- Container -->


<?php get_footer(); ?>
