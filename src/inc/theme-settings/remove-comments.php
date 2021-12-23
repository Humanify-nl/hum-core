<?php
/**
 * Remove comments
 *
 * @package hum-core
 */


/**
 * Disable comments from menu
 *
 */
function hum_remove_comment_menu() {

	remove_menu_page('edit-comments.php');

}
add_action('admin_menu', 'hum_remove_comment_menu');


/**
 * Remove comments from admin bar
 *
 */
function hum_remove_comments_admin_bar() {

	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');

}
add_action( 'wp_before_admin_bar_render', 'hum_remove_comments_admin_bar' );


/**
 * Remove comment links from admin bar
 *
 */
function hum_remove_comment_links_admin_bar() {

	if (is_admin_bar_showing()) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
  }

}
add_action( 'init', 'hum_remove_comment_links_admin_bar' );


/**
 * Close comments on front-end
 *
 */
function hum_disable_comments_status() {

	return false;

}
add_filter( 'comments_open', 'hum_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'hum_disable_comments_status', 20, 2 );


/**
 * Hide existing comments
 *
 */
function hum_disable_comments_hide_existing_comments($comments) {

	$comments = array();
  return $comments;

}
add_filter( 'comments_array', 'hum_disable_comments_hide_existing_comments', 10, 2 );


/**
 * Redirect any user trying to access comments page
 *
 */
function hum_disable_comments_admin_menu_redirect() {

	global $pagenow;
		if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
  }

}
add_action( 'admin_init', 'hum_disable_comments_admin_menu_redirect' );


/**
 * Remove comments metabox from dashboard
 *
 */
function hum_disable_comments_dashboard() {

	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

}
add_action( 'admin_init', 'hum_disable_comments_dashboard' );
