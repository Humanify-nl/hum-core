<?php
/**
 * Yoast support
 *
 * @package hum-core
 */


/**
 * Yoast breadcrumbs
 *
 */
function hum_breadcrumbs() {

	if ( function_exists('yoast_breadcrumb') ) {

		// posts
		if ( is_single() ) {

			echo '<div class="yoast">';
				yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
			echo '</div>';

		// pages with parents
		} elseif ( has_post_parent() ) {

			echo '<div class="yoast">';
				yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
			echo '</div>';
		}
	}
}


/**
 * Remove post title from breadcrumbs tail
 *
 */
function hum_remove_breadcrumb_title( $link_output) {

	if ( strpos ( $link_output, 'breadcrumb_last' ) !== false ) {
		$link_output = '<span class="bc_trail"></span>';
	}

 return $link_output;

}
add_filter( 'wpseo_breadcrumb_single_link', 'hum_remove_breadcrumb_title' );


/**
 * Move Yoast to bottom
 *
 */
function hum_yoast_tobottom() {

	return 'low';

}
add_filter( 'wpseo_metabox_prio', 'hum_yoast_tobottom' );


/**
 * Remove Yoast dashboard box
 *
 */
function hum_remove_wpseo_dashboard_overview() {

  // In some cases, you may need to replace 'side' with 'normal' or 'advanced'.
  remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );

}
add_action( 'wp_dashboard_setup', 'hum_remove_wpseo_dashboard_overview' );
