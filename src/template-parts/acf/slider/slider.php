<?php
/**
 * Slider with swiper.js
 *
 * ACF:
 *
 * @package hum-core
 */

$slide_size = get_field( 'image_size_select' );
$slide_text_align = get_field( 'text_align_select' );

if ( have_rows( 'swiper_slides' ) ) {

  ?>
  <div class="swiper slider">

    <div class="swiper-wrapper">

      <?php
      while ( have_rows( 'swiper_slides' ) ) {

        the_row();

        $slide_img_id = get_sub_field( 'slider_img_id' );
        $slide_title = get_sub_field( 'slider_title' );
        $slide_subtitle = get_sub_field( 'slider_subtitle' );

        echo '<div class="swiper-slide">';

          if ( $slide_title || $slide_subtitle ) {

            echo '<div class="slider-text">';

              echo '<div class="slider-text-wrap">';

                if ( $slide_title ) {
                  echo '<h2 class="slider-title'; if ( $slide_text_align ) { echo ' has-text-align-' . $slide_text_align; } echo '">'.$slide_title.'</h2>';
                }

                if ( $slide_subtitle ) {
                  echo '<h3 class="slider-subtitle'; if ( $slide_text_align ) { echo ' has-text-align-' . $slide_text_align; } echo '">'.$slide_subtitle.'</h3>';
                }

              echo '</div>';

            echo '</div>';

          }

          echo wp_get_attachment_image( $slide_img_id, $slide_size );

        echo '</div>';

      }
      ?>

    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

  </div>
  <?php
}
