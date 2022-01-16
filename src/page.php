<?php
/**
 * Page default template
 *
 * @package hum-core
 */

//add_filter( 'hum_page_layout', 'hum_return_content_wide');

// Breadcrumbs
add_action( 'tha_entry_top', 'hum_breadcrumbs', 8 );

// Related posts
add_action( 'tha_content_bottom', 'hum_pages_related' );


// Build the page
require get_template_directory() . '/index.php';
