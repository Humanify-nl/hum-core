<?php
/**
 * WordPress modification
 *
 * @package hum-core
 */


/**
 * Header Meta
 *
 */
function hum_header_meta() {
	echo '<meta charset="' . get_bloginfo( 'charset' ) . '">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<link rel="profile" href="http://gmpg.org/xfn/11">';
	echo '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '">';
}
add_action( 'wp_head', 'hum_header_meta' );


/**
 * Dequeue jQuery Migrate
 *
 */
function hum_dequeue_jquery_migrate( &$scripts ){
	if( !is_admin() ) {
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, [ 'jquery-core' ], '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'hum_dequeue_jquery_migrate' );


/**
 * Singular body class
 *
 */
function hum_singular_body_class( $classes ) {
	if( is_singular() )
		$classes[] = 'singular';
	return $classes;
}
add_filter( 'body_class', 'hum_singular_body_class' );


/**
 * Clean body classes
 *
 */
function hum_clean_body_class( $classes ) {

	$allowed_classes = [
		'singular',
		'single',
		'page',
		'archive',
		'admin-bar',
		'content-wide',
		'content-sidebar',
		'content-center',
		'search',
		'page-template-page-group',
	];

	$custom_post_types = hum_registered_post_types();
	$allowed_classes[] = 'single-post';
	foreach( $custom_post_types as $post_type ) {
		$allowed_classes[] = 'single-' . $post_type;
	}

	return array_intersect( $classes, $allowed_classes );

}
add_filter( 'body_class', 'hum_clean_body_class', 20 );


/**
 * Clean Nav Menu Classes
 *
 */
function hum_clean_nav_class( $classes ) {
	if( ! is_array( $classes ) )
		return $classes;

	foreach( $classes as $i => $class ) {

		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );
		if( 0 < intval( $id ) )
			unset( $classes[ $i ] );

		// Remove menu-item-type-*
		if( false !== strpos( $class, 'menu-item-type-' ) )
			unset( $classes[ $i ] );

		// Remove menu-item-object-*
		if( false !== strpos( $class, 'menu-item-object-' ) )
			unset( $classes[ $i ] );

		// Change page ancestor to menu ancestor
		if( 'current-page-ancestor' == $class ) {
			$classes[] = 'current-menu-ancestor';
			unset( $classes[ $i ] );
		}
	}

	// Remove submenu class if depth is limited
	if( isset( $args->depth ) && 1 === $args->depth ) {
		$classes = array_diff( $classes, [ 'menu-item-has-children' ] );
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'hum_clean_nav_class', 5 );


/**
 * Clean Post Classes
 *
 */
function hum_clean_post_class( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	$allowed_classes = [
  	'hentry',
  	'type-' . get_post_type(),
  ];

	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'hum_clean_post_class', 5 );


/**
 * Archive Title, remove prefix
 *
 */
function hum_archive_title_remove_prefix( $title ) {
	$title_pieces = explode( ': ', $title );
	if( count( $title_pieces ) > 1 ) {
		unset( $title_pieces[0] );
		$title = join( ': ', $title_pieces );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'hum_archive_title_remove_prefix' );


/**
 * Remove avatars from comment list
 *
 */
function hum_remove_avatars_from_comments( $avatar ) {
	global $in_comment_loop;
	return $in_comment_loop ? '' : $avatar;
}
add_filter( 'get_avatar', 'hum_remove_avatars_from_comments' );


/**
 * Comment form, button class
 *
 */
function hum_comment_form_button_class( $args ) {
	$args['class_submit'] = 'submit wp-block-button__link';
	return $args;
}
add_filter( 'comment_form_defaults', 'hum_comment_form_button_class' );


/**
 * Excerpt More
 *
 */
function hum_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'hum_excerpt_more' );


// Remove inline CSS for emoji
remove_action( 'wp_print_styles', 'print_emoji_styles' );
