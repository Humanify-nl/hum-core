<?php
/**
 * Block editor support
 * inside after_setup_theme
 *
 * @package hum-core
 */


add_theme_support('editor-styles');

// Inside wrap-editor-styles
add_editor_style( [
  'assets/css/editor.css',
] );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'align-wide' );

add_theme_support(
  'editor-font-sizes',
  [
    [
      'name'      => esc_html__( 'Small', 'hum-core' ),
      'shortName' => esc_html_x( 'S', 'Font size', 'hum-core' ),
      'size'      => 16,
      'slug'      => 'small',
    ],
    [
      'name'      => esc_html__( 'Normal', 'hum-core' ),
      'shortName' => esc_html_x( 'M', 'Font size', 'hum-core' ),
      'size'      => 18,
      'slug'      => 'normal',
    ],
    [
      'name'      => esc_html__( 'Large', 'hum-core' ),
      'shortName' => esc_html_x( 'L', 'Font size', 'hum-core' ),
      'size'      => 24,
      'slug'      => 'large',
    ],
  ]
);

add_theme_support('disable-custom-font-sizes');

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
