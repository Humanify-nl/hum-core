<?php
/**
 * Entry content
 *
 * @package hum-core
 */


/**
 * Entry Title
 *
 */
function hum_entry_title() {
	echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
}


/**
 * Post Comments
 *
 */
function hum_comments() {

	if ( is_single() && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}

}
add_action( 'tha_content_while_after', 'hum_comments' );


/**
 * Entry header share hook
 *
 */
/*
function hum_entry_header_share() {
	do_action( 'hum_entry_header_share' );
}
*/


/**
 * After Entry
 *
 */
function hum_single_after_entry() {

	echo '<section class="after-entry">';

		echo '<div class="wrap">';

		hum_breadcrumbs();

		echo '<p class="publish-date">Published on ' . get_the_date( 'F j, Y' ) . '</p>';

		// Sharing
		// do_action( 'hum_entry_footer_share' );

		echo '</div>';

	echo '</section>';
}
