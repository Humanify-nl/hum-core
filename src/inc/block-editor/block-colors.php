<?php
/**
 * Color palette
 * inside after_setup_theme
 *
 * @package hum-core
 */


add_theme_support( 'disable-custom-colors' );

add_theme_support(
  'editor-color-palette',
  // empty array = no color support

  [
    [
      'name'  => esc_html__( 'Primary', 'hum-core' ),
      'slug'  => 'primary',
      'color' => 'var(--color--primary)',
    ],
    [
      'name'  => esc_html__( 'Secondary', 'hum-core' ),
      'slug'  => 'secondary',
      'color' => 'var(--color--secondary)',
    ],
    [
      'name'  => esc_html__( 'Tertiary', 'hum-core' ),
      'slug'  => 'tertiary',
      'color' => 'var(--color--tertiary)',
    ],
    [
      'name'  => esc_html__( 'Grey light', 'hum-core' ),
      'slug'  => 'grey-light',
      'color' => 'var(--color--grey-light)',
    ],
    [
      'name'  => esc_html__( 'White', 'hum-core' ),
      'slug'  => 'white',
      'color' => 'var(--color--white)',
    ],
    [
      'name'  => esc_html__( 'Black', 'hum-core' ),
      'slug'  => 'black',
      'color' => 'var(--color--black)',
    ],
  ]
);

add_theme_support(
  'editor-gradient-presets',
  // disabled
  /*
  [
    [
      'name'     => esc_html__( 'Purple to yellow', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
      'slug'     => 'purple-to-yellow',
    ],
    [
      'name'     => esc_html__( 'Purple to yellow', 'hum-core' ),
      'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
      'slug'     => 'purple-to-yellow',
    ],
  ]
  */
);

// also remove custom gradients
add_theme_support( 'disable-custom-gradients' );
