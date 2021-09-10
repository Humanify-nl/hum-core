<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview post-summary">

  <?php
	hum_preview_image();

	echo '<div class="preview__content">';
		hum_entry_category();
		hum_preview_title();
	echo '</div>';
  ?>

</article>
