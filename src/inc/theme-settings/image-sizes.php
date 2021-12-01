<?php
/**
 * Image sizes
 *
 * @package hum-core
 */

add_image_size( 'small', 360, 360 ); // Unlimited height, hard crop
add_image_size( 'featured', 1920, 514, array( 'top') ); // Unlimited height, soft crop
add_image_size( 'featured-sq', 640, 640, true ); // Unlimited height, hard crop
add_image_size( 'admin', 100, 80 ); // Unlimited height, hard crop

/**
 * Filter to make custom sizes selectable in media library
 */
function hum_custom_sizes( $sizes ) {

    return array_merge( $sizes, array(

        'small' => __( 'Small' ),
        'featured' => __( 'Featured' ),
    ) );
}

add_filter( 'image_size_names_choose', 'hum_custom_sizes' );
