<?php
function register_post_single_block() {

  $register_post_query = [
    'name'              => 'post-single',
    'title'             => __('Single Post'),
    'description'       => __('Display a configurable single post-type preview.'),
    'render_template'   => 'template-parts/acf/blocks/block-single.php',
    'render_callback'   => 'hum_render_post_single_block',
    'category'          => 'design',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'single', 'post', 'query' ],
    'post_types'        => [ 'post', 'page' ],
    'mode'              => 'preview',
    'supports'          => [
      'align'             => [ 'wide', 'full' ],
      'align_text'        => false,
      'align_content'     => true,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],
  ];

  return $register_post_query;
}


function hum_render_post_single_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block block-post-single';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }
  $colorFill = get_field( 'color_picker' );
  if ( $colorFill ) {
    $className .= ' has-background has-' . $colorFill . '-background-color';
  }
  $isReverse = get_field( 'single_post_mirror' );
  if ( $isReverse ) {
    $className .= ' is-reversed';
  }
  $isDown = get_field( 'single_post_position' );
  if ( $isDown ) {
    $className .= ' is-position-down';
  }

  ?>

  <div class="<?php echo esc_attr($className); ?>">
    <?php
    get_template_part( 'inc/acf/blocks/post-single/post-single-template' );
    ?>
  </div>

  <?php
}


function hum_init_post_single_block() {

  acf_register_block_type(
    register_post_single_block()
  );

}
add_action( 'acf/init', 'hum_init_post_single_block' );
