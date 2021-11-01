<?php
/**
 * Custom taxonomies
 *
 * @package hum-core
 */

$taxonomies = [
  'custom-tax' => [
  	'singular_name' => 'Custom tax',
  	'plural_name'   => 'Custom tax',
  	'post_type'     => [ 'post' ],
  ],
];

foreach ( $taxonomies as $tax => $args ) {

  $singular_name = ! empty( $args['singular_name'] ) ? $args['singular_name'] : ucwords( str_replace( '_', ' ', $tax ) );
  $plural_name   = ! empty( $args['plural_name'] ) ? $args['plural_name'] : $singular_name . 's';
  $hierarchical  = isset( $args['hierarchical'] ) ? $args['hierarchical'] : true;
  $rewrite       = ! empty( $args['rewrite'] ) ? $args['rewrite'] : [ 'slug' => str_replace( '_', '-', $tax ), 'with_front' => false ];
  $admin_column  = isset( $args['show_admin_column'] ) ? $args['show_admin_column'] : true;
  $post_type     = ! empty( $args['post_type'] ) ? $args['post_type'] : [ 'post' ];

  $labels = [
    'name'                       => $plural_name,
    'singular_name'              => $singular_name,
    'search_items'               => 'Search ' . $plural_name,
    'popular_items'              => 'Popular ' . $plural_name,
    'all_items'                  => 'All ' . $plural_name,
    'parent_item'                => 'Parent ' . $singular_name,
    'parent_item_colon'          => 'Parent ' . $singular_name . ':',
    'edit_item'                  => 'Edit ' . $singular_name,
    'view_item'                  => 'View ' . $singular_name,
    'update_item'                => 'Update ' . $singular_name,
    'add_new_item'               => 'Add New ' . $singular_name,
    'new_item_name'              => 'New ' . $singular_name . ' Name',
    'separate_items_with_commas' => 'Separate ' . $plural_name . ' with commas',
    'add_or_remove_items'        => 'Add or remove ' . $plural_name,
  ];

  $args = [
    'labels'            => $labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_tagcloud'     => false,
    'hierarchical'      => $hierarchical,
    'rewrite'           => $rewrite,
    'query_var'         => true,
    'show_admin_column' => $admin_column,
  ];

  register_taxonomy( $tax, $post_type, $args );
}
