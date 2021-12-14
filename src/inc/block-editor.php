<?php
/**
 * Block editor
 *
 * @package hum-core
 */

include_once( get_template_directory() . '/inc/block-editor/editor-assets.php');
include_once( get_template_directory() . '/inc/block-editor/editor-layout.php' );
include_once( get_template_directory() . '/inc/block-editor/block-patterns.php' );
include_once( get_template_directory() . '/inc/block-editor/block-render-filters.php' );
include_once( get_template_directory() . '/inc/block-editor/block-templates.php' );
include_once( get_template_directory() . '/inc/block-editor/disable-on-template.php' );
include_once( get_template_directory() . '/inc/block-editor/block-styles.php' );
include_once( get_template_directory() . '/inc/block-editor/allowed-blocks.php' );

// dirty fix to widget area notice
remove_filter( 'admin_head', 'wp_check_widget_editor_deps' );

// get post id inside acf blocks
function hum_acf_post_id() {
	if ( is_admin() && function_exists( 'acf_maybe_get_POST' ) ) {
    return intval( acf_maybe_get_POST( 'post_id' ) );
  } else {
    global $post;
    return $post->ID;
  }
}


function hum_get_valid_id() {

	$hum_id = hum_acf_post_id();
	
	if ( $hum_id > 0 ) {
		return $hum_id;
	} else {
		global $post;
		$post_id = $post->ID;

		if ( $post_id>0 && $post_id != null ) {
		  return $post_id;
		}
	  return -1;//fail safe. In case id not found at all
	}
}
