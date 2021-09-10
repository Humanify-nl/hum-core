<?php
/**
 * Search form template
 *
 * @package hum-core
 */

$title = esc_html__('Search for', 'hum-core');
$placeholder = esc_html__('Search...', 'hum-core');
$submit = esc_html__('Submit', 'hum-core');
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label>
		<span class="screen-reader-text"><?php echo $title; ?></span>
		<input type="search" class="search-field" placeholder="<?php echo $placeholder; ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo $title; ?>" />
	</label>

	<button type="submit" class="search-submit"><?php echo hum_get_icon( array( 'icon' => 'search', 'title' => $submit ) );?></button>

</form>
