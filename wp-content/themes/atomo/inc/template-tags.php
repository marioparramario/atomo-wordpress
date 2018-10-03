<?php
/**
 * Custom template tags for Átomo WordPress
 *
 * @package Atomo
 */

require_once ABSPATH . 'wp-admin/includes/plugin.php';


if ( ! function_exists( 'atomo_posted_on' ) ) {
	/*
	 * Show HTML with datetime meta information.
	 */
	function atomo_posted_on( $posts_url = '' ) {
		 $author = get_the_author();
		 if ( ! $posts_url ) {
			 $posts_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
		 }

		 // Get the author name; wrap it in a link.
	 	$vcard = sprintf(
	 		/* translators: %s: post author */
	 		__( 'by %s', 'atomo' ),
	 		'<span class="author vcard"><a class="url fn n" href="' . esc_url( $url ) . '">' . get_the_author() . '</a></span>'
	 	);

	 	// Finally, let's write all of this to the page.
	 	echo '<span class="posted-on">' . atomo_time_link() . '</span><span class="byline"> ' . $vcard . '</span>';
	 }
}

if ( ! function_exists( 'atomo_edit_link' ) ) {
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function atomo_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'atomo' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}

if ( ! function_exists( 'atomo_time_link' ) ) {
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function atomo_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">Posted on</span> %s', 'atomo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
}

if ( ! function_exists( 'atomo_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function atomo_entry_footer() {

		/* translators: used between list items, there is a space after the comma */
		$separate_meta = __( ', ', 'atomo' );

		// Get Categories for posts.
		$categories_list = get_the_category_list( $separate_meta );

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', $separate_meta );

		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( ( ( atomo_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<footer class="entry-footer">';

				if ( 'post' === get_post_type() ) {
					if ( ( $categories_list && atomo_categorized_blog() ) || $tags_list ) {
						echo '<span class="cat-tags-links">';

							// Make sure there's more than one category before displaying.
							if ( $categories_list && atomo_categorized_blog() ) {
								echo '<span class="cat-links">' . twentyseventeen_get_svg( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . __( 'Categories', 'atomo' ) . '</span>' . $categories_list . '</span>';
							}

							if ( $tags_list && ! is_wp_error( $tags_list ) ) {
								echo '<span class="tags-links">' . atomo_get_svg( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . __( 'Tags', 'atomo' ) . '</span>' . $tags_list . '</span>';
							}

						echo '</span>';
					}
				}

				atomo_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function atomo_categorized_blog() {
	$category_count = get_transient( 'atomo_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( [
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		] );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'atomo_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


if ( ! function_exists( 'atomo_excerpt' ) ) {
	/**
	 * Display a short excerpt of the post's contents.
	 *
	 * @param array $args (Optional) Arguments for generating the excerpt.
	 * @see https://wordpress.org/plugins/advanced-excerpt/
	 */
	function atomo_excerpt( array $args = null ) {
		echo atomo_get_excerpt( $args );
	}

	/**
	 * Get short excerpt of the post's contents.
	 *
	 * @param array $args (Optional) Arguments for generating the excerpt.
	 * @return string Short excerpt text.
	 */
	function atomo_get_excerpt( array $args = null ) {

		$allowed_defaults = [
			'a', 'acronym',
			'b', 'br',
			'em',
			'i',
			'q',
			's', 'strike', 'strong', 'sub', 'sup',
			'u'
		];

		$defaults = [
			'length'        => 20,
			'length_type'   => 'words',
			'allowed_tags'  => $allowed_defaults
		];

		$args = wp_parse_args( $args, $defaults );

		if ( is_array( $args['allowed_tags'] ) ) {
			$args['allowed_tags'] = implode( ',', $args['allowed_tags'] );
		}

		$query = join( '&', $args );

		if ( is_plugin_active( 'advanced-excerpt' ) && function_exists( 'the_advanced_excerpt' ) ) {
			$out = the_advanced_excerpt( $query, true );
		} else {
			$out = get_the_excerpt();
		}

		return $out;
	}
}
