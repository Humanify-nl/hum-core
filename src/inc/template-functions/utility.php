<?php
/**
 * Utility
 *
 * @package hum-core
 */


/**
 * Has action hook
 *
 */
function hum_has_action( $hook ) {

	ob_start();
	do_action( $hook );
	$render = ob_get_clean();
	return !empty( $render );

}


/**
 * Yoast breadcrumbs
 *
 */

function hum_breadcrumbs() {

	if ( function_exists('yoast_breadcrumb') ) {

		echo '<div class="yoast">';

		yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );

		echo '</div>';
	}
}



/**
 * Get the first term attached to post
 *
 * @param string $taxonomy
 * @param string/int $field, pass false to return object
 * @param int $post_id
 * @return string/object
 */
function hum_terms_first( $args = [] ) {

	$defaults = array(
		'taxonomy'	=> 'category',
		'field'		=> null,
		'post_id'	=> null,
	);

	$args = wp_parse_args( $args, $defaults );

	$post_id = !empty( $args['post_id'] ) ? intval( $args['post_id'] ) : get_the_ID();
	$field = !empty( $args['field'] ) ? esc_attr( $args['field'] ) : false;
	$term = false;

	// Use WP SEO Primary Term
	// from https://github.com/Yoast/wordpress-seo/issues/4038
	if( class_exists( 'WPSEO_Primary_Term' ) ) {
		$term = get_term( ( new WPSEO_Primary_Term( $args['taxonomy'],  $post_id ) )->get_primary_term(), $args['taxonomy'] );
	}

	// Fallback on term with highest post count
	if( ! $term || is_wp_error( $term ) ) {

		$terms = get_the_terms( $post_id, $args['taxonomy'] );

		if( empty( $terms ) || is_wp_error( $terms ) ) {
			return false;
		}

		// If there's only one term, use that
		if( 1 == count( $terms ) ) {
			$term = array_shift( $terms );
		// If there's more than one...
		} else {
		  // Sort by post count
			$list = array();
			foreach( $terms as $term ) {
				$list[$term->count] = $term;
			}
			ksort( $list, SORT_NUMERIC );
			$list = array_reverse( $list );

			$term = array_shift( $list );
		}
	}

	// Output
	if( !empty( $field ) && isset( $term->$field ) ) {
		return $term->$field;
	} else {
		return $term;
	}

}


/**
 * Get all the registered image sizes along with their dimensions
 *
 * @global array $_wp_additional_image_sizes
 *
 * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
 *
 * @return array $image_sizes The image sizes
 */
function hum_get_all_image_sizes() {
    global $_wp_additional_image_sizes;

    $default_image_sizes = get_intermediate_image_sizes();

    foreach ( $default_image_sizes as $size ) {
        $image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
        $image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
        $image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
    }

    if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
        $image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
    }

    return $image_sizes;
}
