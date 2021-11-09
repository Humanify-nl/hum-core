<?php
/**
 * Preview type
 *
 * @package hum-core-acf
 */

function acf_load_preview_type_select_choices( $field ) {

    // reset choices
    $field['choices'] = array(
      'preview-post' => 'Default (img, title, excerpt)',
      'preview-excerpt' => 'Excerpt (title, excerpt)',
      'preview-more' => 'Excerpt more tag (img, title, excerpt)',
      'preview-calendar' => 'Calendar (date, title)',
      'preview-slide' => 'Slider (img, title, excerpt)',
      'preview-list' => 'List (img left, title & excerpt right)',
    );

    // return the field
    return $field;

}

add_filter('acf/load_field/name=preview_type_select', 'acf_load_preview_type_select_choices');



function acf_load_preview_page_type_choices( $field ) {

    // reset choices
    $field['choices'] = array(
      'preview-page' => 'Default',
      'preview-page--icon' => 'Icon',
      'preview-page--link' => 'Link',
    );

    // return the field
    return $field;

}

add_filter('acf/load_field/name=preview_page_select', 'acf_load_preview_page_type_choices');
