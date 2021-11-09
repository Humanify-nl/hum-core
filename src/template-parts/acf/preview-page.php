<?php
/**
  * Block page
  *
  * @package hum-v7-core
  */
?>

<article id="page-<?php echo $page->ID; ?>" class="clickable preview preview--page">

  <?php
  // thumbnail
  $enable_thumb = get_field( 'pagelinks_thumb' );
  $thumb = get_the_post_thumbnail( $page->ID,'medium' );

  if ( $enable_thumb ) {
    echo '<div class="block__thumb">';

    if ( !$thumb ) { echo hum_default_img();
    } else { echo $thumb; }

    echo '</div>';
  }
  ?>

  <div class="block__body">

    <?php
    echo '<h3 class="block__title">'.$page->post_title.'</h3>';

    echo '<div class="block__text is-excerpt"><p>';
      echo get_the_excerpt( $page->ID );
    echo '</p></div>';

    $link_title = get_field( 'page_links_title' , 'option');

    echo '<div class="block__footer is-right">';

      echo '<a href="'. get_page_link( $page->ID ) . '" class="'. hum_button_class( 'page' ) .'">'.$link_title.'</a>';

    echo '</div>';
    ?>

  </div>

</article><!--.block-->
