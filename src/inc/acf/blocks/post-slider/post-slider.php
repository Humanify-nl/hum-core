<?php
function register_post_slider_block() {

  $register_post_slider = [
    'name'              => 'post-slider',
    'title'             => __('Post Slider'),
    'description'       => __('Display a configurable slider of post-type previews.'),
    'render_callback'   => 'hum_render_post_slider_block',
    'category'          => 'design',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'slider', 'post' ],
    'mode'              => 'preview',
    'enqueue_script'    => get_template_directory_uri() . '/assets/js/swiper-post.js',
    'supports'          => [
      'align'             => [ 'wide', 'full' ],
      'align_text'        => true,
      'align_content'     => true,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_post_slider;
}


function hum_render_post_slider_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block post-slider';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }
  if( !empty($block['align_text']) ) {
      $className .= ' has-text-align-' . $block['align_text'];
  }

  if ( $is_preview ) {

    echo '<div class="'. esc_attr($className) .'">';

    get_template_part( 'inc/acf/blocks/post-slider/post-slider-template-editor' );

    echo '</div>';

    return;

  } else {

    echo '<div class="'. esc_attr($className) .'">';

    get_template_part( 'inc/acf/blocks/post-slider/post-slider-template' );

    echo '</div>';
  }
}


function hum_init_post_slider_block() {

  acf_register_block_type(
    register_post_slider_block()
  );

}
add_action( 'acf/init', 'hum_init_post_slider_block' );
