<?php
/**
 * Default image
 *
 * @package hum-core
 */

if ( !function_exists( 'hum_default_img' ) ) {

  function hum_default_img( $size = 'medium' ) {

    $image = get_field( 'hum_default_image' , 'option');

    if ( $image ) {
      $output = wp_get_attachment_image( $image, $size );
      return $output;
    } else {
      return;
    }

  }
}
