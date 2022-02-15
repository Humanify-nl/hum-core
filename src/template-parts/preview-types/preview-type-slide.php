<?php
/**
 * Preview slide
 *
 * @package hum-core
 */
?>

<article class="preview preview-type-slide <?php echo hum_acf_background_color(); ?>">

  <?php
	hum_preview_image( 'medium', $link = false );

	echo '<div class="preview-content inside">';
    hum_preview_title();
		hum_preview_category();
    hum_preview_excerpt();
    hum_preview_footer();
	echo '</div>';
  ?>

</article>
