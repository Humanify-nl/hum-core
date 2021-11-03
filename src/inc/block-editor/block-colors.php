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
$base       = '#0f0c1c';
$primary 		= '#206697';
$secondary  = '#1D8B5D';
$tertiary   = '#F4643D';
$grey       = '#E0E0E0';
$grey_white = '#f7f7f7';
$white      = '#ffffff';

add_theme_support(
  'editor-color-palette',
  // empty array = no color support
  array(
    array(
      'name'  => esc_html__( 'Base', 'hum-core' ),
      'slug'  => 'base',
      'color' => $base,
    ),
    array(
      'name'  => esc_html__( 'Primary', 'hum-core' ),
      'slug'  => 'primary',
      'color' => $primary,
    ),
    array(
      'name'  => esc_html__( 'Secondary', 'hum-core' ),
      'slug'  => 'secondary',
      'color' => $secondary,
    ),
    array(
      'name'  => esc_html__( 'Tertiary', 'hum-core' ),
      'slug'  => 'tertiary',
      'color' => $tertiary,
    ),
    array(
      'name'  => esc_html__( 'Grey', 'hum-core' ),
      'slug'  => 'grey',
      'color' => $grey,
    ),
    array(
      'name'  => esc_html__( 'Grey white', 'hum-core' ),
      'slug'  => 'grey-white',
      'color' => $grey_white,
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
