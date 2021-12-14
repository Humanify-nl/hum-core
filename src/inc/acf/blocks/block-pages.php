<?php
function register_pages_block() {

  $register_pages_block = [
    'name'              => 'pages',
    'title'             => __('Pages'),
    'description'       => __('A pages block to display children or siblings.'),
    'render_callback'   => 'hum_render_pages_block',
    'category'          => 'formatting',
    'icon'              => 'screenoptions',
    'keywords'          => [ 'pages', 'related' ],
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

  ];

  return $register_pages_block;
}


function hum_render_pages_block( $block, $content = '', $is_preview = false ) {

  // Variables
  $className = 'wp-block acf-block pages';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  ?>
  <div class="<?php echo esc_attr($className); ?>">
    <?php
    get_template_part( 'template-parts/acf/pages/pages' , '', [ 'is_related' => false ]);
    ?>
  </div>
  <?php
}


// render this block outside editor

function hum_pages_related() {
  // Variables
  $className = 'pages-related vs-mt-lg vs-mb-lg';

  ?>
  <section class="<?php echo esc_attr($className); ?>">
    <div class="wrap">
      <?php
      $section_title = get_field( 'page-siblings-title' , 'option');
      if ( $section_title ) { echo '<h2 class="section-title vs-mb-md">' .$section_title. '</h2>'; }
      get_template_part( 'template-parts/acf/pages/pages', '', [ 'is_related' => true ] );
      ?>
    </div>
  </section>
  <?php
}
