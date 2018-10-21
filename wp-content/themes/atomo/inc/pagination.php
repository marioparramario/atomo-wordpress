<?php
/**
 * Custom Atomo pagination widget
 *
 * @package WordPress
 * @subpackage Atomo
 */

if ( ! function_exists('atomo_get_pagination') ) {
	/**
	 * Generate boostrap4 based pagination
	 *
	 * @param array $args (Optional) Alternative parameters.
	 */
	function atomo_get_pagination( array $args = null ) {

		$defaults = [
			'range'           => 4,
			'custom_query'    => false,
			'previous_string' => __( '&laquo;', 'atomo' ),
			'next_string'     => __( '&raquo;', 'atomo' ),
			'first_string'    => __( 'First', 'atomo'),
			'last_string'     => __( 'Last', 'atomo'),
			'before_output'   => '<ul class="pagination">',
			'after_output'    => '</ul>',
		];

		$args = wp_parse_args( $args, apply_filters( 'atomo_pagination_defaults', $defaults ) );

		$args['range'] = (int) $args['range'] - 1;
		if ( ! $args['custom_query'] ) {
			$args['custom_query'] = @$GLOBALS['wp_query'];
		}

		$count = (int) $args['custom_query']->max_num_pages;
		$page  = intval( get_query_var( 'paged' ) );
		$ceil  = ceil( $args['range'] / 2 );
		$out   = '';

		if ( $count <= 1 ) {
			return false;
		}

		if ( ! $page ) {
			$page = 1;
		}

		if ( $count > $args['range'] ) {
			if ( $page <= $args['range'] ) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif ( $page >= ( $count - $ceil ) ) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif ( $page >= $args['range'] && $page < ( $count - $ceil ) ) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}

		$previous  = intval( $page ) - 1;
		$previous  = esc_attr( get_pagenum_link( $previous)  );
		$firstpage = esc_attr( get_pagenum_link(1) );

		if ( $firstpage && ( 1 !== $page || true ) ) {
			$disabled = 1 === $page ? ' disabled' : '';

			$link = sprintf( '<a class="page-link" href="%s" aria-label="%s">%s</a>', $firstpage, __( 'First', 'atomo' ), $args['first_string'] );
			$out .= sprintf( '<li class="page-item previous%s">%s</li>', $disabled, $first );
		}

		if ( $previous && ( 1 !== $page || true ) ) {
			$disabled = 1 === $page ? ' disabled' : '';

			$link = sprintf( '<a class="page-link" href="%s" title="%s" aria-label="%s">%s</a>', $previous, __( 'previous', 'atomo' ), __( 'previous', 'atomo'), $args['previous_string'] );
			$out .= sprintf( '<li class="page-item%s">%s</li>', $disabled, $link );
		}

		if ( ! empty( $min ) && ! empty( $max ) ) {
			for( $i = $min; $i <= $max; $i++ ) {
				$active = $page === $i ? ' active' : '';

				$href = esc_attr( get_pagenum_link( $i ) );
				$link = sprintf( '<a class="page-link%s" href="%s">%d</a>', $active, $href );
				$out .= sprintf( '<li class="page-item%s">%s</li>', $active, $link );
			}
		}

		$next = intval( $page ) + 1;
		$next = esc_attr( get_pagenum_link( $next ) );
		if ( $next && ( $count !== $page || true ) ) {
			$disabled = $page === $count ? ' disabled' : '';

			$link = sprintf( '<a class="page-link" href="%s" title="%s" aria-label="%s">%s</a>', $next, __( 'next', 'atomo'), __( 'next', 'atomo'), $args['next_string'] );
			$out .= sprintf( '<li class="page-item%s">%s</li>', $disabled, $link );
		}

		$lastpage = esc_attr( get_pagenum_link( $count ) );
		if ( $lastpage ) {
			$disabled = $page === $count ? ' disabled' : '';

			$link = sprintf( '<a class="page-link" href="%s" aria-label="%s">%s</a>', $lastpage, __( 'Last', 'atomo'), $args['last_string'] );
			$out .= sprintf( '<li class="page-item next%s">%s</li>', $disabled, $link );
		}

		if ( empty( $out ) ) {
			return '';
		}

		return $args['before_output'] . $out . $args['after_output'];
	}
}


if ( ! function_exists('atomo_pagination') ) {
	/**
	 * Render customized pagination
	 */
	function atomo_pagination( array $args = null ) {
		echo atomo_get_pagination( $args );
	}
}
