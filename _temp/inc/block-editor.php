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
