<?php
function register_image_block() {

  $register_image = [
    'name'              => 'image',
    'title'             => __('Image'),
    'description'       => __('Add an image block.'),
    'render_callback'   => 'hum_render_image_block',
    'category'          => 'media',
    'icon'              => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z"></path></svg>',
    'keywords'          => [ 'image', 'img' ],
    'mode'              => 'preview',  // preview, auto, edit
    'supports'          => [
      'align'             => [ 'center', 'wide', 'full' ], // customize alignment toolbar (false = disable)
      'align_text'        => false,
      'align_content'     => false,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],
    'example'           => [
      'attributes'        => [
        'mode'              => 'preview',
        'data'              => [
          'is_preview'        => true,
        ],
      ],
    ]


  ];

  return $register_image;
}


function hum_render_image_block( $block, $content = '', $is_preview = false ) {

  // Debug
  // hum_print_arr($block);

  // Variables
  $className = 'acf-block block-image';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  /*
  $imageSize = get_field( 'image_size_select' );
  if ( $imageSize ) {
    $className .= ' size-' . $imageSize;
  }
  */

  // Backend preview (editor)

  // needs example[atrributes[data['is_preview' => true]]] in register block

  if ( isset( $block['data']['is_preview'])) {

    echo '<div class="editor-preview">';

      // construct html for editor
      $image_src = get_template_directory_uri() . '/assets/images/image_example.png';

      echo '<img src="' . $image_src . '">';

    echo '</div>';

    return;


  // Editor preview

  } elseif ( $is_preview ) {

    // construct html for editor
    echo '<figure class="'. esc_attr($className) .'">';

      get_template_part( 'template-parts/acf/image/image' );

    echo '</figure>';

    return;
  }


  // Front-end output

  echo '<figure class="'. esc_attr($className) .'">';

    get_template_part( 'template-parts/acf/image/image' );

  echo '</figure>';

}
