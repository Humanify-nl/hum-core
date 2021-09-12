<?php
/**
 * Color palette
 * inside after_setup_theme
 *
 * @package hum-core
 */

// remove support for custom colors
add_theme_support( 'disable-custom-colors' );

// Editor color palette.
$black      = '#0f0c1c';
$blue 		  = '#206697';
$green      = '#1D8B5D';
$gray       = '#E0E0E0';
$white_gray = '#f7f7f7';
$white      = '#ffffff';

add_theme_support(
  'editor-color-palette',
  // empty array = no color support
  array(
    array(
      'name'  => esc_html__( 'Black', 'hum-core' ),
      'slug'  => 'black',
      'color' => $black,
    ),
    array(
      'name'  => esc_html__( 'Blue', 'hum-core' ),
      'slug'  => 'blue',
      'color' => $blue,
    ),
    array(
      'name'  => esc_html__( 'Green', 'hum-core' ),
      'slug'  => 'green',
      'color' => $green,
    ),
    array(
      'name'  => esc_html__( 'Gray', 'hum-core' ),
      'slug'  => 'gray',
      'color' => $gray,
    ),
    array(
      'name'  => esc_html__( 'White gray', 'hum-core' ),
      'slug'  => 'white-gray',
      'color' => $white_gray,
    ),
    array(
      'name'  => esc_html__( 'White', 'hum-core' ),
      'slug'  => 'white',
      'color' => $white,
    ),
  )
);

add_theme_support(
  'editor-gradient-presets',
  /*
  array(
    array(
      'name'     => esc_html__( 'Purple to yellow', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
      'slug'     => 'purple-to-yellow',
    ),
    array(
      'name'     => esc_html__( 'Yellow to purple', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
      'slug'     => 'yellow-to-purple',
    ),
    array(
      'name'     => esc_html__( 'Green to yellow', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
      'slug'     => 'green-to-yellow',
    ),
    array(
      'name'     => esc_html__( 'Yellow to green', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
      'slug'     => 'yellow-to-green',
    ),
    array(
      'name'     => esc_html__( 'Red to yellow', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
      'slug'     => 'red-to-yellow',
    ),
    array(
      'name'     => esc_html__( 'Yellow to red', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
      'slug'     => 'yellow-to-red',
    ),
    array(
      'name'     => esc_html__( 'Purple to red', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
      'slug'     => 'purple-to-red',
    ),
    array(
      'name'     => esc_html__( 'Red to purple', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
      'slug'     => 'red-to-purple',
    ),
  )
  */
);
add_theme_support( 'disable-custom-gradients' );
