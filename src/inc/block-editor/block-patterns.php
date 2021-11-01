<?php
/**
 * Block pattern support
 *
 * @package hum-core
 */


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
		array( 'label' => esc_html__( 'Humanify', 'hum-core' ) )
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
	get_template_part( 'template-parts/blocks/patterns/'.$pattern_name );
	// save contents in var
	$pattern_template = ob_get_contents();
	// close output buffer
	ob_end_clean();

	return $pattern_template;

}


/**
 * Register Block Patterns.
 */

if ( function_exists( 'register_block_pattern' ) ) {

	$post_query_template = hum_get_pattern_template( 'pattern-post-query' );
	$forminator_template = hum_get_pattern_template( 'pattern-forminator' );

	// Post query
	register_block_pattern(
		'hum/post-query',
		[
			'title'         => esc_html__( 'Post query', 'hum-core' ),
			'categories'    => [ 'humanify' ],
			//'viewportWidth' => 1440,
			'content'       => $post_query_template,
		]

	);

	register_block_pattern(
		'hum/forminator',
		[
			'title'         => esc_html__( 'Forminator', 'hum-core' ),
			'categories'    => [ 'humanify' ],
			//'viewportWidth' => 1440,
			'content'       => $forminator_template,
		]

	);
}
