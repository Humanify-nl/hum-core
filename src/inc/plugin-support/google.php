<?php
/**
 * Google id's & tracking codes
 *
 * @package hum-core
 */


// Uses JS script, find it in /assets/js/functions.js
function hum_google_map_api( $api ){

 $api['key'] = 'AIzaSyDHxw1MiB5EaMCBxAek-WorUrqSTsq5MPQ';
 return $api;

}
add_filter('acf/fields/google_map/api', 'hum_google_map_api');

/*
wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBpdCzkqTljPEYkH5kDBddAUgfAopFr3to', [], '3', true );
wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/assets/js/googlemaps-acf.js', ['google-map', 'jquery'], '0.1', true );
*/


/*
function hum_google_analytics() {

  ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151171509-1"></script>
 <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-151171509-1');
 </script>
 <?php

}
add_action('wp_head', 'hum_google_analytics');
*/
