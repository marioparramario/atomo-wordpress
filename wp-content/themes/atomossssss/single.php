<?php
get_header(); ?>

            <div class="container">
              <?php the_breadcrumb(); ?>
                <div class="row">
                    <?php if ( is_singular() ) : ?>
                        <?php if ( have_posts() ) : ?>
                            <?php $item_number = 0; ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div <?php post_class( 'col-md-12 flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
                                    <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                                    <div class="flex-center image-single-wrapper" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"></div>
                                    <div class="single-post-wrapper">
                                        <h4 class="single-post-title"><?php the_title(); ?></h4>
                                        <div class="single-post-info">
                                            <span><?php the_date( 'j, F, Y', null, ' por' ); ?></span>
                                            <span><?php the_author(); ?></span>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <?php $item_number++; ?>
                                <?php if( $item_number % 1 == 0 ) echo '<div class="clearfix visible-md-block visible-lg-block"></div>'; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ( have_posts() ) : ?>
                            <?php $item_number = 0; ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div <?php post_class( 'col-md-12 flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                                        <?php $image_attributes = (is_singular() || in_the_loop()) ? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' ) : null; ?>
                                        <div class="flex-center image-single-wrapper" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>">
</div>
                                        <div class="single-post-wrapper">
                                            <h4 class="single-post-title"><?php the_title(); ?></h4>
                                            <div class="single-post-info">
                                                <span><?php the_date( 'j, F, Y', null, ' por' ); ?></span>
                                                <span><?php the_author(); ?></span>
                                            </div>
                                            <?php the_content(); ?>
                                        </div>
                                    </a>
                                </div>
                                <?php $item_number++; ?>
                                <?php if( $item_number % 1 == 0 ) echo '<div class="clearfix visible-md-block visible-lg-block"></div>'; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'euroamerica-v3' ); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php the_post_navigation( array(
                        'prev_text' => __( 'Anterior', 'euroamerica-v3' ),
                        'next_text' => __( 'Siguiente', 'euroamerica-v3' )
                ) ); ?>
            </div>

<?php get_footer(); ?>
