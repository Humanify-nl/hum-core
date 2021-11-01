<?php
/**
 * Archive - functions
 *
 * @package hum-core
 */

/**
 * Archive wrap class
 *
 */
function hum_archive_wrap_class() {
  echo '<div class="'.hum_grid_class_preview().'">';
}

function hum_archive_wrap_class_end() {
  echo '</div>';
}



 /**
  * Archive header
  *
  */
function hum_archive_header() {

	$title = $description = $search = false;

	// blog
	if( is_home() && get_option( 'page_for_posts' ) ) {

		$title = get_the_title( get_option( 'page_for_posts' ) );

	// search
	} elseif( is_search() ) {

		$title = 'Search Results';
		$search = get_search_form( false );

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

	$classes = [ 'archive-header', 'header' ];
	if( is_author() ) {
		$classes[] = 'author-archive-description';
	}
  if( get_the_archive_description() ){
    $classes = [ 'archive-description' ];
  }
	?>

	<header class="<?php echo join( ' ', $classes ); ?>">

    <div class="wrap">

  	  <?php
  		do_action ('hum_archive_header_before' );

  		if( ! empty( $title ) ) {
  			echo '<h1 class="archive-title">' . $title . '</h1>';
  		}

  		echo apply_filters( 'hum_the_content', $description );
  		if ( $search ) {
        echo '<div class="archive-search">' . $search . '</div>';
      }

  		do_action ('hum_archive_header_after' );
  		?>

    </div>

	</header>

	<?php
}
