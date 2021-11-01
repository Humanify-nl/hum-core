<?php
/**
 * ACF functions
 *
 * @package hum-core
 */

include_once( get_template_directory() . '/inc/acf/acf-grid-class-preview.php' );
include_once( get_template_directory() . '/inc/acf/acf-button-class-preview.php' );
include_once( get_template_directory() . '/inc/acf/acf-post-type-select.php' );
include_once( get_template_directory() . '/inc/acf/acf-preview-type-select.php' );
include_once( get_template_directory() . '/inc/acf/acf-blocks.php' );
include_once( get_template_directory() . '/inc/acf/acf-select-svg-icon.php' );


function hum_block_pattern_names() {

  $get_patterns  = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
  $pattern_names = array_map(
      function ( array $pattern ) {
          return $pattern['name'];
      },
      $get_patterns
  );
  return $pattern_names;
}
