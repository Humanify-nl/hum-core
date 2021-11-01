<?php
/**
 * Enqueue block editor scripts.
 *
 * @package hum-core
 *
 * @return void
 */

function hum_block_editor_scripts() {

  wp_enqueue_script(
    'hum-editor',
    get_template_directory_uri() . '/assets/js/gutenberg.js',
    [ 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ],
    '1.0',
    true
  );

}
add_action( 'enqueue_block_editor_assets', 'hum_block_editor_scripts' );
