<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-circle center">

  <?php
	hum_preview_image( 'small' );
	hum_preview_category();
	hum_preview_title();
  hum_preview_excerpt();
  hum_preview_footer();
  ?>

</article>
