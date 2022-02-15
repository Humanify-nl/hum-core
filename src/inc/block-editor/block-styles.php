<?php
/**
 * Block styles
 *
 * @package hum-core
 */


function hum_register_block_styles() {

  register_block_style(
    'core/categories',
      [
         'name'         => 'horizontal',
         'label'        => 'Horizontal',
      ]
  );

  register_block_style(
    'core/group',
      [
         'name'         => 'section',
         'label'        => 'Section',
         //'inline_style' => '.is-style-no-space { margin: 2rem 0 }',
         //'style_handle' => 'block-css-style-spaced',
      ]
  );

  register_block_style(
    'core/group',
      [
         'name'         => 'pull-up',
         'label'        => 'Pull blocks up',
      ]
  );

  register_block_style(
    'core/group',
      [
         'name'         => 'pull-up-over',
         'label'        => 'Pull blocks up over',
      ]
  );

  register_block_style(
    'core/columns',
      [
         'name'         => 'space-between',
         'label'        => 'Space between',
      ]
  );

  register_block_style(
    'core/column',
      [
         'name'         => 'center-mobile',
         'label'        => 'Center mobile',
      ]
  );

  register_block_style(
    'core/cover',
      [
         'name'         => 'shape',
         'label'        => 'Shape',
      ],
  );

  register_block_style(
    'core/quote',
      [
         'name'         => 'background',
         'label'        => 'Background',
      ]
  );

  register_block_style(
    'core/list',
      [
         'name'         => 'no-dots',
         'label'        => 'No Dots',
      ],
  );

  register_block_style(
    'core/list',
      [
         'name'         => 'fa-icon',
         'label'        => 'Icon FA',
      ],
  );

  register_block_style(
    'core/list',
      [
         'name'         => 'horizontal',
         'label'        => 'Horizontal',
      ],
  );


  register_block_style(
    'core/table',
      [
         'name'         => 'background',
         'label'        => 'Background',
      ],
  );


}
add_action( 'after_setup_theme' , 'hum_register_block_styles' );
