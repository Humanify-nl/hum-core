<?php
/**
 * Entry
 *
 * @package hum-core
 */


/**
 * Entry Image ID
 *
 */
function hum_entry_image_id() {
	return has_post_thumbnail() ? get_post_thumbnail_id() : get_option( 'options_hum_default_image' );
}


/**
 * Entry Author
 *
 */
function hum_entry_author() {
	$id = get_the_author_meta( 'ID' );
	echo '<p class="entry-author"><a href="' . get_author_posts_url( $id ) . '" aria-hidden="true" tabindex="-1">' . get_avatar( $id, 40 ) . '</a><em>by</em> <a href="' . get_author_posts_url( $id ) . '">' . get_the_author() . '</a></p>';
}


/**
 * Entry Terms
 *
 */
function hum_terms( $tax = 'category', $link_class = 'block__link' ) {

  $get_post_terms = get_the_terms( get_the_id(), $tax );

  if ( !empty( $get_post_terms ) && !is_wp_error( $get_post_terms ) ) {

    echo '<div class="entry-terms">';

      foreach ( $get_post_terms as $post_term ) {

        $term_name = $post_term->name;
        $term_slug = $post_term->slug;
        $term_title = 'Alles over '.$term_name;
        $term_link = get_term_link( $post_term, $tax );

        echo '<a class="'.$link_class.' tax__link tax__link--'.$term_slug.'"';
        echo ' href="'.$term_link.'" rel="nofollow" title="'.$term_title.'">'.$term_name.'</a>';
      }

    echo '</div>';
  }
}
