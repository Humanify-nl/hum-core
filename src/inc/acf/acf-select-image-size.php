<?php
/**
 * Image size (wp registered)
 *
 * @package hum-core
 */




function acf_load_image_size_select_choices( $field ) {

    // reset choices
    $field['choices'] = array(
      'medium' => 'Medium',
      'large' => 'Large',
      'featured' => 'Featured',
      'featured-sq' => 'Featured square',
    );

    // return the field
    return $field;

}

add_filter('acf/load_field/name=image_size_select', 'acf_load_image_size_select_choices');
