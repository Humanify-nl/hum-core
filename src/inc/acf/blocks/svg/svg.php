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

  $absolute_shape = get_field( 'svg_shape_absolute' );
  if ( $absolute_shape ) {
    $className .= ' is-absolute';
  }


  $selected_icon = get_field( 'select_svg_icon' );
  $selected_shape = get_field( 'select_svg_shape' );
  $svg_switch_shape = get_field( 'select_svg_type' );

  if ( $svg_switch_shape ) {
    $svg_render = hum_get_shape( [ 'name' => $selected_shape, 'class' => $selected_shape ] );
  } else {
    $svg_render = hum_get_icon( [ 'icon' => $selected_icon, 'group' => 'bs', 'size' => 32, 'class' => $selected_icon ] );
  }


  if ( $is_preview ) {

    // construct html for editor
    ?>
    <div class="<?php echo esc_attr($className); ?>">

      <?php
      if ( $svg_render ) {
        echo '<div class="block-svg__wrap">';
          echo $svg_render;
        echo '</div>';
      } else {
        echo '<p><small>No SVG selected</small></p>';
      }
      ?>

    </div>
    <?php
    return;
  }
  // Front-end output
  ?>
  <div class="<?php echo esc_attr($className); ?>">

    <?php
    if ( $svg_switch_shape ) {
      $svg_return = hum_get_shape( [ 'name' => $selected_shape, 'class' => $selected_shape ] );
    } else {
      $svg_return = hum_get_icon( [ 'icon' => $selected_icon, 'group' => 'bs', 'size' => 32, 'class' => $selected_icon ] );
    }
    if ( $svg_render ) {
      echo '<div class="block-svg__wrap">';
        echo $svg_render;
      echo '</div>';
    }
    ?>

  </div>
  <?php
}


function hum_init_svg_block() {

  acf_register_block_type(
    register_svg_block()
  );

}
add_action( 'acf/init', 'hum_init_svg_block' );
