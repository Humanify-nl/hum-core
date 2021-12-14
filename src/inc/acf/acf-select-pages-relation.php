<?php
/**
 * Image size (wp registered)
 *
 * @package hum-core
 */




function acf_load_pages_relation_select_choices( $field ) {

    // reset choices
    $field['choices'] = array(
      'parent' => 'Children of page (current parent)',
      'parent-custom' => 'Children of parent (select parent)',
    );

    // return the field
    return $field;

}

add_filter('acf/load_field/name=pages_relation', 'acf_load_pages_relation_select_choices');
