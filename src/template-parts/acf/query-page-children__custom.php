<?php
/**
 * Query page children of custom parent(s)
 *
 * NOT USED
 *
 * @package hum-v7-core
 */

$n = 1;
$parent_ID = get_sub_field( 'pagelinks_parent_id' );
$parent_ID_2 = get_sub_field( 'pagelinks_parent_id_2' );
$page_ID = get_the_id();

if ( $parent_ID ) {

	$child_pages = get_pages( array(
		'parent' => $parent_ID,
		'sort_column' => 'menu_order',
	));
}

if ( empty($parent_ID) && empty($parent_ID_2) ) {

	$child_pages = get_pages(	array(
		'parent' => $page_ID,
		'sort_column' => 'menu_order',
	));
}


if ( !empty($child_pages) ) { ?>

	<?php
	echo '<div class="grid--previews '.hum_grid_preview().'">';

		foreach ($child_pages as $page) {

			setup_postdata( $page );
			include( locate_template( 'template-parts/pages/page/preview-page.php' ) );

		}
		wp_reset_postdata();


		// extra group
		if ( !empty($parent_ID_2) ) {

			$child_pages_2 = get_pages( array(
				'parent' => $parent_ID_2,
			));

			if ( !empty($child_pages_2) ) {

				foreach ($child_pages_2 as $key => $page) {

					setup_postdata( $page );
					include( locate_template( 'template-parts/pages/page/preview-page.php' ) );

				}
				wp_reset_postdata();
			}
		}
		?>

	</div>

<?php
}
