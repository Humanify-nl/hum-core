<?php
/**
 * Archive no results 404 / search
 *
 * @package hum-core
 */
?>

<section class="no-results not-found">

	<header class="entry-header header">
		<div class="wrap">
    	<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'hum-core' ) ?></h1>
		</div>
  </header>

	<div class="entry-content">

    <?php
  	if ( is_search() ) {

  		echo '<p>' . esc_html__( 'Sorry, nothing matched your search terms. Please try again with some different keywords.', 'hum-core' ) . '</p>';
  		get_search_form();

  	} else {

  		echo '<p>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hum-core' ) . '</p>';
  		get_search_form();
  	}
    ?>

	</div>

</section>
