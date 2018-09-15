<?php
get_header( 'index.html' ); ?>

<div class="container flex vertical align-center">
  <section class="grid-read flex-vertical">
    <h3 class="headline">Todos los artículos</h3>
    <div class="row flex">
      <?php if ( is_singular() ) : ?>
          <?php if ( have_posts() ) : ?>
              <?php $item_number = 0; ?>
              <?php while ( have_posts() ) : the_post(); ?>
                  <div <?php post_class( 'column flex' ); ?> id="post-<?php the_ID(); ?>">
                    <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                    <div class="pg-empty-placeholder thumbnail-wrapper thumbnail" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
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
                      <a class="item flex" href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                        <div class="pg-empty-placeholder thumbnail-wrapper thumbnail" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
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

  </section>
    <!-- <div class="card">
        <div class="card-body flex-center">
            <h5 class="card-subtitle mb-2"><?php _e( 'Resultado de búsqueda:', 'euroamerica-v3' ); ?></h5>
            <span class="search-tag"><?php echo single_cat_title(); ?></span>
            <a href="<?php echo esc_url( home_url() ); ?>" class="close-card" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
    </div> -->
    <div class="pagination-wrapper flex-center">
        <?php wp_bootstrap4_pagination( array() ); ?>
    </div>
</div>

<?php get_footer( 'index.html' ); ?>
