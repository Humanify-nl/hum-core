<?php
/**
 * Query posts
 *
 * @package hum-core
 */


$post_order = get_field( 'post_slider_order' );
$post_type = get_field( 'post_query_type' );

$args = [
  'post_type' => [ $post_type ],
  'orderby' => 'date',
  'order' => $post_order,
  'posts_per_page' => 2,
];

$query_posts = new WP_query ( $args );

if ( $query_posts->have_posts() ) {

  $preview_select = get_field( 'preview_type_select' );
  $preview_type = $preview_select ?: 'preview';
  ?>

  <div class="swiper-post slider">

    <?php //<div class="swiper-pagination swiper-post-pagination"></div>?>

    <div class="swiper-wrapper">

      <?php
      while ( $query_posts->have_posts() ) {

        echo '<div class="swiper-slide">';

        $query_posts->the_post();
        get_template_part( 'template-parts/preview-types/'. $preview_type );
        //get_template_part( 'template-parts/preview-types/preview-type-swiper' );

        echo '</div>';
      }
      wp_reset_postdata();
      ?>

    </div>

  </div>

  <div class="swiper-button-prev swiper-post-button-prev"><?php echo hum_get_icon( [ 'icon' => 'chevron-left', 'group' => 'bs', 'size' => 32, 'class' => ''] ); ?></div>
  <div class="swiper-button-next swiper-post-button-next"><?php echo hum_get_icon( [ 'icon' => 'chevron-right', 'group' => 'bs', 'size' => 32, 'class' => '' ] ); ?></div>

<?php

} else {

  echo '<p><small>No posts selected</small></p>';

}
