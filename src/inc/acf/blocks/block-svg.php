<?php
function register_svg_block() {

  $register_svg = [
    'name'              => 'svg',
    'title'             => __('SVG image'),
    'description'       => __('Add SVG for icons & shapes.'),
    'render_callback'   => 'hum_render_svg_block',
    'category'          => 'media',
    'icon'              => 'heart',
    'keywords'          => [ 'icon', 'svg' ],
    'align'             => 'left',
    'align_text'        => 'left',
    'mode'              => 'preview',
    'supports'          => [
      'align'             => ['wide', 'full'],
      'align_text'        => true,
      'align_content'     => false,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
      'color'             => false,
      'background'        => true,
    ],
    'example'           => [
      'attributes'        => [
        'mode'              => 'preview',
        'data'              => [
          'select_svg_icon'   => 'heart',
          'svg_background'   => true,
          'is_preview'        => true,
        ],
      ],
    ]

  ];

  return $register_svg;
}


function hum_render_svg_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'acf-block block-svg';

  if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
  }

  if( !empty($block['align_text']) ) {
    $className .= ' align' . $block['align_text'];
  }

  if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
  }

  $colorFill = get_field( 'color_picker' );
  if ( $colorFill ) {
    $className .= ' has-' . $colorFill . '-color';
  }

  $svg_switch_shape = get_field( 'select_svg_type' );
  if ( $svg_switch_shape ) {
    $className .= ' is-shape';
  } else {
    $className .= ' is-icon';
  }

  $colorFill = get_field( 'svg_background' );
  if ( $colorFill ) {
    $className .= ' icon-background';
  }

  $flip_shape = get_field( 'svg_shape_flip' );
  if ( $flip_shape ) {
    $className .= ' is-flipped';
  }


  // Backend preview (editor)
  // needs example[atrributes[data['is_preview' => true]]] in register block

  if ( isset( $block['data']['is_preview'])) {

    echo '<div class="editor-preview '. esc_attr($className) .'">';

      echo '<div class="block-svg__wrap">';
        echo hum_svg_select();
      echo '</div>';

    echo '</div>';

    return;


  // Editor preview

  } elseif ( $is_preview ) {

    // construct html for editor
    ?>
    <div class="<?php echo esc_attr($className); ?>">

      <?php
      echo '<div class="block-svg__wrap">';
        echo hum_svg_select();
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
    echo '<div class="block-svg__wrap">';
      echo hum_svg_select();
    echo '</div>';
    ?>

  </div>
  <?php
}
