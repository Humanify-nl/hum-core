<?php
/**
 * Sidebar
 *
 * @package hum-core
**/

if ( ! function_exists( 'hum_page_layout' ) )
	return;

$layout = hum_page_layout();
if ( ! in_array( $layout, array( 'content-sidebar', 'sidebar-content' ) ) )
	return;

$sidebar = apply_filters( 'hum_sidebar', 'primary-sidebar' );
$display = is_active_sidebar( $sidebar );
if ( ! apply_filters( 'hum_display_sidebar', $display ) )
	return;

tha_sidebars_before();

echo '<aside class="sidebar-primary" role="complementary">';

	tha_sidebar_top();
	if ( is_active_sidebar( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	}
	tha_sidebar_bottom();

echo '</aside>';

tha_sidebars_after();
