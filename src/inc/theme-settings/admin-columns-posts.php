<?php
/**
 * Admin columns for posts
 *
 * @package hum-core
 */

/**
 * Add columns for posts
 *
 */
function hum_add_img_column($columns) {
  $columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
  return $columns;
}
add_filter('manage_posts_columns', 'hum_add_img_column');


/**
 * Manage columns array for post
 * -- added 'img'
 *
 */
function hum_manage_post_columns( $columns ) {

  $columns = array(
    'cb'                   => '<input type="checkbox" />',
    'img'                  => 'Image',
    'title'                => 'Title',
    'categories'           => 'Categories',
    'tags'                 => 'Tags',
    'author'               => 'Author',
    'date'                 => 'Date',
  );
  return $columns;
}
add_filter('manage_posts_columns' , 'hum_manage_post_columns');


/**
 * Get the column fields and display it
 *
 */
function hum_manage_img_column($column_name, $post_id) {

  if ( $column_name == 'img' ) {
    echo get_the_post_thumbnail($post_id, 'admin');
  }
  return $column_name;
}
add_filter('manage_posts_custom_column', 'hum_manage_img_column', 10, 2);


/**
 * Manage which columns are sortable
 *
 *   meta_key name = acf_field + _acfsubfield
 *
 */
function hum_sortable_post_column( $columns ) {

    $columns['categories'] = 'Categories';
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'hum_sortable_post_column' );


/**
 * Specify how columns are sorted
 *
 *   $query->set ('key', 'value')
 *   meta_key name = acf_field + _acfsubfield
 *
 */
function hum_posts_sortby( $query ) {

  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( 'categories' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value_num' );
    $query->set( 'meta_key', 'cat_order' );
  }
}
add_action( 'pre_get_posts', 'hum_posts_sortby' );
