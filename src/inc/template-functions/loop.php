<?php
/**
 * Loop
 *
 * @package hum-core
 */


/**
 * Default Loop
 *
 */
function hum_loop() {

  if ( have_posts() ) {

    tha_content_while_before();

    while ( have_posts() ) {

      the_post();
      tha_entry_before();

      $content_partial = apply_filters( 'hum_loop_partial', is_singular() ? 'content' : 'preview' );
      $content_type = apply_filters( 'hum_loop_partial_context', is_search() ? 'search' : get_post_type() );
      get_template_part( 'template-parts/' . $content_partial, $content_type );

      tha_entry_after();

    }

    tha_content_while_after();

  } else {

    tha_entry_before();

    $context = apply_filters( 'hum_empty_loop_partial_context', 'none' );
    get_template_part( 'template-parts/preview', $context );

    tha_entry_after();

  }
}

add_action( 'tha_content_loop', 'hum_loop' );
