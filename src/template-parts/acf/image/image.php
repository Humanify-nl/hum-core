<?php
/**
 * Image block
 *
 * @package hum-core
 */

$image = get_field( 'image_array' );

// img controls
$image_on_click = get_field( 'image_on_click' ); // select: nothing, zoom, link
$image_link = get_field( 'image_link_url' ); // if link
$image_cover = get_field( 'image_fit' ); // off=contain, on=cover
$image_size = get_field( 'image_size_select' );


if ( !empty( $image ) ) {

  // vars
  $img_url = $image['url'];
  $img_id = $image['id'];
  $img_alt = $image['alt'];
  $img_caption = $image['caption'];
  $img_cover = $image_cover ? ' fit-cover' : '';

  $class_arr = [
    'class' => 'attachment-'. $image_size . ' size-' . $image_size . $img_cover,
    'alt' => $img_alt,
  ];

  $get_img = wp_get_attachment_image( $img_id, $image_size, '', $class_arr );


  if ( isset($image_on_click) ) {

    switch ( $image_on_click ) {

      case 'link':
        echo '<a href="'.$image_link.'">' . $get_img . '</a>';
        break;
      case 'zoom':
        echo '<a href="'.$img_url.'">' . $get_img . '</a>';
        break;

      default:
        echo $get_img;
    }

  } else {
    echo $get_img;
  }


  if ( $img_caption ) {
    echo '<figcaption>' . $img_caption . '</figcaption>';
  }
}
