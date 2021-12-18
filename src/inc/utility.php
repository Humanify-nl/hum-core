<?php
/**
 * Utility
 *
 * @package hum-core
 */


/**
 * Print array
 *
 */
function hum_print_arr( $array ) {
	echo '<pre>';
		echo print_r( $array );
	echo '</pre>';
}


/**
 * Get registered non-wp post types
 * @return array { post types }
 */
function hum_registered_post_types() {

	$args = [
		'public'   => true,
		'_builtin' => false,
	];

	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	$post_types = get_post_types( $args, $output, $operator );

	return $post_types;
}


/**
 * Get all registered block pattern names
 *
 */
function hum_block_pattern_names() {

  $get_patterns  = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
  $pattern_names = array_map(
      function ( array $pattern ) {
          return $pattern['name'];
      },
      $get_patterns
  );
  return $pattern_names;
}

/**
 * Get post ID to use inside an ACF block
 *
 */
function hum_acf_post_id() {
	if ( is_admin() && function_exists( 'acf_maybe_get_POST' ) ) {
    return intval( acf_maybe_get_POST( 'post_id' ) );
  } else {
    global $post;
    return $post->ID;
  }
}


function hum_get_valid_id() {

	$hum_id = hum_acf_post_id();

	if ( $hum_id > 0 ) {
		return $hum_id;
	} else {
		global $post;
		$post_id = $post->ID;

		if ( $post_id>0 && $post_id != null ) {
		  return $post_id;
		}
	  return -1;//fail safe. In case id not found at all
	}
}



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

		if ( has_post_parent() ) {

			echo '<div class="yoast">';

			yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );

			echo '</div>';
		}
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

	$defaults = [
		'taxonomy'	=> 'category',
		'field'		=> null,
		'post_id'	=> null,
	];

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
			$list = [];
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
