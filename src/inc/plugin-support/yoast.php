<?php
/**
 * Yoast support
 *
 * @package hum-core
 */


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
add_filter('wpseo_breadcrumb_single_link', 'hum_remove_breadcrumb_title' );


/**
 * Move Yoast to bottom
 *
 */
function hum_yoast_tobottom() {

	return 'low';

}
add_filter( 'wpseo_metabox_prio', 'hum_yoast_tobottom' );



/**
 * Fix content analysis for ACF fields
 * @link https://github.com/Yoast/yoast-acf-analysis/issues/272
 *
 */
/*
add_filter('admin_enqueue_scripts', function() {

	$yoast_acf_analysis_plugin_data = get_plugin_data( AC_SEO_ACF_ANALYSIS_PLUGIN_FILE );
	$config = Yoast_ACF_Analysis_Facade::get_registry()->get( 'config' );

	// Post page enqueue.
	if ( wp_script_is( WPSEO_Admin_Asset_Manager::PREFIX . 'post-edit-classic' ) ) {
		wp_enqueue_script(
			'yoast-acf-analysis-post',
			plugins_url( '/js/yoast-acf-analysis.js', AC_SEO_ACF_ANALYSIS_PLUGIN_FILE ),
			[ 'jquery', WPSEO_Admin_Asset_Manager::PREFIX . 'post-edit-classic', 'underscore' ],
			$yoast_acf_analysis_plugin_data['Version'],
			true
		);

		wp_localize_script( 'yoast-acf-analysis-post', 'YoastACFAnalysisConfig', $config->to_array() );
	}
}, 20, 0);
*/
