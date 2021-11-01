<?php
/**
 * Post type select
 *
 * @package hum-core
 */

function acf_load_post_type_select_choices( $field ) {

    // reset choices
    $field['choices'] = [
      'post' => 'Post',
    ];

    // get post types array
    $post_types = hum_registered_post_types();

    // add to choices array
    if ( !empty($post_types) ) {
      foreach ( $post_types as $post_type ) {
        $field['choices'][$post_type] = ucfirst($post_type);
      }
    }

    // return the field
    return $field;

}

add_filter('acf/load_field/name=post_query_type', 'acf_load_post_type_select_choices');
