<?php
/**
 * Admin columns for pages
 *
 * @package hum-core
 */


/**
 * Add columns for page
 *
 */
function hum_page_columns( $defaults ) {

   $defaults['page-templates'] = __('Template');
   return $defaults;

}
add_filter( 'manage_pages_columns', 'hum_page_columns' );


/**
 * Manage columns array for post
 *
 */
function hum_manage_page_columns( $columns ) {

  $columns = array(
    'cb'                   => '<input type="checkbox" />',
    'title'                => 'Title',
    'page-templates'       => 'Template',
    'author'               => 'Author',
    'date'                 => 'Date',
  );
  return $columns;
}
add_filter('manage_pages_columns' , 'hum_manage_page_columns');


/**
 * Get template names and add them to the new column
 *
 */
function hum_page_column_add_templates( $column_name, $id ) {

   if ( $column_name === 'page-templates' ) {

     // get the template
     $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );

     // if default is set, display it
     if ( $set_template == 'default' ) {
         echo 'Default';
     } else {

       // get and sort templates
       $templates = get_page_templates();
       ksort( $templates );

       // echo the template name
       foreach ( array_keys( $templates ) as $template ) {
         if ( $set_template == $templates[$template] ) echo $template;
       }
     }
   }
}
add_action( 'manage_pages_custom_column', 'hum_page_column_add_templates', 5, 2 );
