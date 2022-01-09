<?php
function register_tabs_block() {

  $register_icon = [
    'name'              => 'tabs',
    'title'             => __('Tabs'),
    'description'       => __('Display content inside tabs.'),
    'render_callback'   => 'hum_render_tabs_block',
    'category'          => 'design',
    'icon'              => 'index-card',
    'keywords'          => [ 'tabs', 'tab' ],
    'mode'              => 'preview',
    'enqueue_script'    => get_template_directory_uri() . '/assets/js/tabs.js',
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
        'name'            => 'unwrap',
        'label'           => __( 'Fullwidth', 'hum-core'),
      ]
    ],
  ];

  return $register_icon;
}


function hum_render_tabs_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'acf-block block-tabs';

  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }


  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  // Front-end output

  echo '<div class="'. esc_attr($className) .'">';

  get_template_part( 'template-parts/acf/tabs/tabs' );

  echo '</div>';


}
