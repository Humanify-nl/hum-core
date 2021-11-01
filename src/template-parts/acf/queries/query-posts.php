<?php
/**
 * Query posts
 *
 * @package hum-core-acf
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

  ?>
  <div class="<?php echo hum_grid_class_preview();?>">

    <?php
    while ( $query_posts->have_posts() ) {

      $query_posts->the_post();
      $preview_select = get_field( 'preview_post_select' );
      $preview_type = !empty($preview_select) ? $preview_select : 'preview';

      include( locate_template( 'template-parts/'.$preview_type.'.php' ) );

    }

    wp_reset_postdata();
    ?>

  </div>
<?php

}
