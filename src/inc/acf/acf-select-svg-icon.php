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



function acf_load_svg_icon_size_choices( $field ) {

  // rest choices
  $field['choices'] = [
    'icon' => 'Icon',
    'shape' => 'Shape',
  ];

  // return the field
  return $field;

}

add_filter('acf/load_field/name=svg_icon_type', 'acf_load_svg_icon_size_choices');


/**
 * Render icon from chosen select field
 *
 */

function hum_svg_select() {

	$selected_icon = get_field( 'select_svg_icon' );
  $selected_shape = get_field( 'select_svg_shape' );
  $svg_switch_shape = get_field( 'select_svg_type' );

  if ( $svg_switch_shape ) {
    $svg_return = hum_get_shape( [ 'name' => $selected_shape, 'class' => $selected_shape ] );
  } else {
    $svg_return = hum_get_icon( [ 'icon' => $selected_icon, 'group' => 'bs', 'size' => 32, 'class' => $selected_icon ] );
  }
  if ( $svg_return ) {
    return $svg_return;
  }

}
