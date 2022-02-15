<?php
/**
 * Site header
 *
 * @package hum-core
 */
?>

<header class="site-header" role="banner">

  <?php
  tha_header_top();

  echo '<div class="title-area">';

    the_custom_logo();

    echo '<div class="title-wrap">';
      echo '<p class="site-title"><a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
      echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
    echo '</div>';

  echo '</div>';

  tha_header_bottom();
  ?>

</header>
