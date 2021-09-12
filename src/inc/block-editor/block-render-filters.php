<?php
/**
 * Block output filters
 *
 * @package hum-gutenberg
 */

/*
 * Extend block output filter
 * @see https://javascriptforwp.com/extending-wordpress-blocks/
 */

add_filter( 'render_block', 'hum_block_filter', 10, 3);

function hum_block_filter( $block_content, $block ) {

  if ( $block['blockName'] === 'hum/header' ) {

    $content = '<div class="wp-block-paragraph">';
    $content .= $block_content;
    $content .= '</div>';
    return $content;

  } else {

    return $block_content;

  }

}
