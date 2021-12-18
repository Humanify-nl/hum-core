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
function hum_preview_title( $link = true, $heading = 'h3') {

	if ( is_admin() ) {
		$link = false;
	}

	// get content
	$title = get_the_title();
	$url = get_permalink();

	// title tag
	$title_tag_size = get_field( 'heading_size' );
	$title_tag = $title_tag_size ? $title_tag_size : $heading;


	// build html
	echo '<' .$title_tag. ' class="preview__title">';

	if ( $link ) {
		echo '<a class="preview__link" href="' . $url . '">' . $title . '</a>';
	} else {
		echo $title;
	}

	echo '</' .$title_tag. '>';
}


/**
 * Preview category
 *
 */
function hum_preview_category( $link = true ) {

	if ( is_admin() ) {
		$link = false;
	}

	$term = hum_terms_first();
	if( !empty( $term ) && ! is_wp_error( $term ) ) {

		echo '<div class="preview__category">';
		if ( $link ) {
			echo ' <a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a>';
		} else {
			echo $term->name;
		}
		echo '</div>';
	}
}



/**
 * Preview image
 *
 */
function hum_preview_image( $size = 'medium',  $link = true ) {

	if ( is_admin() ) {
		$link = false;
	}

	$url = get_permalink();
	$image = wp_get_attachment_image( hum_entry_image_id(), $size );

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
function hum_preview_excerpt( $class = false ) {

	$classes[] = 'preview__excerpt';

	if ( $class ) {
		$classes[] = $class;
	}
	$class = join( '', $classes );

	if ( has_excerpt () ) {
		echo '<div class="' . esc_attr( $class ) . '">'; the_excerpt(); echo '</div>';
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
				[
					'span' => [
						'class' => [],
					],
				]
			),
			get_the_title()
		) );
	}
}


/**
 * Preview link
 *
 */
function hum_preview_button( $link = true, $link_title = 'Read more' ) {

	if ( is_admin() ) {
		$link = false;
	}

	$post_type = get_post_type( get_the_id() );
	$preview_type = $post_type ? $post_type : 'post';

	// link
	$link_url = get_permalink();
	$link_title_opt = is_page() ? get_field( 'page_links_title' , 'option') : get_field( 'post_links_title' , 'option');
  $link_title = $link_title_opt ? $link_title_opt : 'Read more';

	echo '<div class="wp-block-button">';
	if ( $link ) {
		echo '<a href="' . $link_url . '" class="wp-block-button__link '. hum_button_class_preview( $preview_type ). '">'.$link_title.'</a>';
	} else {
		echo '<div class="wp-block-button__link '. hum_button_class_preview( $preview_type ). '">'.$link_title.'</div>';
	}
	echo '</div>';
}


/**
 * Preview footer
 *
 */
function hum_preview_footer( $link = true, $link_title = 'Read more' ) {

  echo '<div class="preview__footer">';
    hum_preview_button( $link, $link_title );
  echo '</div>';
}


/**
 * Preview date
 *
 */
function hum_preview_date_square() {

	$date_start_day = date_i18n( "j", strtotime( get_the_date() ) );
	$date_start_month = date_i18n( "M", strtotime( get_the_date() ) );

	if ( $date_start_day ) {
		echo '<div class="preview__date">';
			echo '<div class="date--square">';
				echo '<div class="date__day">'.$date_start_day.'</div>';
				echo '<div class="date__month">'.$date_start_month.'</div>';
			echo '</div>';
		echo '</div>';
	}

}
