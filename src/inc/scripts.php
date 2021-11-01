<?php
/**
 * Enqueueue scripts
 *
 * @package hum-core
 */

function hum_scripts() {

  // JS scripts
  wp_enqueue_script( 'hum-bundle-js',
    get_template_directory_uri() . '/assets/js/bundle.js',
    array( 'jquery' ),
    filemtime( get_template_directory() . '/assets/js/bundle.js' ),
    true
  );

  // Add JS to pages with the comment form for threaded comments (when in use)
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Move jQuery to footer
  if( ! is_admin() ) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery',
      includes_url( '/js/jquery/jquery.js' ),
      false,
      NULL,
      true
    );
    wp_enqueue_script( 'jquery' );
  }

  // Main CSS style
  wp_enqueue_style( 'hum-style',
    get_template_directory_uri() . '/assets/css/main.css',
    array(),
    filemtime( get_template_directory() . '/assets/css/main.css' )
  );

}
add_action( 'wp_enqueue_scripts', 'hum_scripts' );


/**
 * Load admin stylesheet
 *
 */
if ( ! function_exists('hum_admin_style') ) {

 	function hum_admin_style() {

 		wp_enqueue_style('hum_admin_style',
 		get_stylesheet_directory_uri() .'/assets/css/admin.css', false, '1.0', 'all' );
 	}

 	add_action('admin_print_styles', 'hum_admin_style');
}
