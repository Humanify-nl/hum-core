<?php
/**
 * Post types
 *
 * @package hum-v7-acf
 */

function hum_post_type_testimonial() {

  $singular_name = 'Testimonial';
  $plural_name = 'Testimonials';
  $post_type = 'testimonial';

  $labels = [
    'name'                  => $plural_name,
    'singular_name'         => $singular_name,
    'add_new'               => 'Add New',
    'add_new_item'          => 'Add New ' . $singular_name,
    'edit_item'             => 'Edit ' . $singular_name,
    'new_item'              => 'New ' . $singular_name,
    'view_item'             => 'View ' . $singular_name,
    'search_items'          => 'Search ' . $plural_name,
    'not_found'             => 'No ' . $plural_name . ' found',
    'not_found_in_trash'    => 'No ' . $plural_name . ' found in Trash',
    'parent_item_colon'     => 'Parent' . $singular_name . ':',
    'menu_name'             => $plural_name,
  ];

  $args = [
    'labels'                => $labels,
    'hierarchical'          => false,
    'supports'              => [
                              'title',
                              'editor',
                              'thumbnail',
                              'excerpt',
                              'revisions',
                              'page-attributes'
                            ],
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_rest'        => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'has_archive'         => true,
      'query_var'           => true,
      'can_export'          => true,
      'rewrite'             => [ 'slug' => 'testimonials', 'with_front' => false ],
      'menu_icon'           => 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
    ];

    register_post_type( $post_type, $args );
}

add_action( 'init', 'hum_post_type_testimonial' );
