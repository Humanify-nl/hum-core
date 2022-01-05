<?php
/**
 * Related pages section
 *
 * @package hum-core
 */


function hum_pages_related() {

  global $post;
  $parent_id = $post->post_parent;

  // skip pages that have no 'real' parent
  if ( $parent_id != 0 ) {

    $selected_pages = get_pages( [
      'child_of' => $parent_id,
      'exclude' => [ get_the_id() ],
      'sort_column' => 'menu_order',
    ] );
  }


  if ( !empty( $selected_pages ) ) {

    ?>
    <section class="<?php echo esc_attr( 'related related-pages' ); ?>">

      <div class="wrap">

        <?php
        $section_title = get_field( 'page_siblings_title', 'option');
        $preview_type = get_field( 'preview_type_page', 'option' ) ?: 'preview-list';

        if ( $section_title ) { echo '<h2 class="section-title">' .$section_title. '</h2>'; }
        ?>

        <div class="<?php echo hum_grid_class_preview( 'has-'.$preview_type );?>">

          <?php
          foreach ( $selected_pages as $post ) {

            setup_postdata( $post );
            include( locate_template( 'template-parts/previews/'.$preview_type.'.php' ) );
          }

          wp_reset_postdata();
          ?>

        </div>
      </div>
    </section>
    <?php
  }
}
