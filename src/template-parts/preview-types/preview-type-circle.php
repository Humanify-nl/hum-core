<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-type-circle center <?php echo hum_acf_background_color(); ?>">

  <?php
	hum_preview_image( 'small' );
	hum_preview_category();
	hum_preview_title();
  hum_preview_excerpt();
  hum_preview_footer();
  ?>

</article>
