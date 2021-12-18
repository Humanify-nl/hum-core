<?php
/**
 * Block template for standard post & page
 *
 * @package hum-core
 */


function post_blocks_template() {

  $post = [
    [ 'core/post-title', [] ],
  ];

  $testimonial = [
    [ 'core/post-title', [] ],
  ];

  $page = [
    [ 'core/post-title', [] ],
  ];

  $post_types = [
     'page',
     'post',
     'testimonial'
   ];

  foreach( $post_types as $post_type ) {

    $post_type_object = get_post_type_object( $post_type );
    if ( is_array(${$post_type}) ) {
      $post_type_object->template = ${$post_type};
      //$post_type_object->template_lock = 'all';
    }
  }


}
add_action( 'init', 'post_blocks_template' );
