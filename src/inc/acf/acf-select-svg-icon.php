<?php
/**
 * Select SVF icon
 *
 * @package hum-core
 */


/**
 * Icon library
 * Icons added here will show up in acf select field 'select_svg_icon'
 *
 */
function hum_icon_library() {

  $icons = [
    [
      'name' => 'activity',
      'title' => 'Activity',
    ],
    [
      'name' => 'chat-dots',
      'title' => 'Chat dots',
    ],
    [
      'name' => 'house',
      'title' => 'House',
    ],
    [
      'name' => 'euro',
      'title' => 'Euro',
    ],
    [
      'name' => 'heart',
      'title' => 'Heart',
    ],
    [
      'name' => 'palette',
      'title' => 'Palette',
    ],
    [
      'name' => 'sun',
      'title' => 'Sun',
    ],
    [
      'name' => 'signpost-2',
      'title' => 'Signpost',
    ],
    [
      'name' => 'lightning',
      'title' => 'Lightning',
    ],
    [
      'name' => 'info-circle',
      'title' => 'Info circle',
    ],
  ];

  return $icons;
}


function hum_shape_library() {

  $shapes = [
    [
      'name' => 'wave-001',
      'title' => 'Wave',
    ],
  ];

  return $shapes;
}


/**
 * Load icon library into field choices
 *
 */
function acf_load_svg_icon_choices( $field ) {

  // reset choices
  $field['choices'] = [];

  // load icon array
  $icons = hum_icon_library();

  // add to choices array in ACF select name : Title format.
  foreach ( $icons as $icon ) {

    $field['choices'][$icon['name']] = $icon['title'];
  }

  // return the field
  return $field;

}

add_filter('acf/load_field/name=select_svg_icon', 'acf_load_svg_icon_choices');


/**
 * Load shape library into field choices
 *
 */
function acf_load_svg_shape_choices( $field ) {

  // reset choices
  $field['choices'] = [];

  // load icon array
  $shapes = hum_shape_library();

  // add to choices array in ACF select name : Title format.
  foreach ( $shapes as $shape ) {

    $field['choices'][$shape['name']] = $shape['title'];
  }

  // return the field
  return $field;

}

add_filter('acf/load_field/name=select_svg_shape', 'acf_load_svg_shape_choices');
