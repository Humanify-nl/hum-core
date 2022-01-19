<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-calendar <?php echo hum_acf_background_color(); ?>">

  <?php
	hum_preview_date_square();

	echo '<div class="preview__content">';

		hum_preview_title();

	echo '</div>';
  ?>

</article>
