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


// taxonomy
function hum_tax_queries( $query ) {

  if ( $query->is_main_query() ) {

    if ( is_category() ) {
      $query->set( 'post_type', hum_registered_post_types() );
      $query->set( 'order', 'ASC' );
      $query->set( 'orderby', 'menu_order' );
    }

    /*
    if ( is_tag() ) {

      $query->set( 'post_type', array('post_learn') );
      $query->set( 'order', 'DESC' );
      $query->set( 'meta_key', 'acf_post_order' );
      $query->set( 'orderby', 'meta_value_num date' );
    }

    if ( is_tax( '', 'cat_focus' ) ) {
      $query->set( 'post_type', array('post_learn') );
      $query->set( 'order', 'DESC' );
      $query->set( 'meta_key', 'acf_post_order' );
      $query->set( 'orderby', 'meta_value_num date' );
    }
    */
  }
}
add_action( 'pre_get_posts', 'hum_tax_queries');
