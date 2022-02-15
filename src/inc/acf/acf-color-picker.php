<?php
/**
 * ACF Radio Color Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields
 *
 * Dynamically populates any ACF field with wd_text_color Field Name with custom color palette
 *
*/


function hum_acf_dynamic_colors_load( $field ) {

   // get array of colors created using editor-color-palette
   $colors = get_theme_support( 'editor-color-palette' );

   // if this array is empty, continue
   if( ! empty( $colors ) ) {

      // loop over each color and create option
      foreach( $colors[0] as $color ) {
           $field['choices'][ $color['slug'] ] = $color['name'];
      }
   }

   return $field;
}

add_filter('acf/load_field/name=color_picker', 'hum_acf_dynamic_colors_load');
add_filter('acf/load_field/name=color_picker_bg', 'hum_acf_dynamic_colors_load');


// preview background
function hum_acf_background_color( $className = false) {

  $colorFill = get_field( 'color_picker_bg' );
  if ( $colorFill ) {
    $className .= ' has-background has-' . $colorFill . '-background-color';
  }
  return $className;
}
