<?php
/**
 * Atomo template displaying a single article.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Atomo
 */

$atomo_item_number = 0;

get_header(); ?>


<div class="container flex vertical align-center">
<?php if ( is_singular() ) : ?>

	<section class="single singular">
	<?php if ( ! have_posts() ) : ?>
		<div class="single-container flex-vertical empty">
			<p class="sorry no-posts"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
		</div>
	<?php else : ?>
		<div class="single-container flex vertical">
			<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
				<?php $atomo_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'normal' ); ?>
				<div class="single-image" style="<?php echo "background-image: url('$atomo_thumb_url')"; ?>"></div>
				<div class="single-text-wrapper">
					<div class="single-social sticky"></div>
					<div class="single-text-container flex vertical">
						<h1 class="single-post-title"><?php the_title(); ?></h1>
						<?php
							$atomo_author = atomo_post_author( $post->ID );
							if ( ! empty( $atomo_author ) ) {
								echo '<h4 class="author">' . $atomo_author . '</h4>';
							}

							$atomo_author_designation = atomo_post_author_designation( $post->ID );
							if ( ! empty( $atomo_author_designation ) ) {
								echo '<span class="designation">' . $atomo_author_designation . '</span>';
							}

							$atomo_location = atomo_post_location( $post->ID );
							if ( ! empty( $atomo_location ) ) {
								echo '<span class="location">' . $atomo_location . '</span>';
							}
						?>
						<div class="post-body">
							<?php the_content(); ?>
						</div>
						<img class="single-icon self-end" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso-black.svg" alt="">
					</div>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php $atomo_item_number++; ?>
		<?php endwhile; ?>
	<?php endif; /* have_posts */ ?>
	</div><!-- .single-container -->

<?php else : /* is_singular */ ?>

	<section class="single">
	<?php if ( ! have_posts() ) : ?>
		<div class="single-container flex-vertical empty">
			<p class="sorry no-posts"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'atomo' ); ?></p>
		</div>
	<?php else : ?>
		<div class="single-container flex-vertical">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'col-md-12 flex-vertical' ); ?> id="post-<?php the_ID(); ?>">
				<a class="perma-link" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php $atomo_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'normal' ); ?>
					<div class="flex-center image-single-wrapper" style="<?php echo "background-image: url('$atomo_thumb_url')"; ?>"></div>
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
			<?php $atomo_item_number++; ?>
		<?php endwhile; ?>
		</div><!-- .single-container -->
	<?php endif; /* have_posts */ ?>

<?php endif; ?>

	<?php the_post_navigation( [ 'prev_text' => __( 'Previous', 'atomo' ), 'next_text' => __( 'Next', 'atomo' )] ); ?>

	</section><!-- .single -->
</div><!-- .container -->


<?php get_footer(); ?>
