<?php
/**
 * Preview type
 *
 * @package hum-core
 */


function acf_load_preview_type_select_choices( $field ) {

    // reset choices
    $field['choices'] = [
      'preview' => 'Default (img, title, excerpt)',
      'preview-type-excerpt' => 'Excerpt (title, excerpt)',
      'preview-type-more' => 'Excerpt more tag (img, title, excerpt)',
      'preview-type-link' => 'Link (title-link only)',
      'preview-type-calendar' => 'Calendar (date, title)',
      'preview-type-slide' => 'Slider (img, title, excerpt)',
      'preview-type-list' => 'List (img left, title & excerpt right)',
    ];

    // return the field
    return $field;

}

add_filter('acf/load_field/name=preview_type_select', 'acf_load_preview_type_select_choices');
add_filter('acf/load_field/name=preview_type_posts', 'acf_load_preview_type_select_choices');
add_filter('acf/load_field/name=preview_type_rel', 'acf_load_preview_type_select_choices');
add_filter('acf/load_field/name=preview_type_testimonial', 'acf_load_preview_type_select_choices');
add_filter('acf/load_field/name=preview_type_testimonial_rel', 'acf_load_preview_type_select_choices');


function acf_load_preview_page_type_choices( $field ) {

    // reset choices
    $field['choices'] = [
      'preview' => 'Default (img, title, excerpt)',
      'preview-type-icon' => 'Icon (icon, title)',
      'preview-type-link' => 'Link (title-link only)',
      'preview-type-list' => 'List (img left, title & excerpt right)',
    ];

    // return the field
    return $field;

}

add_filter('acf/load_field/name=preview_type_page_select', 'acf_load_preview_page_type_choices');
add_filter('acf/load_field/name=preview_type_page', 'acf_load_preview_page_type_choices');
