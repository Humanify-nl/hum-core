<?php
/**
 * The header for our theme
 * <head> section and everything up until content
 *
 * @package hum-core
 */
?>
<!doctype html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
	<?php tha_head_top(); ?>
	<?php wp_head(); ?>
  <?php tha_head_bottom(); ?>
</head>

<body <?php body_class();?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
?>

<div class="site-container">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hum-core' ); ?></a>

	<?php
	tha_header_before();
	get_template_part( 'template-parts/site/site', 'header' );
	tha_header_after();
	?>

	<div class="site-content" id="content" >
