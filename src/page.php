<?php
/**
 * Page default template
 *
 * @package hum-core
 */

// Breadcrumbs
add_action( 'tha_entry_top', 'hum_breadcrumbs', 8 );

//add_filter( 'hum_page_layout', 'hum_return_content_wide');

// Build the page
require get_template_directory() . '/index.php';
