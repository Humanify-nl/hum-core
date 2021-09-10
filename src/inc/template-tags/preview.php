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
function hum_preview_title() {
	global $wp_query;
	$tag = ( is_singular() || -1 === $wp_query->current_post ) ? 'h3' : 'h2';
	echo '<' . $tag . ' class="preview__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></' . $tag . '>';
}


/**
 * Preview category
 *
 */
function hum_entry_category( $args = ['taxonomy' => 'category'] ) {
	$term = hum_terms_first();
	if( !empty( $term ) && ! is_wp_error( $term ) )
		echo '<p class="preview__category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></p>';
}


/**
 * Preview image
 *
 */
function hum_preview_image( $size = 'thumbnail_medium' ) {
	echo '<a class="preview__image" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . wp_get_attachment_image( hum_entry_image_id(), $size ) . '</a>';
}
