<?php
function register_icon_wrap_block() {

  $register_icon_wrap = [
    'name'              => 'icon-wrap',
    'title'             => __('Icon wrap'),
    'description'       => __('Add an icon that stays left of any new blocks you add.'),
    'render_callback'   => 'hum_render_icon_wrap_block',
    'category'          => 'media',
    'icon'              => 'excerpt-view',
    'keywords'          => [ 'icon', 'svg' ],
    'align'             => 'left',
    'align_text'        => 'left',
    'mode'              => 'preview',
    'supports'          => [
      'align'             => false,
      'align_text'        => false,
      'align_content'     => false,
      'mode'              => true,
      'multiple'          => true,
      'customClassName'	  => true,
      'jsx' 			        => true,
    ],

  ];

  return $register_icon_wrap;
}


function hum_render_icon_wrap_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'acf-block block-icon-wrap';

  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }

  if( !empty($block['align_text']) ) {
      $className .= ' align' . $block['align_text'];
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

    $allowed_blocks = [ 'core/heading', 'core/paragraph', 'core/buttons', 'core/button' ];
    echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />';
    ?>

  </div>
  <?php
}
