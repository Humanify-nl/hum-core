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
 * Conditional CSS Classes
 *
 * @param string $base_classes, classes always applied
 * @param string $optional_class, additional class applied if $conditional is true
 * @param bool $conditional, whether to add $optional_class or not
 * @return string $classes
 */
function hum_class( $base_classes, $optional_class, $conditional ) {

	return $conditional ? $base_classes . ' ' . $optional_class : $base_classes;

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
 * Get Icon
 *
 * This function is in charge of displaying SVG icons across the site.
 *
 * Place each <svg> source in the /assets/icons/{group}/ directory, without adding
 * both `width` and `height` attributes, since these are added dynamically,
 * before rendering the SVG code.
 *
 * All icons are assumed to have equal width and height, hence the option
 * to only specify a `$size` parameter in the svg methods.
 *
 */
function hum_get_icon( $atts = array() ) {

	$atts = shortcode_atts( array(
		'icon'	=> false,
		'group'	=> 'utility',
		'size'	=> 16,
		'class'	=> false,
		'label'	=> false,
	), $atts );

	if( empty( $atts['icon'] ) )
		return;

	$icon_path = get_theme_file_path( '/assets/icons/' . $atts['group'] . '/' . $atts['icon'] . '.svg' );
	if( ! file_exists( $icon_path ) )
		return;

		$icon = file_get_contents( $icon_path );

		$class = 'svg-icon';
		if( !empty( $atts['class'] ) )
			$class .= ' ' . esc_attr( $atts['class'] );

		if( false !== $atts['size'] ) {
			$repl = sprintf( '<svg class="' . $class . '" width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ', $atts['size'], $atts['size'] );
			$svg  = preg_replace( '/^<svg /', $repl, trim( $icon ) ); // Add extra attributes to SVG code.
		} else {
			$svg = preg_replace( '/^<svg /', '<svg class="' . $class . '"', trim( $icon ) );
		}
		$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
		$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.

		if( !empty( $atts['label'] ) ) {
			$svg = str_replace( '<svg class', '<svg aria-label="' . esc_attr( $atts['label'] ) . '" class', $svg );
			$svg = str_replace( 'aria-hidden="true"', '', $svg );
		}

		return $svg;
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
