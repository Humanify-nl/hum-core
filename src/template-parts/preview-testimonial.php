<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-type-testimonial <?php echo get_field( 'preview_type_testimonial', 'option' ); ?>">

  <?php
	hum_preview_image();
  echo '<div class="preview-content">';
    hum_preview_category();
    hum_preview_title();
    hum_preview_excerpt();
    hum_preview_footer();
  echo '</div>';
  ?>

</article>
