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

    'child_of'    => hum_acf_post_id(),
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

// not rendered in the block editor
} elseif ( $args['is_related'] ) {

  if ( $post->parent != 0 ) {

    $selected_pages = get_pages( array(

      'parent' => $post->post_parent,
      'exclude' => [ hum_acf_post_id() ],
      'sort_column' => 'menu_order',

    ) );

  }


} else {

  echo '<p>No pages to show</p>';

}


$preview_select = get_field( 'preview_page_select' );
$preview_type = !empty($preview_select) ? $preview_select : 'preview';


if ( !empty( $selected_pages ) ) {

	?>
	<div class="<?php echo hum_grid_class_preview( 'has-'.$preview_type );?>">

		<?php
	  foreach ( $selected_pages as $post ) {

		  setup_postdata( $post );

      include( locate_template( 'template-parts/previews/'.$preview_type.'.php' ) );
		}

		wp_reset_postdata();
		?>

	</div>
	<?php

}
