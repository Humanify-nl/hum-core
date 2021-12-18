<?php
function register_post_query_block() {

  $register_post_query = [
    'name'              => 'post-query',
    'title'             => __('Post Query'),
    'description'       => __('Display a configurable grid of post-type previews.'),
    'render_template'   => 'template-parts/acf/blocks/block-post-query.php',
    'render_callback'   => 'hum_render_post_query_block',
    'category'          => 'design',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'query', 'post' ],
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
    'styles'            => [
      [
        'name'            => 'preview-bg',
        'label'           => __( 'Preview background', 'hum-core'),
      ]
    ],

  ];

  return $register_post_query;
}


function hum_render_post_query_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block post-query';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  ?>
  <div class="<?php echo esc_attr($className); ?>">
    <?php
    get_template_part( 'template-parts/acf/post-query/post-query' );
    ?>
  </div>
  <?php
}
