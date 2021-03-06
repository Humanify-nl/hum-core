<?php
/**
 * Pages
 *
 * @package hum-core
 */


$is_select = get_field( 'pages_source' );
$pages_select = get_field( 'pages_select' );
$pages_relation = get_field( 'pages_relation' );
$pages_parent_id = get_field( 'pages_parent_id' );


if ( !$is_select && $pages_relation == 'parent') {

  $selected_pages = get_pages( array(

    'child_of'    => hum_get_valid_id(),
    'sort_column' => 'menu_order',

  ) );

} elseif ( !$is_select && $pages_relation == 'parent-custom' ) {

  $selected_pages = get_pages( array(

    'child_of'    => $pages_parent_id,
    'sort_column' => 'menu_order',

  ) );

} elseif ( $is_select ) {

  $selected_pages = get_pages( array(

    'include'    => $pages_select,
    'sort_column' => 'menu_order',

  ) );

} else {

  echo '<p><small>No pages selected</small></p>';

}



if ( !empty( $selected_pages ) ) {

  $preview_select = get_field( 'preview_type_page_select' );
  $preview_type = $preview_select ?: 'preview';
	?>

	<div class="<?php echo hum_grid_class_preview( 'grid-'.$preview_type );?>">

		<?php
	  foreach ( $selected_pages as $post ) {

		  setup_postdata( $post );
      get_template_part( 'template-parts/preview-types/'.$preview_type );

		}

		wp_reset_postdata();
		?>

	</div>
	<?php

}
