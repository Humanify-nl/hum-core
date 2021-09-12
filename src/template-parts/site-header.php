<?php
/**
 * Site header
 *
 * @package hum-core
 */
?>

<header class="site-header" role="banner">

  <div class="wrap">

    <?php
    tha_header_top();

    echo '<div class="title-area">';

      $logo_tag = ( apply_filters( 'hum_h1_site_title', false ) || ( is_front_page() && is_home() ) ) ? 'h1' : 'p';
      echo '<' . $logo_tag . ' class="site-title"><a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></' . $logo_tag . '>';

      if( apply_filters( 'hum_header_site_description', false ) ) {
        echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
      }
    echo '</div>';

    tha_header_bottom();
    ?>

  </div>

</header>
