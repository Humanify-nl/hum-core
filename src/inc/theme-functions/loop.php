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

      $content_type = apply_filters( 'hum_loop_partial', is_singular() ? 'content' : 'preview' );
      $content_partial = apply_filters( 'hum_loop_partial_context', is_search() ? 'search' : get_post_type() );
      get_template_part( 'template-parts/' . $content_type, $content_partial );

      tha_entry_after();

    }

    tha_content_while_after();

  }
}
add_action( 'tha_content_loop', 'hum_loop' );
