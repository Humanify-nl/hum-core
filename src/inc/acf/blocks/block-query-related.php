<?php
function register_post_query_related_block() {

  $register_post_query = [
    'name'              => 'post-query-related',
    'title'             => __('Related posts'),
    'description'       => __('A custom related post query block.'),
    'render_template'   => 'template-parts/acf/blocks/block-query-related.php',
    'render_callback'   => 'hum_render_post_query_related_block',
    'category'          => 'formatting',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'query', 'post', 'related' ],
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

  return $register_post_query;
}


function hum_render_post_query_related_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block post-query-related';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  ?>
  <div class="<?php echo esc_attr($className); ?>">
    <?php
    get_template_part( 'template-parts/acf/post-query-related/post-query-related' );
    ?>
  </div>
  <?php
}


// render this block outside editor

function hum_post_query_related() {
  // Variables
  $className = 'post-query-related vs-mt-lg vs-mb-lg';

  ?>
  <section class="<?php echo esc_attr($className); ?>">
    <div class="wrap">
      <?php
      $section_title = get_field( 'related_posts_title', 'option' );
      if ( $section_title ) { echo '<h2 class="section-title vs-mb-md">' .$section_title. '</h2>'; }
      get_template_part( 'template-parts/acf/post-query-related/post-query-related' );
      ?>
    </div>
  </section>
  <?php
}
