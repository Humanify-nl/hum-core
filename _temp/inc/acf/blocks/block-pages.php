<?php
function register_pages_block() {

  $register_pages_block = [
    'name'              => 'pages',
    'title'             => __('Pages'),
    'description'       => __('A pages block to display children or siblings.'),
    //'render_template'   => 'template-parts/acf/blocks/block-pages.php',
    'render_callback'   => 'hum_render_pages_block',
    'category'          => 'formatting',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'pages', 'related' ],
    //'post_types'        => [ 'post', 'page'],
    //'align'             => 'left',      // left, center, right, wide and full.
    //'align_text'        => 'left',      // left, center, right
    'mode'              => 'preview',   // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query-related.css',
    //'enqueue_script'    => get_template_directory_uri() . '/template-parts/acf/blocks/post-query-related.js',
    'supports'          => [
      'align'             => [ 'wide', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => false,   // text alignment toolbar
      'align_content'     => true,    // content alignment toolbar
      'mode'              => true,    // preview/edit toggle
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_pages_block;
}


function hum_render_pages_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block pages';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  ?>
  <div class="<?php echo esc_attr($className); ?>">
    <?php
    get_template_part( 'template-parts/acf/pages/pages' );
    ?>
  </div>
  <?php
}
