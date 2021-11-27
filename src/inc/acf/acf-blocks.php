<?php
/**
 * Register acf blocks
 *
 * @package hum-gutenberg
 */

include_once( get_template_directory() . '/inc/acf/blocks/block-post-query.php' );
include_once( get_template_directory() . '/inc/acf/blocks/block-icon-svg.php' );
include_once( get_template_directory() . '/inc/acf/blocks/block-pagelinks.php' );
include_once( get_template_directory() . '/inc/acf/blocks/block-spacer.php' );
include_once( get_template_directory() . '/inc/acf/blocks/block-slider.php' );


function hum_acf_init_block_types() {

  // Check if function exists and hook into setup.
  if( function_exists('acf_register_block_type') ) {

    acf_register_block_type(
      register_post_query_block()
    );

    acf_register_block_type(
      register_icon_block()
    );

    acf_register_block_type(
      register_pagelinks_block()
    );

    acf_register_block_type(
      register_spacer_block()
    );

  }
}
add_action('acf/init', 'hum_acf_init_block_types');
