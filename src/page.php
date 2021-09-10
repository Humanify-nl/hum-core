<?php
/**
 * Page default template
 *
 * @package hum-core
 */

// Breadcrumbs
add_action( 'tha_entry_top', 'hum_breadcrumbs', 8 );

// Build the page
require get_template_directory() . '/index.php';
