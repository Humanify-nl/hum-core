<?php
// replace 'spacer'

function register_spacer_block() {

  $register_spacer = [
    'name'              => 'spacer',
    'title'             => __('Spacer'),
    'description'       => __('A vertical spacer block.'),
    'render_callback'   => 'hum_render_spacer_block',
    'category'          => 'design',
    'icon'              => 'image-flip-vertical',
    'keywords'          => [ 'icon', 'svg' ],
    'post_types'        => [ 'post', 'page' ],
    'align'             => false,     // left, center, right, wide and full.
    'align_text'        => false,     // left, center, right
    'mode'              => 'preview',  // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.css',
    //'enqueue_script'    => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.js',
    'supports'          => [
      'align'             => false,   // [ 'center', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => false,    // text alignment toolbar
      'align_content'     => false,   // content alignment toolbar
      'mode'              => true,    // preview/edit toggle
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_spacer;
}


function hum_render_spacer_block( $block, $content = '', $is_preview = false ) {

  // Debug
  // hum_print_arr($block);

  // Front-end output
  $vspacerSize = get_field('vertical-spacer');
  if ( $vspacerSize ) {
    echo '<div class="acf-block block-spacer vs-h-'. $vspacerSize['value'] .'"';
      echo 'data-title="Vertical space ' . $vspacerSize['label'] .'">';
    echo '</div>';
  }

}
