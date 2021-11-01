<?php
/**
 * Site header
 *
 * @package hum-core
 */
?>

<header class="site-header" role="banner">

  <div class="wrap-outer">

    <?php
    tha_header_top();

    echo '<div class="title-area">';

      the_custom_logo();

      echo '<p class="site-title"><a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';

      if( apply_filters( 'hum_header_site_description', false ) ) {
        echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
      }

    echo '</div>';

    tha_header_bottom();
    ?>

  </div>

</header>
