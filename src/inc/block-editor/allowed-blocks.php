<?php
/**
 * Filter which blocks are allowed by post type
 *
 * @package hum-core
 */


function hum_post_blocks_array( $post_type = false ) {

  $block_types_global = [
    'core/block',
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/table',
    'core/quote',
    'core/code',
    'core/preformatted',
    'core/pullquote',
    // --> media
    //'core/media-text',
    //'core/image',
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
    //'core/spacer',
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
    // --> acf
    'acf/spacer',
    'acf/post-query',
    'acf/post-single',
    'acf/post-slider',
    'acf/pages',
    'acf/slider',
    'acf/tabs',
    'acf/icon-wrap',
    'acf/svg',
    'acf/image',
    // --> vendor
    'forminator/forms',
    'yoast-seo/faq-block',
    'yoast-seo/how-to-block',
    //'yoast-seo/breadcrumbs',
  ];

  $block_types_post = [
    'core/block',
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/table',
    //'core/code',
    'core/preformatted',
    'core/pullquote',
    // --> media
    //'core/image',
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
    //'core/pagebreak',
    //'core/separator',
    //'core/spacer',
    'core/post-terms',
    // --> widgets
    'core/shortcode',
    //'core/calendar',
    'core/social-icons',
    // --> theme
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    // --> embed
    'core/embed',
    // --> acf
    'acf/post-single',
    'acf/post-slider',
    'acf/spacer',
    'acf/slider',
    'acf/tabs',
    'acf/icon-wrap',
    'acf/svg',
    'acf/image',
    // --> vendor
    'forminator/forms',
    'yoast-seo/faq-block',
    'yoast-seo/how-to-block',
  ];

  $block_types_page = [
    'core/block',
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/table',
    //'core/quote',
    //'core/code',
    //'core/preformatted',
    //'core/pullquote',
    // --> media
    //'core/image',
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
    //'core/pagebreak',
    //'core/separator',
    //'core/spacer',
    // --> widgets
    'core/shortcode',
    //'core/calendar',
    'core/social-icons',
    //'core/latest-posts',
    'core/categories',
    // --> theme
    'core/post-title',
    'core/post-featured-image',
    // --> embed
    'core/embed',
    // --> acf
    'acf/spacer',
    'acf/post-query',
    'acf/post-single',
    'acf/pages',
    'acf/slider',
    'acf/post-slider',
    'acf/tabs',
    'acf/icon-wrap',
    'acf/svg',
    'acf/image',
    // --> vendor
    'forminator/forms',
    'yoast-seo/faq-block',
    'yoast-seo/how-to-block',
  ];

  $block_types_testimonial = [
    'core/block',
    // --> text
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/columns',
    'core/group',
    //'core/separator',
    'core/post-title',
    'core/post-featured-image',
    'acf/spacer',
    'acf/post-query-related',
    'acf/slider',
    'acf/image',
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
      $block_array = $block_types_global;
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

  } else {

    return hum_post_blocks_array( 'global' );

  }
  return $allowed_block_types;
}

add_filter( 'allowed_block_types_all', 'hum_filter_allowed_block_types', 10, 2 );


// remove dropcap
add_filter(
  'block_editor_settings_all',
  function ($editor_settings) {
    $editor_settings['__experimentalFeatures']['typography']['dropCap'] = false;
    return $editor_settings;
  }
);
