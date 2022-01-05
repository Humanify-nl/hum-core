<?php
function register_spacer_block() {

  $register_spacer = [
    'name'              => 'spacer',
    'title'             => __('Spacer'),
    'description'       => __('Add vertical space.'),
    'render_callback'   => 'hum_render_spacer_block',
    'category'          => 'design',
    'icon'              => 'image-flip-vertical',
    'keywords'          => [ 'icon', 'svg' ],
    'post_types'        => [ 'post', 'page' ],
    'align'             => false,
    'align_text'        => false,
    'mode'              => 'preview',
    'supports'          => [
      'align'             => false,
      'align_text'        => false,
      'align_content'     => false,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_spacer;
}


function hum_render_spacer_block( $block, $content = '', $is_preview = false ) {

  // Front-end output
  $vspacerSize = get_field( 'vertical-spacer' );
  if ( $vspacerSize ) {
    echo '<div class="acf-block block-spacer vs-h-'. $vspacerSize['value'] .'"';
      echo 'data-title="Vertical space ' . $vspacerSize['label'] .'">';
    echo '</div>';
  }

}
