<?php
/**
 * Block pattern support
 *
 * @package hum-core
 */

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
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

  $content = "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:post-title /-->\n\n<!-- wp:paragraph {\"fontSize\":\"normal\"} -->\n<p class=\"has-normal-font-size\">Post introduction text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:post-date /--></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:post-featured-image /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->";

	// Large Text.
	register_block_pattern(
		'hum/group-test',
		array(
			'title'         => esc_html__( 'Group test', 'hum-core' ),
			'categories'    => array( 'humanify' ),
			'viewportWidth' => 1440,
			'content'       => $content,
		)
	);
}
