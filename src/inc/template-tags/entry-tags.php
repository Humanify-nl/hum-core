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
	return has_post_thumbnail() ? get_post_thumbnail_id() : get_option( 'options_default_image' );
}


/**
 * Entry image
 *
 */
function hum_entry_image( $size = 'post-image' ) {
 	echo the_post_thumbnail( $size );
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
 * Entry Category
 *
 */
function hum_entry_category( $args = ['taxonomy' => 'category'] ) {
	$term = hum_terms_first();
	if( !empty( $term ) && ! is_wp_error( $term ) )
		echo '<p class="entry-category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></p>';
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
        $term_title = 'To '. $term_name . ' archive';
        $term_link = get_term_link( $post_term, $tax );

        echo '<a class="'.$link_class.' tax__link tax__link--'.$term_slug.'"';
        echo ' href="'.$term_link.'" rel="nofollow" title="'.$term_title.'">'.$term_name.'</a>';
      }

    echo '</div>';
  }
}


/**
 * Publish date & updated on
 *
 */

if ( ! function_exists( 'hum_entry_published' ) ) {

  function hum_entry_published( $update = false ) {

    if ( is_single() && $update ) {

      if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="post-date published" datetime="%1$s">%2$s</time>';
				$time_string .= '<time class="post-date updated" datetime="%3$s">'. esc_html('Updated: ') .'%4$s</time>';
      } else {
        $time_string = '<time class="post-date published" datetime="%1$s">%2$s</time>';
      }

    } else {

      if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="post-date published" datetime="%3$s">%4$s</time>';
      } else {
        $time_string = '<time class="post-date published" datetime="%1$s">%2$s</time>';
      }
    }

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      get_the_date(),
      esc_attr( get_the_modified_date( 'c' ) ),
      get_the_modified_date()
    );

    echo '<div class="date">'.$time_string.'</div>';

  }
}


/**
 * Preview excerpt
 *
 */
function hum_entry_excerpt( $page = false, $class = false ) {

	$classes[] = 'entry__excerpt';

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
