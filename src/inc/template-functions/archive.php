<?php
/**
 * Archive - functions
 *
 * @package hum-core
 */

 /**
  * Archive header
  *
  */
function hum_archive_header() {

	$title = $subtitle = $description = $more = false;

	// blog
	if( is_home() && get_option( 'page_for_posts' ) ) {

		$title = get_the_title( get_option( 'page_for_posts' ) );

	// search
	} elseif( is_search() ) {

		$title = 'Search Results';
		$more = get_search_form( false );

  // archive
	} elseif( is_archive() ) {

		$title = get_the_archive_title();
		if( ! get_query_var( 'paged' ) ){
			$description = get_the_archive_description();
		}
	}

	if( empty( $title ) && empty( $description ) ) {
		return;
	}

	$classes = [ 'archive-description' ];
	if( is_author() ) {
		$classes[] = 'author-archive-description';
	}
	?>

	<header class="<?php join( ' ', $classes ) ?>">

		<?php
		do_action ('hum_archive_header_before' );

		if( ! empty( $title ) ) {
			echo '<h1 class="archive-title">' . $title . '</h1>';
		}
		if( ! empty( $subtitle ) ) {
			echo '<h4>' . $subtitle . '</h4>';
		}
		echo apply_filters( 'ea_the_content', $description );
		echo $more;

		do_action ('hum_archive_header_before' );
		?>

	</header>

	<?php
}
