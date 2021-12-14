<?php
function register_icon_block() {

  $register_icon = [
    'name'              => 'icon',
    'title'             => __('Icon'),
    'description'       => __('A custom icon block.'),
    'render_callback'   => 'hum_render_icon_block',
    'category'          => 'media',
    'icon'              => 'heart',
    'keywords'          => [ 'icon', 'svg' ],
    'post_types'        => [ 'post', 'page' ],
    'align'             => 'left',
    'align_text'        => 'left',
    'mode'              => 'preview',
    'supports'          => [
      'align'             => false,
      'align_text'        => true,
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
          'select_svg_icon'   => 'heart',
          'is_preview'        => true,
        ],
      ],
    ]

  ];

  return $register_icon;
}


function hum_render_icon_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'acf-block block-icon-svg';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  if( !empty($block['align_text']) ) {
      $className .= ' align' . $block['align_text'];
  }


  // Backend preview (editor)
  // needs example[atrributes[data['is_preview' => true]]] in register block

  if ( isset( $block['data']['is_preview'])) {

    echo '<div class="editor-preview '. esc_attr($className) .'">';

      $icon_selected = get_field( 'select_svg_icon' );
      echo '<div class="block-icon-svg__wrap">';
        // construct html for preview
        echo hum_get_icon( [ 'icon' => $icon_selected, 'group' => 'bs', 'size' => 32, 'class' => $icon_selected ] );
      echo '</div>';

    echo '</div>';

    return;


  // Editor preview

  } elseif ( $is_preview ) {

    // construct html for editor
    ?>
    <div class="<?php echo esc_attr($className); ?>">

      <?php
      $icon_selected = get_field( 'select_svg_icon' );
      echo '<div class="block-icon-svg__wrap">';

        if ( !empty( $icon_selected ) ) {
          echo hum_get_icon( [ 'icon' => $icon_selected, 'group' => 'bs', 'size' => 32, 'class' => $icon_selected ] );
        }

      echo '</div>';

      ?>

    </div>
    <?php
    return;
  }

  // Front-end output
  ?>
  <div class="<?php echo esc_attr($className); ?>">

    <?php
    $icon_selected = get_field( 'select_svg_icon' );
    echo '<div class="block-icon-svg__wrap">';

      if ( !empty( $icon_selected ) ) {
        echo hum_get_icon( [ 'icon' => $icon_selected, 'group' => 'bs', 'size' => 32, 'class' => $icon_selected ] );
      }

    echo '</div>';
    ?>

  </div>
  <?php
}
