<?php
function register_slider_block() {


  $register_icon = [
    'name'              => 'slider',
    'title'             => __('Slider'),
    'description'       => __('Display multiple slides with image and text in a slider.'),
    'render_callback'   => 'hum_render_slider_block',
    'category'          => 'media',
    'icon'              => 'leftright',
    'keywords'          => [ 'slider', 'swiper' ],
    'mode'              => 'preview',
    'enqueue_script'    => get_template_directory_uri() . '/assets/js/swiper.js',
    //'enqueue_style'    => get_template_directory_uri() . '/assets/css/swiper.css',
    'supports'          => [
      'align'             => [ 'wide', 'full' ],
      'align_text'        => false,
      'align_content'     => false,
      'mode'              => true,
      'multiple'          => false,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],
    'styles'            => [
      [
        'name'            => 'buttons-outside',
        'label'           => __( 'Button outside', 'hum-core'),
      ]
    ],
  ];

  return $register_icon;
}


function hum_render_slider_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'acf-block block-slider';

  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
  }


  if ( $is_preview ) {

    // Construct html for editor

    echo '<div class="'. esc_attr($className) .'">';

      get_template_part( 'inc/acf/blocks/slider/slider-template-editor' );

    echo '</div>';

    return;

  } else {


    // Front-end output

    echo '<div class="'. esc_attr($className) .'">';

      get_template_part( 'inc/acf/blocks/slider/slider-template' );

    echo '</div>';
  }

}


function hum_init_slider_block() {

  acf_register_block_type(
    register_slider_block()
  );

}
add_action( 'acf/init', 'hum_init_slider_block' );
