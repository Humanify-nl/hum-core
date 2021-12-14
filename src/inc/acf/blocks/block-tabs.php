<?php
// replace 'tabs'

function register_tabs_block() {

  $register_icon = [
    'name'              => 'tabs',
    'title'             => __('Tabs'),
    'description'       => __('A custom tabs block.'),
    'render_callback'   => 'hum_render_tabs_block',
    'category'          => 'media',
    'icon'              => 'index-card',
    'keywords'          => [ 'tabs', 'tab' ],
    //'post_types'        => [ 'post', 'page' ],
    //'align'             => 'left',     // left, center, right, wide and full.
    //'align_text'        => 'left',     // left, center, right
    'mode'              => 'preview',  // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/js/tabs.js',
    'supports'          => [
      'align'             => [ 'wide', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => false,    // text alignment toolbar
      'align_content'     => false,   // content alignment toolbar
      'mode'              => true,    // preview/edit toggle
      'multiple'          => false,
      'customClassName'	  => true,
      //'jsx' 			        => true,
    ],
    'styles'            => [
      [
        'name'            => 'unwrap',
        'label'           => __( 'Unwrap background', 'hum-core'),
      ]
    ],
    /*
    // Specifying an anonymouse function
    'enqueue_assets' => function(){
      wp_enqueue_script( 'block-tabs', get_template_directory_uri() . '/assets/js/tabs.js', array('jquery'), '', true );
    },
    */
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
