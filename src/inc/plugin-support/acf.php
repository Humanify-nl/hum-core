<?php
/**
 * ACF
 *
 * @package hum-core
 */

/**
 * Options Page
 *
 */
function acf_register_options() {

  if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page( array(
      'title'      => __( 'Site Options', 'hum-core' ),
      'capability'	=> 'edit_posts',
      'icon_url' 		=> 'dashicons-admin-settings',
    ) );

  }
}
add_action( 'acf/init', 'acf_register_options' );



/**
 * Row order in field columns
 *
 */
function acf_field_group_columns($columns) {

  $columns['menu_order'] = __('Order');

  return $columns;
}

add_filter('manage_edit-acf-field-group_columns', 'acf_field_group_columns', 20);


function acf_field_group_columns_content($column, $post_id) {

  switch ($column) {

    case 'menu_order':
      global $post;
      echo '<strong>',$post->menu_order,'</strong>';
    break;
    default:
    break;
  } // end switch
}

add_action('manage_acf-field-group_posts_custom_column', 'acf_field_group_columns_content', 20, 2);
