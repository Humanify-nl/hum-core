<?php
/**
 * Query posts
 *
 * @package hum-core
 */


$post_order = get_field( 'post_query_order' );
$post_amount = get_field( 'post_query_amount' );
$post_type = get_field( 'post_query_type' );

$args = [
  'post_type' => [$post_type ],
  'orderby' => 'date',
  'order' => $post_order,
  'posts_per_page' => $post_amount,
];

$query_posts = new WP_query ( $args );

if ( $query_posts->have_posts() ) {

  $preview_select = get_field( 'preview_type_select' );
  $preview_type = $preview_select) ?: 'preview';
  ?>

  <div class="<?php echo hum_grid_class_preview( 'grid-'.$preview_type );?>">

    <?php
    while ( $query_posts->have_posts() ) {

      $query_posts->the_post();
      include( locate_template( 'template-parts/previews/'.$preview_type.'.php' ) );

    }

    wp_reset_postdata();
    ?>

  </div>
<?php

}
