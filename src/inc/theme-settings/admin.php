<?php
/**
 * Setup admin
 *
 * @package hum-core
 */


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
      'dashicons-open-folder',
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
        'edit.php?post_type=project',
        'edit.php?post_type=product',
        'edit.php?post_type=service',
        'edit.php?post_type=review',
        'edit.php?post_type=portfolio',
        'edit.php?post_type=employee',
        'edit.php?post_type=client',
        'edit.php?post_type=job',
        'edit.php?post_type=testimonial',
        'edit.php?post_type=logo',
        'upload.php', // order 10,
        'edit.php?post_type=wp_block',
    ];
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'hum_change_menu_order' );


/**
 * Admin footer
 *
 */
function hum_admin_footer_text() {

  _e('Realisatie: <strong><a href="https://humanify.nl" target="_blank">Humanify websites</a></strong>', 'humtest');
  echo '<br />';
  echo '<small style="color: white; border-radius: 2px; padding: 0 4px 1px 4px; margin-right: 3px; background-color: #8892BF">PHP v' . (!empty(phpversion()) ? phpversion() : '?') . '</small>';
  echo '<small style="color: white; border-radius: 2px; padding: 0 4px 1px 4px; margin-right: 3px; background-color: #2F99A3">MySQL v' . (!empty(mysqli_get_client_version()) ? mysqli_get_client_version() : '?') . '</small>';

}

add_filter( 'admin_footer_text', 'hum_admin_footer_text' );


/**
 * Admin Humanify dashboard box
 *
 */

function hum_custom_dashboard_widgets() {

  global $wp_meta_boxes;
  wp_add_dashboard_widget( 'custom_help_widget', 'Humanify WordPress', 'hum_custom_dashboard_box', '', '', 'normal', 'high' );
}

function hum_custom_dashboard_box() {

    echo '<a href="https://humanify.nl" target="_blank">';
        echo '<img style="width: 180px; padding: 10px 0;" src="' . get_template_directory_uri() . '/assets/images/logo-humanify.png" alt="Humanify websites"/>';
    echo '</a>';
    echo '<div>';
      _e('Welkom op het dashboard van ' . get_bloginfo('title') . '.<br/><br/> Vragen of problemen? Aarzel niet om contact op te nemen via:<br/> <a href="mailto:rob@humanify.nl">rob@humanify.nl</a> of <a href="tel:+31630024662">+31 6 300 24 662</a>.</p>', 'hum-core' );
    echo '</div>';
}

add_action( 'wp_dashboard_setup', 'hum_custom_dashboard_widgets' );


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
