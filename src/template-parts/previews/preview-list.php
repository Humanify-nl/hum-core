<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-list">

  <?php
	hum_preview_image( 'small' );

	echo '<div class="preview__content">';
		hum_preview_title();
    hum_preview_excerpt();
    hum_preview_category();
    hum_preview_footer();
	echo '</div>';
  ?>

</article>
