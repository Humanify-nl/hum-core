<?php
/**
 * Layout (sidebars)
 *
 * @package hum-core
 */

 /**
  * Wrap content (when no flex rows)
  *
  */
 function hum_enable_wrap() {
   return true;
 }


/**
 * Layout Options
 *
 */
function hum_page_layout_options() {

  $layouts = [
    'content-center',
    'content-sidebar',
    'content-wide',
  ];
  return $layouts;
}


/**
* Layout Body Class
*
*/
function hum_layout_body_class( $classes ) {
	$classes[] = hum_page_layout();
	return $classes;
}
add_filter( 'body_class', 'hum_layout_body_class', 5 );


/**
 * Layout Metabox (ACF)
 *
 */
function hum_page_layout_metabox() {

	if( ! function_exists('acf_add_local_field_group') )
		return;

	$choices = [];
	$layouts = hum_page_layout_options();
  $default = 'content-wide';
	foreach( $layouts as $layout ) {
		$label = str_replace( '-', ' ', $layout );
		$choices[ $layout ] = ucwords( $label );
	}

	acf_add_local_field_group(array(
		'key' => 'group_5dd714b369526',
		'title' => 'Page Layout',
		'fields' => array(
			array(
				'key' => 'field_5dd715a02eaf0',
				'label' => 'Page Layout',
				'name' => 'hum_page_layout',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => $choices,
				'default_value' => array(
          $default,
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}
add_action( 'acf/init', 'hum_page_layout_metabox' );


/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function hum_widgets_init() {

	register_sidebar( hum_widget_area_args( array(
		'name' => esc_html__( 'Primary Sidebar', 'hum-core' ),
	) ) );

}
add_action( 'widgets_init', 'hum_widgets_init' );


/**
 * Default Widget Area Arguments
 *
 * @param array $args
 * @return array $args
 */
function hum_widget_area_args( $args = array() ) {

	$defaults = [
		'name'          => '',
		'id'            => '',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	];
	$args = wp_parse_args( $args, $defaults );

	if( !empty( $args['name'] ) && empty( $args['id'] ) )
		$args['id'] = sanitize_title_with_dashes( $args['name'] );

	return $args;

}


/**
 * Page Layout
 *
 */
function hum_page_layout( $id = false ) {

	$available_layouts = hum_page_layout_options();
  $layout = 'content-wide';

	if( is_singular() || $id ) {

		$id = $id ? intval( $id ) : get_the_ID();

    // check if page layout is set;
		$selected = get_post_meta( $id, 'hum_page_layout', true );
		if( !empty( $selected ) && in_array( $selected, $available_layouts ) ) {
      $layout = $selected;
    }
	}

	$layout = apply_filters( 'hum_page_layout', $layout );
	//$layout = in_array( $layout, $available_layouts ) ? $layout : $available_layouts[0];

	return sanitize_title_with_dashes( $layout );
}


/**
 * Return Content
 *
 * used in 'hum_page_layout' filter (in templates before loading index.php)
 * i.e. add_filter( 'hum_page_layout', 'hum_return_content_wide' )
 */
function hum_return_content_center() {
  return 'content-center';
}
function hum_return_content_wide() {
	return 'content-wide';
}
function hum_return_content_sidebar() {
	return 'content-sidebar';
}
