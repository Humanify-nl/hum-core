<?php
/**
 * Image size (wp registered)
 *
 * @package hum-core
 */

// image blocks
function acf_load_image_size_select_choices( $field ) {

    // reset choices
    $field['choices'] = [
      'thumbnail' => 'Thumbnail',
      'small' => 'Small',
      'medium' => 'Medium',
      'large' => 'Large',
      'featured' => 'Featured',
    ];

    // return the field
    return $field;

}

add_filter('acf/load_field/name=image_size_select', 'acf_load_image_size_select_choices');


// slider only
function acf_load_slider_image_size_select_choices( $field ) {

    // reset choices
    $field['choices'] = [
      'small' => 'Small',
      'medium' => 'Medium',
      'large' => 'Large',
      'featured' => 'Featured',
    ];

    // return the field
    return $field;

}

add_filter('acf/load_field/name=slider_image_size_select', 'acf_load_slider_image_size_select_choices');
