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
function hum_add_portfolio_img_column($columns) {

  $columns = array_slice($columns, 0, 1, true) + array("img" => "small") + array_slice($columns, 1, count($columns) - 1, true);

  return $columns;

}
add_filter('manage_portfolio_posts_columns', 'hum_add_portfolio_img_column' );


/**
 * Manage columns array for post
 * -- added 'img'
 *
 */
function hum_manage_portfolio_columns( $columns ) {

  $columns = [
    'cb'                   => '<input type="checkbox" />',
    'img'                  => 'Image',
    'title'                => 'Title',
    'categories'           => 'Categories',
    'date'                 => 'Date',
  ];

  return $columns;
}
add_filter('manage_portfolio_posts_columns' , 'hum_manage_portfolio_columns' );
