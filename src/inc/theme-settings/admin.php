<?php
/**
 * Setup admin
 *
 * @package hum-core
 */


/**
 * Custom function to change default template name in menu
 *
 */

add_filter('default_page_template_title', function() {

  return __('Default', 'hum-core');

});


/**
 * Reusable Blocks accessible in backend
 * @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area
 *
 */
function hum_saved_blocks_admin_menu() {

    add_menu_page(
      'Saved blocks',
      'Saved blocks',
      'edit_posts',
      'edit.php?post_type=wp_block',
      '',
      'dashicons-screenoptions',
      20
    );
}
add_action( 'admin_menu', 'hum_saved_blocks_admin_menu' );


/**
 * Page order
 *
 */
function hum_change_menu_order( $menu_order ) {

    return [
        'index.php', // order 2
        'edit.php?post_type=page',
        'edit.php', // order 5
        'edit.php?post_type=projects',
        'edit.php?post_type=products',
        'edit.php?post_type=services',
        'edit.php?post_type=reviews',
        'edit.php?post_type=portfolio',
        'edit.php?post_type=employees',
        'edit.php?post_type=clients',
        'edit.php?post_type=jobs',
        'edit.php?post_type=testimonial',
        'edit.php?post_type=logos',
        'upload.php', // order 10,
        'edit.php?post_type=wp_block',
    ];
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'hum_change_menu_order' );


/**
 * Load admin fontawesome stylesheet in admin
 *
 */
/*
if ( ! function_exists('hum_admin_fa') ) {

	function hum_admin_fa() {
		wp_enqueue_style( 'font-awesome',
		get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.css',
		[],
		'4.7.0',
		'all' );
	}
	add_action('admin_print_styles', 'hum_admin_fa');

}
*/
