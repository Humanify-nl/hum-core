<?php
function register_pages_block() {

  $register_pages_block = [
    'name'              => 'pages',
    'title'             => __('Pages'),
    'description'       => __('A pages block to display children or siblings.'),
    'render_callback'   => 'hum_render_pages_block',
    'category'          => 'formatting',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'pages', 'related' ],
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

  ?>
  <div class="<?php echo esc_attr( $className ); ?>">
    <?php
    get_template_part( 'template-parts/acf/pages/pages' );
    ?>
  </div>
  <?php
}
