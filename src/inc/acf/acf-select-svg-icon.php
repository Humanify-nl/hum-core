<?php
/**
 * Select SVF icon
 *
 * @package hum-core-acf
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
      'name' => 'chat-dots-fill',
      'title' => 'Chat dots fill',
    ],
    [
      'name' => 'house',
      'title' => 'House',
    ],
    [
      'name' => 'house-fill',
      'title' => 'House fill',
    ],
    [
      'name' => 'palette',
      'title' => 'Palette',
    ],
    [
      'name' => 'palette-fill',
      'title' => 'Palette fill',
    ],
  ];

  return $icons;
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


function acf_load_svg_icon_size_choices( $field ) {

  // rest choices
  $field['choices'] = [
    'icon-size-small' => 'Small',
    'icon-size-normal' => 'Normal',
    'icon-size-large' => 'Large',
  ];

  // return the field
  return $field;

}

add_filter('acf/load_field/name=svg_icon_size', 'acf_load_svg_icon_size_choices');


/**
 * Render icon from chosen select field
 *
 */

function hum_icon_select() {

	$icon_selected = get_field( 'select_svg_icon' );
  $icon_size = get_field( 'svg_icon_size ');

	if ( !empty( $icon_selected ) ) {
		return hum_get_icon( [ 'icon' => $icon_selected, 'group' => 'bs', $icon_size => 24, 'class' => $icon_selected ] );
  }
}
