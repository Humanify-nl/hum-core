<?php
/**
 * The header for our theme
 * <head> section and everything up until content
 *
 * @package hum-core
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

	<?php tha_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	get_template_part( 'template-parts-old/site/site', 'header' );
	tha_header_after();
	?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
