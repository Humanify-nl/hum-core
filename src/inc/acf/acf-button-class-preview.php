<?php
/**
 * Button class builder
 *
 * @package hum-core
 */


if ( !function_exists( 'hum_button_class_preview' ) ) {

  function hum_button_class_preview( $preview_type = false ) {

    $button_class = [ 'preview-btn', 'btn' ];

    switch ( $preview_type ) {

      case 'post';
      $button_class[] = get_field( 'post_links', 'option' );
      break;

      case 'post_rel';
      $button_class[] = get_field( 'rel_links', 'option' );
      break;

      case 'page';
      $button_class[] = get_field( 'page_links', 'option' );
      break;

      default;
      $button_class = [ 'link' ];

    }

    return join( ' ', $button_class);
  }
}


/* ACF populate select field
*
* https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
* fieldname = post_links, page_links, rel_links
*/

function acf_load_button_class_preview_choices( $field ) {

// reset choices
$field['choices'] = [
  'has-background has-primary-background-color' => 'Button primary',
  'has-background has-secondary-background-color' => 'Button secondary',
  'has-background has-tertiary-background-color' => 'Button tertiary',
  'has-background has-white-background-color' => 'Button white',
  'is-link' => 'Link',
];

// return the field
return $field;

}

// preload choices for these fields:
add_filter('acf/load_field/name=post_links', 'acf_load_button_class_preview_choices');
add_filter('acf/load_field/name=page_links', 'acf_load_button_class_preview_choices');
add_filter('acf/load_field/name=rel_links', 'acf_load_button_class_preview_choices');
