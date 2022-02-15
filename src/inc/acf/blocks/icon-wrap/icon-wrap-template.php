<?php
/**
 * Icon-wrap template
 *
 * @package hum-core
 */

$icon_selected = get_field( 'select_svg_icon' );

if ( $icon_selected ) {

  echo '<div class="block-icon-wrap__svg">';

  if ( !empty( $icon_selected ) ) {
    echo hum_get_icon( [ 'icon' => $icon_selected, 'group' => 'bs', 'size' => 32, 'class' => $icon_selected ] );
  }

  echo '</div>';

  $allowed_blocks = [
    'core/heading',
    'core/paragraph',
    'core/buttons',
    'core/button'
  ];

  echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />';

}
