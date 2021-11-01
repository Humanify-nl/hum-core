<?php
/**
 * Block output filters
 *
 * @package hum-core
 */

/*
 * Extend block output filter
 * @see https://javascriptforwp.com/extending-wordpress-blocks/
 */
function hum_block_filter( $block_content, $block ) {

  if ( get_post_type( get_the_id() ) === 'post' || get_post_type( get_the_id() ) === 'testimonial' ) {

    if ( $block['blockName'] === 'core/post-excerpt' ) {
      return;
    }
  }

  if ( $block['blockName'] === 'core/list' ) {
    $block_content = '<div class="wp-block-list">' .$block_content. '</div>';
  }

  return $block_content;
}
add_filter( 'render_block', 'hum_block_filter', 10, 3);
