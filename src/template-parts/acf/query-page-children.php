<?php
/**
 * Query page children.
 *
 * @package hum-v7-core
 */

$child_pages = get_pages( array(

	'parent'    => $post->ID,
	'sort_column' => 'menu_order',

) );

if ( !empty( $child_pages ) ) {

	?>
	<div class="grid--previews <?php echo hum_grid_preview();?>">

		<?php
	  foreach ( $child_pages as $page ) {

		  setup_postdata( $page );
			include( locate_template( 'template-parts/pages/page/preview-page.php' ) );

		}

		wp_reset_postdata();
		?>

	</div>
	<?php

}
