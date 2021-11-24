<?php
/**
 * Block template for standard post & page
 *
 * @package hum-core
 */

function post_blocks_template() {

  $post = [
    [ 'core/post-excerpt', [ 'moreText' => 'More', 'showMoreOnNewLine' => false, 'content' => 'Add a short excerpt here'] ],
  ];

  $testimonial = [
    [ 'core/post-excerpt', [ 'moreText' => 'More', 'showMoreOnNewLine' => false, 'content' => 'Add a short excerpt here'] ],
  ];

  $page = [
    [ 'core/post-title', [] ],
  ];

  $post_types = [
     'page',
     'post',
     'testimonial'
   ];

  foreach( $post_types as $post_type ) {

    $post_type_object = get_post_type_object( $post_type );
    if ( is_array(${$post_type}) ) {
      $post_type_object->template = ${$post_type};
      //$post_type_object->template_lock = 'all';
    }
  }


}
add_action( 'init', 'post_blocks_template' );



/**
 * Get pattern template
 *
 * https://permanenttourist.ch/2021/02/easier-block-patterns-using-template-parts/
 */

function hum_get_block_template( $post_type_name ) {

	// return early if no input
	if ( !$post_type_name ) {
		return;
	}

	// open output buffer
	ob_start();
	// get pattern template-part
	get_template_part( 'inc/block-editor/post-type-templates/block-template-'.$post_type_name );
	// save contents in var
	$block_template = ob_get_contents();
	// close output buffer
	ob_end_clean();

	return $block_template;

}

/*
$block_template_post = [
  [ 'core/group', [ 'className' => 'entry-input'],
    [
      [ 'core/columns', [],
        [
          [ 'core/column', [ 'templateLock' => 'all' ],
            [
              [ 'core/post-excerpt', [ 'moreText' => 'More', 'showMoreOnNewLine' => false, 'content' => 'Add your excerpt here'] ],
            ]
          ]
        ]
      ]
    ]
  ],
];
*/

/*

function post_blocks_template() {

  $post_type_object = get_post_type_object( 'post' );
  $post_type_object->template = array(
    array( 'core/group', array( 'className' => 'entry-header', 'templateLock' => 'all', 'align' => 'full' ), array(
      array( 'core/columns', array( 'align' => 'wide' ), array(
        array( 'core/column', array( 'templateLock' => 'all' ), array(
          array( 'core/post-title', array( 'className' => 'entry-title', 'content' => 'Add post title' ) ),
          array( 'core/post-date', array() ),
          array( 'core/paragraph', array( 'content' => 'Type your post introduction' ) ),
        ) ),
        array( 'core/column', array( 'templateLock' => 'all' ), array(
          array( 'core/post-featured-image' ),
        ) ),
      ) ),
    ) ),
    array( 'core/group', array(), array(
      array( 'core/columns', array( 'align' => 'wide' ), array(
        array( 'core/column', array(), array(
          array( 'core/paragraph', array() ),
        ) ),
      ) ),
    ) ),
    // array( 'core/block', array( 'ref' => 171 ) ), // reusable blocks (id)
  );
  //$post_type_object->template_lock = 'all';
}
add_action( 'init', 'post_blocks_template' );
*/
