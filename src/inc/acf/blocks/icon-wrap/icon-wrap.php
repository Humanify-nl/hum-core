<?php
function register_icon_wrap_block() {

  $register_icon_wrap = [
    'name'              => 'icon-wrap',
    'title'             => __('Icon wrap'),
    'description'       => __('Add an icon that stays left of any new blocks you add.'),
    'render_callback'   => 'hum_render_icon_wrap_block',
    'category'          => 'design',
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
    get_template_part( 'inc/acf/blocks/icon-wrap/icon-wrap-template' );
    ?>

  </div>
  <?php
}


function hum_init_icon_wrap_block() {

  acf_register_block_type(
    register_icon_wrap_block()
  );

}
add_action( 'acf/init', 'hum_init_icon_wrap_block' );
