<?php
/**
 * The template for footer
 * Contains the closing of the #content div and all content after inc wp_footer
 *
 * @package hum-core
 */
?>

	</div><!-- .site-content -->

	<?php tha_footer_before(); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
	  tha_footer_top();

		get_template_part( 'template-parts/footer' );

		tha_footer_bottom();
		?>

	</footer><!-- #colophon -->
	<?php tha_footer_after(); ?>

</div><!-- #page -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
