<?php
/**
 * Post preview
 *
 * @package hum-core
 */


/**
 * Preview post title
 *
 */
function hum_preview_title( $link = true, $page = false ) {

	if ( is_admin() ) {
		$link = false;
	}

	if ( $page ) {
		$title = $page->post_title;
		$url =  get_page_link( $page->ID );
	} else {
		$title = get_the_title();
		$url = get_permalink();
	}

	echo '<h3 class="preview__title">';

	if ( $link ) {
		echo '<a class="preview__link" href="' . $url . '">' . $title . '</a>';
	} else {
		echo $title;
	}

	echo '</h3>';
}


/**
 * Preview date
 *
 */
function hum_preview_date_square() {

	$date_start_day = date_i18n( "j", strtotime( get_the_date() ) );
	$date_start_month = date_i18n( "M", strtotime( get_the_date() ) );

	echo '<div class="preview__date">';
		echo '<div class="date--square">';
			echo '<div class="date__day">'.$date_start_day.'</div>';
			echo '<div class="date__month">'.$date_start_month.'</div>';
		echo '</div>';
	echo '</div>';
}


/**
 * Preview category
 *
 */
function hum_preview_category( $args = ['taxonomy' => 'category'] ) {

	$term = hum_terms_first();
	if( !empty( $term ) && ! is_wp_error( $term ) ) {
		echo '<div class="preview__category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></div>';
	}
}



/**
 * Preview image
 *
 */
function hum_preview_image( $size = 'medium',  $link = true, $page = false ) {

	if ( is_admin() ) {
		$link = false;
	}

	if ( $page ) {
		$url = get_page_link( $page->ID );
		$image = get_the_post_thumbnail( $page->ID, $size );
	} else {
		$url = get_permalink();
		$image = wp_get_attachment_image( hum_entry_image_id(), $size );
	}
	/*
	if (empty($image)) {
		$image = hum_default_img();
	}
  */
	if ( $image ) {

		if ( $link ) {
			echo '<a class="preview__img preview__img--link" href="' . $url . '" tabindex="-1" aria-hidden="true">' . $image . '</a>';
		} else {
			echo '<div class="preview__img" tabindex="-1" aria-hidden="true">' . $image . '</div>';
		}
	} else {
		return;
	}
}


/**
 * Preview excerpt
 *
 */
function hum_preview_excerpt( $page = false, $class = false ) {

	$classes[] = 'preview__excerpt';

	if ( $class ) {
		$classes[] = $class;
	}
	$class = join( '', $classes );

	if ( $page ) {

		$excerpt = get_the_excerpt( $page->ID );
		if ( $excerpt ) {
			echo '<div class="' . esc_attr( $class ) . '"><p>' . $excerpt . '</p></div>';
		}

	} else {

		if ( has_excerpt () ) {
			echo '<div class="' . esc_attr( $class ) . '">'; the_excerpt(); echo '</div>';
		}
	}

}


/**
 * Display post content with "more" link when applicable
 *
 */
if ( ! function_exists( 'hum_preview_excerpt_more' ) ) {

	function hum_preview_excerpt_more() {

		$link_title = get_field( 'post_links_title', 'option');

		the_content( sprintf(

			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( $link_title.'<span class="screen-reader-text"> "%s"</span>', 'hum-base' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
	}
}


/**
 * Preview link
 *
 */
function hum_preview_button( $preview_type = 'post' , $link_title = 'Read more' ) {

	// link
	$link_title = get_field( 'post_links_title' , 'option');
  echo '<a href="'; the_permalink(); echo '" class="'. hum_button_class_preview( $preview_type ). '">'.$link_title.'</a>';

}


/**
 * Preview footer
 *
 */
function hum_preview_footer( $preview_type = 'post' , $link_title = 'Read more' ) {

	// link
	$link_title = get_field( 'post_links_title' , 'option');

  echo '<div class="preview__footer">';
    hum_preview_button( $preview_type, $link_title );
  echo '</div>';
}
