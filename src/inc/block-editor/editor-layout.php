<?php
/**
 * Layout (sidebars) - editor
 *
 * @package hum-core
 */

/**
 * Gutenberg layout style
 *
 */

function hum_editor_layout_style() {

	wp_enqueue_style(
		'hum-editor-layout',
		get_stylesheet_directory_uri() . '/assets/css/layout.css',
		[],
		filemtime( get_stylesheet_directory() . '/assets/css/layout.css' )
	);
}
add_action( 'enqueue_block_editor_assets', 'hum_editor_layout_style' );


/**
 * Editor layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-layout/
 *
 * @param string $classes
 * @return string
 */

function hum_editor_layout_class( $classes ) {

	$screen = get_current_screen();

	if( ! $screen->is_block_editor() ) {
    return $classes;
  }
  // check for post ID in editor
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;

	if ( $post_id ) {

		$selected = hum_page_layout( $post_id );

		if ( get_post_type( $post_id ) == 'post' ) {
			$layout = 'content-center';

		} elseif ( get_post_type( $post_id ) == 'testimonial' ) {
			$layout = 'content-center';

		} else {

			$layout = $selected;
		}

		$classes .= ' ' . $layout . ' ';

	} else {
		// new post / page
		if ( $screen->post_type === 'post' ) {
			$classes .= ' content-center';
		} elseif ( $screen->post_type === 'page' ) {
			$classes .= ' content-wide';
		} elseif ( $screen->post_type === 'testimonial' ) {
			$classes .= ' content-center';
		}
	}

	return $classes;
}
add_filter( 'admin_body_class', 'hum_editor_layout_class' );
