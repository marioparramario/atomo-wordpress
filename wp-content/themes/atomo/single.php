<?php
/**
 * Atomo template displaying a single article.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @subpackage atomo
 */

$item_number = 0;

get_header(); ?>


<div class="container flex vertical align-center">
<?php if ( is_singular() ): ?>
	<section class="single singular">
		<div class="single-container flex-vertical">
		<?php if ( !have_posts() ): ?>
			<p class="no-posts"><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
		<?php else: ?>
			<?php while ( have_posts() ) { the_post(); ?>
			<article <?php post_class( 'flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
				<?php $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'normal' ); ?>
				<div class="single-image" style="<?php echo "background-image: url('$thumb_url')"; ?>"></div>
				<div class="single-text-wrapper">
					<div class="single-social sticky"></div>
					<div class="single-text-container flex vertical">
						<h3 class="single-post-title"><?php the_title(); ?></h3>
						<h4><?php the_author(); ?></h4>
						<span><?php the_date( 'j, F, Y', null, __( ' by', 'atomo' ) ); ?></span>
						<div class="post-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php $item_number++; } ?>
	<?php endif; ?>
<?php else: ?>
	<section class="single">
		<div class="single-container flex-vertical">
		<?php if ( !have_posts() ): ?>
			<p class="no-posts"><?php _e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
		<?php else: ?>
			<?php while ( have_posts() ) { the_post(); ?>
			<article <?php post_class( 'col-md-12 flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
				<a class="perma-link" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'normal' ); ?>
					<div class="flex-center image-single-wrapper" style="<?php echo "background-image: url('$thumb_url')"; ?>"></div>
					<div class="single-post-wrapper">
						<h4 class="single-post-title"><?php the_title(); ?></h4>
						<div class="single-post-info">
							<span><?php the_date( 'j, F, Y', null, __( ' by', 'atomo' ) ); ?></span>
							<span><?php the_author(); ?></span>
						</div>
						<div class="post-body">
							<?php the_content(); ?>
						</div>
					</div>
				</a>
			</article><!-- #post-<?php the_ID(); ?> -->
		<?php $item_number++; } ?>
	<?php endif; ?>

<?php endif; ?>

	<?php the_post_navigation( [
			'prev_text' => __( 'Previous', 'atomo' ),
			'next_text' => __( 'Next', 'atomo' )
	] ); ?>
		</div><!-- .single-container -->
	</section><!-- .single -->
</div><!-- .container -->


<?php get_footer(); ?>
