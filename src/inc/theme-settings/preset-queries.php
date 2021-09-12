<?php
/**
 * Query functions
 *
 * @package hum-core
 */

// index post
function hum_queries( $query ) {

  if ( $query->is_main_query() ) {

    // home
    if( !is_admin() && is_home() && !is_front_page() ) {

      $query->set( 'order', 'DESC' );
      $query->set( 'orderby', 'date' );
    }

  }

}
add_action( 'pre_get_posts', 'hum_queries');
