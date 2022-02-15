<?php
/**
 * Related pages section
 *
 * @package hum-core
 */

function hum_posts_related() {

  // Variables
  global $post;

  $post_amount = get_field( 'related_posts_amount', 'option' );

  $args = [
    'post_type' => [ $post->post_type ],
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'post__not_in' => [ get_the_id() ],
  ];
  $query_posts = new WP_query ( $args );


  if ( $query_posts->have_posts() ) {
  ?>

    <section class="<?php echo esc_attr( 'related related-posts' ); ?>">

      <div class="wrap">

        <?php
        // vars
        if ( $post->post_type == 'testimonial' ) {
          $option_field = get_field( 'preview_type_testimonial_rel', 'option' );
          $section_title = get_field( 'related_testimonials_title', 'option' );
        } elseif ( $post->post_type == 'portfolio' ) {
          $option_field = get_field( 'preview_type_portfolio_rel', 'option' );
          $section_title = get_field( 'related_portfolio_title', 'option' );
        } else {
          $option_field = get_field( 'preview_type_rel', 'option' );
          $section_title = get_field( 'related_posts_title', 'option' );
        }
        $preview_type = $option_field ?: 'preview-list';

        // build grid
        if ( $section_title ) { echo '<h2 class="section-title">' .$section_title. '</h2>'; }
        ?>

        <div class="<?php echo hum_grid_class_preview();?>">

          <?php
          while ( $query_posts->have_posts() ) {

            $query_posts->the_post();
            include( locate_template( 'template-parts/preview-types/'.$preview_type.'.php' ) );

          }

          wp_reset_postdata();
          ?>

        </div>
      </div>
    </section>
  <?php
  }
}
