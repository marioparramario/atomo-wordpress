<?php
get_header( 'index.hmtl' ); ?>
<?php
 ?>
<div class="container">
    <div class="card">
        <div class="card-body flex-center">
            <h5 class="card-subtitle mb-2"><?php _e( 'Resultado de búsqueda:', 'euroamerica-v3' ); ?></h5>
            <span class="search-tag"><?php echo esc_html( get_search_query( false ) ); ?></span>
            <a href="<?php echo esc_url( home_url() ); ?>" class="close-card" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
    </div>
    <div class="row">
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
</div>

<?php get_footer( 'index.hmtl' ); ?>
