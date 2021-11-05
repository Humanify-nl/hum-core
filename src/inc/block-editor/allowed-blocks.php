<?php
/**
 * Filter which blocks are allowed by post type
 *
 * @package hum-core
 */


function hum_post_blocks_array( $post_type = false ) {

  $block_types_global = [
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/code',
    'core/preformatted',
    'core/pullquote',
    // --> media
    'core/media-text',
    'core/image',
    'core/gallery',
    'core/cover',
    'core/file',
    'core/video',
    // --> design
    'core/buttons',
    'core/button',
    'core/columns',
    'core/group',
    'core/more',
    'core/pagebreak',
    'core/separator',
    'core/spacer',
    'core/post-terms',
    // --> widgets
    'core/shortcode',
    'core/calendar',
    'core/categories',
    'core/html',
    'core/latest-comments',
    'core/latest-posts',
    'core/social-icons',
    'core/search',
    // --> theme
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    // --> embed
    'core/embed',
    'acf/post-query',
    'acf/icon',
    'forminator/forms',
  ];

  $block_types_post = [
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    //'core/code',
    'core/preformatted',
    'core/pullquote',
    // --> media
    'core/image',
    'core/gallery',
    'core/cover',
    'core/file',
    'core/video',
    // --> design
    'core/buttons',
    'core/button',
    'core/columns',
    'core/group',
    'core/more',
    'core/pagebreak',
    'core/separator',
    'core/spacer',
    'core/post-terms',
    // --> widgets
    'core/shortcode',
    'core/calendar',
    'core/social-icons',
    // --> theme
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    // --> embed
    'core/embed',
  ];

  $block_types_page = [
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    //'core/quote',
    //'core/code',
    //'core/preformatted',
    //'core/pullquote',
    // --> media
    'core/image',
    'core/gallery',
    'core/cover',
    'core/file',
    'core/video',
    // --> design
    'core/buttons',
    'core/button',
    'core/columns',
    'core/group',
    //'core/more',
    'core/pagebreak',
    'core/separator',
    'core/spacer',
    // --> widgets
    'core/shortcode',
    'core/calendar',
    'core/social-icons',
    'core/latest-posts',
    'cpre/categories',
    // --> embed
    'core/embed',
    'acf/post-query',
    'acf/icon',
    'forminator/forms',
  ];

  $block_types_block_area = [
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    //'core/code',
    'core/preformatted',
    'core/pullquote',
    // --> media
    'core/image',
    'core/gallery',
    'core/cover',
    'core/file',
    'core/video',
    // --> design
    'core/buttons',
    'core/button',
    'core/columns',
    'core/group',
    'core/spacer',
    'core/post-terms',
    // --> widgets
    'core/shortcode',
    'core/social-icons',
    // --> theme
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    // --> embed
    'core/embed',
    'acf/icon',
    'forminator/forms',
  ];

  $block_types_testimonial = [
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/columns',
    'core/group',
    'core/separator',
  ];

  switch($post_type) {

    case 'post':
      $block_array = $block_types_post;
      break;

    case 'page':
      $block_array = $block_types_global; //$block_types_page;
      break;

    case 'testimonial':
      $block_array = $block_types_testimonial;
      break;

    case 'block_area':
      $block_array = $block_types_block_area;
      break;

    default:
      $block_array = $block_types_global;
      break;
  }

  if ( ! empty( $block_array ) ) {

    return $block_array;

  }

}




function hum_filter_allowed_block_types( $allowed_block_types, $editor_context ) {

  if ( ! empty( $editor_context->post ) ) {

    if ( get_post_type( get_the_id() ) === 'post') {

      return hum_post_blocks_array( 'post' );

    } elseif ( get_post_type( get_the_id() ) === 'page' ) {

      return hum_post_blocks_array( 'page' );

    } elseif ( get_post_type( get_the_id() ) === 'block_area') {

      return hum_post_blocks_array( 'block_area' );

    } elseif ( get_post_type( get_the_id() ) === 'testimonial') {

      return hum_post_blocks_array( 'testimonial' );

    } else {

      return hum_post_blocks_array( 'global' );

    }

  }
  return $allowed_block_types;
}

add_filter( 'allowed_block_types_all', 'hum_filter_allowed_block_types', 10, 2 );


// remove dropcap
add_filter(
  'block_editor_settings',
  function ($editor_settings) {
    $editor_settings['__experimentalFeatures']['typography']['dropCap'] = false;
    return $editor_settings;
  }
);
