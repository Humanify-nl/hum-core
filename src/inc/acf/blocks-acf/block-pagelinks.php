<?php
// replace 'pagelinks'

function register_pagelinks_block() {

  $register_icon = [
    'name'              => 'pagelinks',
    'title'             => __('Pagelinks'),
    'description'       => __('A Pagelinks block.'),
    'render_callback'   => 'hum_render_pagelinks_block',
    'category'          => 'media',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'pages', 'links' ],
    'post_types'        => [ 'post', 'page' ],
    //'align'             => 'left',     // left, center, right, wide and full.
    'align_text'        => 'left',     // left, center, right
    'mode'              => 'preview',  // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.css',
    //'enqueue_script'    => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.js',
    'supports'          => [
      'align'             => [ 'wide', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => false,    // text alignment toolbar
      'align_content'     => false,   // content alignment toolbar
      'mode'              => true,    // preview/edit toggle
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],
  ];

  return $register_icon;
}


function hum_render_pagelinks_block( $block, $content = '', $is_preview = false ) {

  // Debug
  // hum_print_arr($block);

  // Variables
  $className = 'acf-block block-pagelinks';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }


  // Front-end output

  echo '<div class="'. esc_attr($className) .'">';

    // block fields & content
    get_template_part( 'template-parts/acf/pagelinks/pagelinks' );

  echo '</div>';

}
