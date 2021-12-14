<?php
/**
 * Query posts
 *
 * @package hum-core-acf
 */


$post_amount = get_field( 'related_posts_amount' ) ? get_field( 'related_posts_amount' ) : get_field( 'related_posts_amount', 'option' );
$post_type = get_post_type( hum_acf_post_id() );
$post_id = hum_acf_post_id();
$post_preview = get_field( 'preview_type_select' );

if ( $post_type == 'testimonial' ) {
  $option_field = get_field( 'preview_type_testimonial_rel', 'option' );
} else {
  $option_field = get_field( 'preview_type_rel', 'option' );
}

$post_preview_select = $post_preview ? $post_preview : $option_field;


$args = [
  'post_type' => [ $post_type ],
  'orderby' => 'date',
  'order' => 'DESC',
  'posts_per_page' => $post_amount,
  'post__not_in' => [ $post_id ],
];

$query_posts = new WP_query ( $args );

if ( $query_posts->have_posts() ) {

  ?>
  <div class="<?php echo hum_grid_class_preview();?>">

    <?php
    while ( $query_posts->have_posts() ) {

      $query_posts->the_post();
      $preview_type = !empty($post_preview_select) ? $post_preview_select : 'preview';

      include( locate_template( 'template-parts/previews/'.$preview_type.'.php' ) );

    }

    wp_reset_postdata();
    ?>

  </div>
<?php

}
