<?php
/**
 * Theme Customizer.
 *
 * @package hum-core
 */

/**
 * Register postMessage support.
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function hum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Use selective refresh to preview changes to site title and tagline.
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title > a',
			'container_inclusive' => false,
			'render_callback'     => 'hum_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'hum_customize_partial_blogdescription',
		) );
	}

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'hum-base' );
}
add_action( 'customize_register', 'hum_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @see hum_customize_register()
 *
 * @return void
 */
function hum_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 * @see hum_customize_register()
 *
 * @return void
 */
function hum_customize_partial_blogdescription() {
		bloginfo( 'description' );
}


/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function hum_customizer_js() {

	wp_enqueue_script( 'hum_customizer',
	get_template_directory_uri() . '/assets/js/customizer.js',
	array( 'customize-preview' ),
	'2.2.0',
	true );

}
add_action( 'customize_preview_init', 'hum_customizer_js' );
