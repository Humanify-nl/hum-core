<?php
function register_pages_block() {

  $register_pages_block = [
    'name'              => 'pages',
    'title'             => __('Pages'),
    'description'       => __('Display a configurable grid of children or sibling page previews.'),
    'render_callback'   => 'hum_render_pages_block',
    'category'          => 'design',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'page', 'pages', 'related' ],
    'mode'              => 'preview',
    'supports'          => [
      'align'             => [ 'wide', 'full' ],
      'align_text'        => true,
      'align_content'     => true,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_pages_block;
}


function hum_render_pages_block( $block, $content = '', $is_preview = false, $post_id = 0 ) {

  // Variables
  $className = 'wp-block acf-block pages';
  if( !empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
  }
  if( !empty( $block['align'] ) ) {
    $className .= ' align' . $block['align'];
  }
  if( !empty( $block['align_text'] ) ) {
    $className .= ' has-text-align-' . $block['align_text'];
  }

  ?>
  <div class="<?php echo esc_attr( $className ); ?>">
    <?php
    get_template_part( 'inc/acf/blocks/pages/pages-template' );
    ?>
  </div>
  <?php
}


function hum_init_pages_block() {

  acf_register_block_type(
    register_pages_block()
  );

}
add_action( 'acf/init', 'hum_init_pages_block' );
