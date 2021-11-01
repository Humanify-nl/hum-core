<?php
/**
 * Archive (preview)
 *
 * @package hum-core
 */
?>

<article class="preview preview-page">

  <?php
	hum_preview_image( 'featured', true, $page );
	hum_preview_title( true, $page );
  hum_preview_excerpt( $page );
  ?>

</article>
