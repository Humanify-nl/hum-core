<?php
/**
 * Footer - functions
 *
 * @package hum-core
 */


/**
 * Footer buttom
 *
 */
function hum_site_footer() {
	echo '<div class="footer-bottom">';
		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '®. All Rights Reserved.</p>';
		echo '<p class="footer-links"><a href="' . home_url( 'privacy' ) . '">Privacy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></p>';
		echo '<a class="backtotop" href="#main-content">' . hum_get_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
	echo '</div>';
}
add_action( 'tha_footer_bottom', 'hum_site_footer' );


/**
 * Register footer widget areas
 *
 */
function hum_register_footer_widget_areas() {

	register_sidebar(
		hum_widget_area_args(
			[
				'name' => esc_html__( 'Footer', 'hum-core' ),
			]
		)
	);

}
add_action( 'widgets_init', 'hum_register_footer_widget_areas' );


/**
 * Footer widget areas
 *
 */
function hum_site_footer_widgets() {

	echo '<div class="footer-widgets">';
   	dynamic_sidebar( 'footer' );
	echo '</div>';
}
add_action( 'tha_footer_top', 'hum_site_footer_widgets' );

/**
 * Footer widget areas multi
 *
 */

function hum_site_footer_widgets_dynamic() {

	echo '<div class="footer-widgets">';
		for( $i = 1; $i < 4; $i++ ) {
			dynamic_sidebar( 'footer-' . $i );
		}
	echo '</div>';
}
//add_action( 'tha_footer_before', 'hum_site_footer_widgets' );


/**
 * Register footer widget areas
 *
 */
function hum_register_footer_widget_areas_dynamic() {

	for( $i = 1; $i < 4; $i++ ) {

		register_sidebar( hum_widget_area_args( array(
			'name' => esc_html__( 'Footer ' . $i, 'hum-core' ),
		) ) );
	}

}
//add_action( 'widgets_init', 'hum_register_footer_widget_areas_dynamic' );
