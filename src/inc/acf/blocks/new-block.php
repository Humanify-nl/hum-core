<?php
// replace 'new'

function register_new_block() {

  $register_icon = [
    'name'              => 'new',
    'title'             => __('New'),
    'description'       => __('A custom new block.'),
    'render_callback'   => 'hum_render_new_block',
    'category'          => 'media',
    'icon'              => 'heart',
    'keywords'          => [ 'icon', 'svg' ],
    'post_types'        => [ 'post', 'page' ],
    'align'             => 'left',     // left, center, right, wide and full.
    'align_text'        => 'left',     // left, center, right
    'mode'              => 'preview',  // preview, auto, edit
    //'enqueue_style'     => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.css',
    //'enqueue_script'    => get_template_directory_uri() . '/template-parts/acf/blocks/post-query.js',
    'supports'          => [
      'align'             => true,   // [ 'center', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => true,    // text alignment toolbar
      'align_content'     => true,   // content alignment toolbar
      'mode'              => true,    // preview/edit toggle
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],
    'styles'            => [
      [
        'name'            => 'primary-background',
        'label'           => __( 'Primary background', 'hum-core'),
      ]
    ],
    'example'           => [
      'attributes'        => [
        'mode'              => 'preview',
        'data'              => [
          'field_name'        => 'example field value',
          'is_preview'        => true,
        ],
      ],
    ]
    /*
    // Specifying an anonymous function
    'enqueue_assets' => function(){
      wp_enqueue_script( 'block-tabs', get_template_directory_uri() . '/assets/js/tabs.js', array('jquery'), '', true );
    },
    */

  ];

  return $register_icon;
}


function hum_render_new_block( $block, $content = '', $is_preview = false ) {

  // Debug
  // hum_print_arr($block);

  // Variables
  $className = 'acf-block block-new';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  if( !empty($block['align_text']) ) {
      $className .= ' has-text-align-' . $block['align_text'];
  }

  if( !empty($block['align_content']) ) {
      $className .= ' is-vertically-aligned-' . $block['align_content'];
  }

  // Backend preview (editor)

  // needs example[atrributes[data['is_preview' => true]]] in register block
  if ( isset( $block['data']['is_preview'])) {

    echo '<div class="editor-preview '. esc_attr($className) .'">';

      // block fields & content

    echo '</div>';

    return;


  // Editor preview

  } elseif ( $is_preview ) {

    // construct html for editor
    echo '<div class="'. esc_attr($className) .'">';

      // block fields & content

    echo '</div>';

    return;
  }


  // Front-end output

  echo '<div class="'. esc_attr($className) .'">';

    // block fields & content

  echo '</div>';

}
