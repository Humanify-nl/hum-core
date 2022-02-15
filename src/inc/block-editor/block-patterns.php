<?php
/**
 * Block pattern support
 *
 * @package hum-core
 */


/**
 * Add new pattern names here
 */
hum_register_block_pattern( 'post-query' );
hum_register_block_pattern( 'forminator' );


/**
 * Remove core Block patterns
 */
remove_theme_support( 'core-block-patterns' );


/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'humanify',
		[ 'label' => esc_html__( 'Humanify', 'hum-core' ) ]
	);
}


/**
 * Get pattern template
 *
 * https://permanenttourist.ch/2021/02/easier-block-patterns-using-template-parts/
 */
function hum_get_pattern_template( $pattern_name ) {

	// return early if no input
	if ( !$pattern_name ) {
		return;
	}

	// open output buffer
	ob_start();
	// get pattern template-part
	get_template_part( 'inc/block-editor/patterns/' . $pattern_name );
	// save contents in var
	$pattern_template = ob_get_contents();
	// close output buffer
	ob_end_clean();

	return $pattern_template;

}


/**
 * Create a block pattern
 *
 */
function hum_register_block_pattern( $pattern ) {

  if ( function_exists( 'register_block_pattern' ) ) {

		$pattern_title = ucfirst(str_replace('-', ' ', $pattern ));
		$pattern_template = hum_get_pattern_template( 'pattern-'. $pattern );

		register_block_pattern(
			'hum/'.$pattern,
			[
				'title'         => esc_html__( $pattern_title, 'hum-core' ),
				'categories'    => [ 'humanify' ],
				//'viewportWidth' => 1440,
				'content'       => $pattern_template,
			]

		);

	}
}
