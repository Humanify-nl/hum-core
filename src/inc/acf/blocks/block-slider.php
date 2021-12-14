<?php
function register_slider_block() {

  $register_icon = [
    'name'              => 'slider',
    'title'             => __('Slider'),
    'description'       => __('A custom slider block.'),
    'render_callback'   => 'hum_render_slider_block',
    'category'          => 'media',
    'icon'              => 'leftright',
    'keywords'          => [ 'slider', 'swiper' ],
    'post_types'        => [ 'post', 'page' ],
    'mode'              => 'preview',  // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/js/swiper.js',
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


  if ( $is_preview ) {

    // construct html for editor
    echo '<div class="'. esc_attr($className) .'">';

      get_template_part( 'template-parts/acf/slider/slider-editor' );

    echo '</div>';

    return;

  } else {

    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }

    // Front-end output

    echo '<div class="'. esc_attr($className) .'">';

    get_template_part( 'template-parts/acf/slider/slider' );

    echo '</div>';
  }


}
