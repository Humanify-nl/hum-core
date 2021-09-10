<?php
/**
 * Archive
 *
 * @package hum-core
 */


// Full width
// add_filter( 'hum_page_layout', 'hum_return_full_width_content' );

/**
 * Body Class
 *
 */
function hum_archive_body_class( $classes ) {
	$classes[] = 'archive';
	return $classes;
}
add_filter( 'body_class', 'hum_archive_body_class' );


// Archive header
add_action( 'tha_content_while_before', 'hum_archive_header' );

// Breadcrumbs
add_action( 'hum_archive_header_before', 'hum_breadcrumbs', 5 );

// Build the page
require get_template_directory() . '/index.php';
