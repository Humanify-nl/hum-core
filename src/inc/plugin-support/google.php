<?php
/**
 * Google id's & tracking codes
 *
 * @package hum-core
 */


// Uses JS script, find it in /assets/js/functions.js
function hum_google_map_api( $api ){

 $api['key'] = '';
 return $api;

}
add_filter('acf/fields/google_map/api', 'hum_google_map_api');



/*
function hum_google_analytics() {

  ?>
  // google code here
  <?php

}
add_action('wp_head', 'hum_google_analytics');
*/
