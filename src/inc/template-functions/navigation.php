<?php
/**
 * Navigation
 *
 * @package hum-core
 */

/**
 * Mobile Menu
 *
 */
function hum_site_header() {

	echo hum_mobile_menu_toggle();
	echo hum_search_toggle();

	echo '<nav' . hum_amp_class( 'nav-menu', 'active', 'menuActive' ) . ' role="navigation">';

		if( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'nav-primary' ] );
		}
		if( has_nav_menu( 'secondary' ) ) {
			wp_nav_menu( [ 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'container_class' => 'nav-secondary' ] );
		}

	echo '</nav>';

	echo '<div' . hum_amp_class( 'header-search', 'active', 'searchActive' ) . '>' . get_search_form( [ 'echo' => false ] ) . '</div>';
}
add_action( 'tha_header_bottom', 'hum_site_header', 11 );


/**
 * Nav Extras
 *
 */
function hum_nav_extras( $menu, $args ) {

	if( 'primary' === $args->theme_location ) {
		$menu .= '<li class="menu-item search">' . hum_search_toggle() . '</li>';
	}

	if( 'secondary' === $args->theme_location ) {
		$menu .= '<li class="menu-item search">' . get_search_form( false ) . '</li>';
	}

	return $menu;
}
add_filter( 'wp_nav_menu_items', 'hum_nav_extras', 10, 2 );


/**
 * Search toggle
 *
 */
function hum_search_toggle() {

	$output = '<button' . hum_amp_class( 'search-toggle', 'active', 'searchActive' ) . hum_amp_toggle( 'searchActive', [ 'menuActive', 'mobileFollow' ] ) . '>';
		$output .= hum_get_icon( [ 'icon' => 'search', 'size' => 24, 'class' => 'open' ] );
		$output .= hum_get_icon( [ 'icon' => 'close', 'size' => 24, 'class' => 'close' ] );
		$output .= '<span class="screen-reader-text">Search</span>';
	$output .= '</button>';

	return $output;

}


/**
 * Mobile menu toggle
 *
 */
function hum_mobile_menu_toggle() {

	$output = '<button' . hum_amp_class( 'menu-toggle', 'active', 'menuActive' ) . hum_amp_toggle( 'menuActive', [ 'searchActive', 'mobileFollow' ] ) . '>';
		$output .= hum_get_icon( [ 'icon' => 'menu', 'size' => 24, 'class' => 'open' ] );
		$output .= hum_get_icon( [ 'icon' => 'close', 'size' => 24, 'class' => 'close' ] );
		$output .= '<span class="screen-reader-text">Menu</span>';
	$output .= '</button>';

	return $output;
}


/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function hum_nav_add_dropdown_icons( $output, $item, $depth, $args ) {

	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = hum_get_icon( [ 'icon' => 'navigate-down', 'size' => 8, 'title' => 'Submenu Dropdown' ] );

		$output .= sprintf(
			'<button' . hum_amp_nav_dropdown( $args->theme_location, $depth ) . ' tabindex="-1">%s</button>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'hum_nav_add_dropdown_icons', 10, 4 );


/**
 * Previous/Next Archive Navigation (disabled)
 *
 */
function hum_archive_navigation() {
	if( ! is_singular() )
		the_posts_navigation();
}
//add_action( 'tha_content_while_after', 'hum_archive_navigation' );


/**
 * Archive Paginated Navigation
 *
 */
function hum_archive_paginated_navigation() {

	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	// Stop execution if there's only one page.
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = (int) $wp_query->max_num_pages;

	// Add current page to the array.
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	// Add the pages around the current page to the array.
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="archive-pagination pagination">';

	$before_number = '<span class="screen-reader-text">' . __( 'Go to page', 'ea-starter' ) . '</span>';

	printf( '<ul role="navigation" aria-label="%s">', esc_attr__( 'Pagination', 'ea-starter' ) );

	// Previous Post Link.
	if ( get_previous_posts_link() ) {
		$label		= __( '<span class="screen-reader-text">Go to</span> Previous Page', 'ea-starter' );
		$link       = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '&#x000AB; ' . $label ) );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is hardcoded and safe, not set via input.
		printf( '<li class="pagination-previous">%s</li>' . "\n", $link );
	}

	// Link to first page, plus ellipses if necessary.
	if ( ! in_array( 1, $links, true ) ) {
		$class = 1 === $paged ? ' class="active"' : '';

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( 1 ), trim( $before_number . ' 1' ) );

		if ( ! in_array( 2, $links, true ) ) {
			$label	= sprintf( '<span class="screen-reader-text">%s</span> &#x02026;', __( 'Interim pages omitted', 'ea-starter' ) );
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
			printf( '<li class="pagination-omission">%s</li> ' . "\n", $label );
		}
	}

	// Link to current page, plus 2 pages in either direction if necessary.
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = '';
		$aria  = '';
		if ( $paged === $link ) {
			$class = ' class="active" ';
			$aria  = ' aria-label="' . esc_attr__( 'Current page', 'ea-starter' ) . '" aria-current="page"';
		}

		printf(
			'<li%s><a href="%s"%s>%s</a></li>' . "\n",
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			$class,
			esc_url( get_pagenum_link( $link ) ),
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			$aria,
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
			trim( $before_number . ' ' . $link )
		);
	}

	// Link to last page, plus ellipses if necessary.
	if ( ! in_array( $max, $links, true ) ) {

		if ( ! in_array( $max - 1, $links, true ) ) {
			$label = sprintf( '<span class="screen-reader-text">%s</span> &#x02026;', __( 'Interim pages omitted', 'ea-starter' ) );
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is known to be safe, not set via input.
			printf( '<li class="pagination-omission">%s</li> ' . "\n", $label );
		}

		$class = $paged === $max ? ' class="active"' : '';
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is safe, not set via input.
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( $max ), trim( $before_number . ' ' . $max ) );

	}

	// Next Post Link.
	if ( get_next_posts_link() ) {
		$label = __( '<span class="screen-reader-text">Go to</span> Next Page', 'ea-starter' );
		$link       = get_next_posts_link( apply_filters( 'genesis_next_link_text', $label . ' &#x000BB;' ) );
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is hardcoded and safe, not set via input.
		printf( '<li class="pagination-next">%s</li>' . "\n", $link );
	}

	echo '</ul>';
	echo '</nav>';
}
add_action( 'tha_content_while_after', 'hum_archive_paginated_navigation' );
