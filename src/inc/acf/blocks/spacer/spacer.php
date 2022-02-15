<?php
function register_spacer_block() {

  $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8zM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10z"/></svg>';

  $register_spacer = [
    'name'              => 'spacer',
    'title'             => __('Spacer'),
    'description'       => __('Add vertical space.'),
    'render_callback'   => 'hum_render_spacer_block',
    'category'          => 'design',
    'icon'              => $icon_svg,
    'keywords'          => [ 'icon', 'svg' ],
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


function hum_init_spacer_block() {

  acf_register_block_type(
    register_spacer_block()
  );

}
add_action( 'acf/init', 'hum_init_spacer_block' );
