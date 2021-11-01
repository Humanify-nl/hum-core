<?php
/**
 * Content partial
 *
 * @package hum-core
 */
?>

<?php
$post_class_array = get_post_class() ;
?>

<article class="<?php echo join( ' ', $post_class_array ); ?>">

  <?php
  //hum_block_area()->show( 'entry-header' );
  if( hum_has_action( 'tha_entry_top' ) ) {
    echo '<header class="entry-header header wrap">';

      tha_entry_top();

    echo '</header>';
  }
  ?>

  <div class="entry-content">

    <?php
    tha_entry_content_before();

    the_content();

    wp_link_pages( array(
      'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'hum-core' ) . '">' . esc_html__( 'Pages:', 'hum-core' ),
      'after'  => '</nav>',
    ) );

    tha_entry_content_after();
    ?>

  </div>

  <?php
  if( hum_has_action( 'tha_entry_bottom' ) ) {
    echo '<header class="entry-footer wrap">';
      tha_entry_bottom();
    echo '</header>';
  }
  ?>

</article>
