<?php
/**
 * The template for displaying all single posts
 *
 * @package hum-core
 */

// Entry category in header
add_action( 'tha_entry_top', 'hum_entry_category', 8 );
add_action( 'tha_entry_top', 'hum_entry_excerpt', 10 );
add_action( 'tha_entry_top', 'hum_entry_author', 12 );
add_action( 'tha_entry_top', 'hum_entry_image', 14 );
//add_action( 'tha_entry_top', 'hun_entry_header_share', 13 );

add_filter( 'hum_page_layout', 'hum_return_content_center' );

function hum_block_area_after() {
	hum_block_area()->show( 'after-entry' );
}
add_action( 'tha_content_bottom', 'hum_block_area_after' );

// After entry
add_action( 'tha_content_while_after', 'hum_single_after_entry', 8 );

// Build the page
require get_template_directory() . '/index.php';
