<?php
/**
 * Image sizes
 *
 * @package hum-core
 */

/**
 * Filter to add new sizes in media library
 */
function hum_custom_sizes( $sizes ) {

    return array_merge( $sizes, array(

        'small' => __( 'Small' ),
    ) );
}

add_filter( 'image_size_names_choose', 'hum_custom_sizes' );


/**
 * Filter to remove image sizes
 *
 * @link https://wordpress.stackexchange.com/questions/357955/wp-5-3-removing-default-wordpress-image-sizes
 */
function hum_remove_default_img_sizes( $sizes ) {

  $targets = ['medium_large', '1536x1536', '2048x2048'];

  foreach( $sizes as $size_index => $size ) {
    if( in_array( $size, $targets ) ) {

      unset( $sizes [$size_index] );
    }
  }
  return $sizes;
}
add_filter( 'intermediate_image_sizes', 'hum_remove_default_img_sizes', 10, 1);
