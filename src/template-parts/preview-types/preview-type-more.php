<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-type-more <?php echo hum_acf_background_color(); ?>">

  <?php
	hum_preview_image();
	hum_preview_category();
	//hum_preview_title();
  hum_preview_excerpt_more();
  hum_preview_footer();
  ?>

</article>
