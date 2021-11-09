<?php
/**
 * Query page siblings.
 *
 * @package hum-v7-core
 */

$child_pages = get_pages(
	array(
		'child_of' => $post->post_parent,
		'exclude' => array( get_the_id() ),
		'sort_column' => 'menu_order',
  )
);

$count_pages = count($child_pages);


if ( !empty($child_pages) ) {

	echo '<div class="grid--previews '.hum_grid_preview().'">';

	  foreach ($child_pages as $page) {

		  setup_postdata( $page );
      include( locate_template( 'template-parts/pages/page/preview-page.php' ) );
  	}

		wp_reset_postdata();

	echo '</div>';

}
