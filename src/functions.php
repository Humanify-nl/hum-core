<?php
/**
 * Functions and definitions
 *
 * @package hum-core
 */

// define( 'HUM_CORE_VERSION', filemtime( get_template_directory() . '/assets/css/main.css' ) );

// General cleanup
// include_once( get_template_directory() . '/inc/wordpress-cleanup.php' );

// theme
include_once( get_template_directory() . '/inc/tha-theme-hooks.php' );
include_once( get_template_directory() . '/inc/template-functions.php' );
include_once( get_template_directory() . '/inc/template-tags.php' );


// Editor
// include_once( get_template_directory() . '/inc/editor/disable-editor.php' );

// Plugin Support
include_once( get_template_directory() . '/inc/plugin-support/acf.php' );
include_once( get_template_directory() . '/inc/plugin-support/amp.php' );
include_once( get_template_directory() . '/inc/plugin-support/yoast.php' );
include_once( get_template_directory() . '/inc/plugin-support/core-plugin.php' );



if ( ! function_exists( 'hum_core_setup' ) ) {
	/**
	* Theme setup
	*
	*/

	function hum_core_setup() {

		/* Make this theme available for translation.
		 *
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/hum-core
		 * to change 'hum-core' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hum-core' );


		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );


		// Let WordPress manage the document title tag.
		add_theme_support( 'title-tag' );


		// HTML5 support for default core markup.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		) );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(	array(
			'primary' => esc_html__( 'Primary Menu', 'hum-core' ),
			'secondary' => esc_html__( 'Secondary Menu', 'hum-core' ),
			'social'  => esc_html__( 'Social Links Menu', 'hum-core' ),
		) );

		// remove post-formats
		remove_theme_support( 'post-formats' );

		/*
		// images
		include_once( get_template_directory() . '/inc/functions/setup-images.php');
		// gutenberg support
		include_once( get_template_directory() . '/inc/block-editor/theme-support.php');
		// gutenberg color support
		include_once( get_template_directory() . '/inc/block-editor/block-colors.php');
		*/

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}

}

add_action( 'after_setup_theme', 'hum_core_setup' );


// scripts and styles
require ( get_template_directory() . '/inc/scripts.php');
//require ( get_template_directory() . '/inc/block-editor/editor-assets.php');

// SVG Icons class.
require_once( get_template_directory() . '/inc/classes/class-hum-svg-icons.php');

// admin styles & tweaks
/*
require ( get_template_directory() . '/inc/functions/setup-admin.php');
require ( get_template_directory() . '/inc/functions/setup-admin-columns-posts.php');
require ( get_template_directory() . '/inc/functions/setup-admin-columns-pages.php');


/*-----------------------------------------------------------------------------
/* 5.0 - Query, Yoast, Google & ACF
*/
/*
require ( get_template_directory() . '/inc/functions/setup-google.php');
include ( get_template_directory() . '/inc/functions/setup-queries.php');
include ( get_template_directory() . '/inc/functions/setup-yoast.php');
*/


/**
 * Template Hierarchy
 *
 */
function hum_template_archive( $template ) {

	if( is_home() || is_search() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'hum_template_archive' );
