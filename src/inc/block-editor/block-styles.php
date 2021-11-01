<?php
/**
 * Block styles
 *
 * @package hum-core
 */


function hum_register_block_styles() {

  register_block_style(
    'core/group',
      [
         'name'         => 'no-space',
         'label'        => 'No spacing',
         //'inline_style' => '.is-style-no-space { margin: 2rem 0 }',
         //'style_handle' => 'block-css-style-spaced',
      ]
  );

  register_block_style(
    'core/columns',
      [
         'name'         => 'no-space',
         'label'        => 'No spacing',
      ]
  );

  register_block_style(
    'core/quote',
      [
         'name'         => 'background',
         'label'        => 'Background',
      ]
  );

}
add_action( 'after_setup_theme' , 'hum_register_block_styles' );
