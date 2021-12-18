<?php
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
 * @author Bill Erickson
 *
 */
// echo hum_get_icon( [ 'name' => 'waves', 'class' => 'arrow-left' ] );

function hum_get_shape( $atts = [] ) {

	$atts = shortcode_atts( [
		'name'	=> false,
		'class'	=> false,
		'label'	=> false,
	], $atts );

	if( empty( $atts['name'] ) ) {
		return;
	}

	$icon_path = get_theme_file_path( '/assets/icons/shapes-' . $atts['name'] . '.svg' );
	if( ! file_exists( $icon_path ) ) {
		return;
	}
  // get icon
	$icon = file_get_contents( $icon_path );

  // set class
	$class = 'svg-shape';
	if( !empty( $atts['class'] ) ) {
		$class .= ' ' . esc_attr( $atts['class'] );
	}

  // set size
	$replace = sprintf( '<svg class="' . $class . '"  aria-hidden="true" role="img" focusable="false"');
	$svg  = preg_replace( '/^<svg /', $replace, trim( $icon ) ); // Add extra attributes to SVG code.


  // clean
	$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
	$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.

  // set label
	if( !empty( $atts['label'] ) ) {
		$svg = str_replace( '<svg class', '<svg aria-label="' . esc_attr( $atts['label'] ) . '" class', $svg );
		$svg = str_replace( 'aria-hidden="true"', '', $svg );
	}

	return $svg;
}
