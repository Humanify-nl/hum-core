<?php
/**
 * Font
 *
 * @package hum-core
 */

function hum_font_google(){

  ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
  <?php

}
add_action( 'wp_head', 'hum_font_google' );
