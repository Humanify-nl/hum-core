<?php
/**
 * Block editor support
 * inside after_setup_theme
 *
 * @package hum-core
 */

 // Editor styles
add_theme_support('editor-styles');

// Inside wrap-editor-styles
add_editor_style( array(
  'assets/css/editor.css',
) );

// Add support for responsive embedded content.
add_theme_support( 'responsive-embeds' );

// Add support for full and wide aligns.
add_theme_support( 'align-wide' );

// Add custom editor font sizes.
add_theme_support(
  'editor-font-sizes',
  array(
    array(
      'name'      => esc_html__( 'Small', 'hum-core' ),
      'shortName' => esc_html_x( 'S', 'Font size', 'hum-core' ),
      'size'      => 16,
      'slug'      => 'small',
    ),
    array(
      'name'      => esc_html__( 'Normal', 'hum-core' ),
      'shortName' => esc_html_x( 'M', 'Font size', 'hum-core' ),
      'size'      => 18,
      'slug'      => 'normal',
    ),
    array(
      'name'      => esc_html__( 'Large', 'hum-core' ),
      'shortName' => esc_html_x( 'L', 'Font size', 'hum-core' ),
      'size'      => 24,
      'slug'      => 'large',
    ),
  )
);


/*
 * Disabled
 *

// Add support for experimental cover block spacing.
add_theme_support( 'custom-spacing' );

// Add support for experimental link color control.
add_theme_support( 'experimental-link-color' );

// Add support for custom line height controls.
add_theme_support( 'custom-line-height' );

*/
