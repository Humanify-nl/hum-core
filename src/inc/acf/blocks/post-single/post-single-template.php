<?php
/**
 * Query a single post
 *
 * @package hum-core
 */

$post_select = get_field( 'single_post_select' );

if ( $post_select ) {

  foreach ( $post_select as $post ) {

    setup_postdata( $post );

    ?>
    <article class="preview preview-list">

      <?php
    	hum_preview_image( 'medium' );

    	echo '<div class="preview__content">';
    		hum_preview_title();
        hum_preview_excerpt();
        hum_preview_category();
        hum_preview_footer();
    	echo '</div>';
      ?>

    </article>
    <?php

    break; // break out of loop
  }
  wp_reset_postdata();

} elseif ( $is_preview ) {

  echo '<p><small>No posts selected</small></p>';

}
