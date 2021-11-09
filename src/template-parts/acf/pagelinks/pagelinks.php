<?php
/**
  * Pagelinks repeater
  *
  * @package hum-core
  */
?>

<div class="grid <?php echo hum_grid_class_preview(); ?>">

  <?php
  if ( have_rows( 'pagelinks_repeater') ) {

    while ( have_rows( 'pagelinks_repeater') ) {

      $enable_thumb = get_field( 'pagelinks_enable_thumbs' );

      the_row();

      // setup post type
      $page = get_sub_field( 'pagelinks_post_object' );
      setup_postdata( $page );

      // vars
      $is_archive           = get_sub_field( 'pagelinks_link_type' );
      $archive_img_id       = get_sub_field( 'pagelinks_image_archive' );
      $post_type            = get_sub_field( 'pagelinks_post_type' );
      $enable_custom_title  = get_sub_field( 'enable_pagelinks_title' );
      $custom_title         = get_sub_field( 'pagelinks_custom_title' );
      $enable_custom_descr  = get_sub_field( 'enable_pagelinks_descr' );
      $custom_descr         = get_sub_field( 'pagelinks_custom_descr' );
      $link_text            = get_sub_field( 'pagelinks_link_text' );

      // image
      $thumb = $is_archive ? wp_get_attachment_image( $archive_img_id, 'medium' ) : get_the_post_thumbnail( $page->ID,'medium' );


      if ( $is_archive ) {

        $block_title = get_sub_field( 'pagelinks_title_archive' );
        $block_descr = get_sub_field( 'pagelinks_descr_archive' );
        $block_link = get_post_type_archive_link( $post_type );

      } else {

        if ( $enable_custom_title && !empty($custom_title) ) {
          $block_title = $custom_title;
        } else {
          $block_title = $page->post_title;
        }

        if ( $enable_custom_descr && !empty($custom_descr) ) {
          $block_descr = $custom_descr;
        } else {
          $block_descr = get_the_excerpt( $page->ID );
        }

        $block_link = get_page_link( $page->ID );

      }
      ?>

      <article class="preview preview-page">

        <?php
        if ( $enable_thumb && $thumb ) {

          echo '<div class="block__thumb">';
            echo $thumb;
          echo '</div>';
        }
        ?>

        <div class="block__body">

          <?php
          if ( $block_title ) {
            echo '<h3 class="block__title">'.$block_title.'</h3>';
          }

          if ( $block_descr ) {
            echo '<div class="block__text is-excerpt"><p>'.$block_descr.'</p></div>';
          }

          if ( $block_link ) {
            ?>
            <div class="block__footer">

              <?php
              echo '<a href="'. $block_link . '" class="'. hum_button_class_preview( 'post' ) .'">';
                if ( $link_text ) { echo $link_text; } else { echo 'Lees meer';}
              echo '</a>';
              ?>

            </div>
            <?php
          }
          ?>

        </div>

      </article>
      <?php
      wp_reset_postdata();
    }
  }
  ?>

</div>
