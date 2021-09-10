<?php
/**
 * The template for displaying image attachments
 *
 * @package hum-core
 */

get_header();
?>

<?php
while ( have_posts() ) {
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header alignwide">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<figure class="wp-block-image">
				<?php
				/**
				 * Filter the default image attachment size.
				 *
				 * @param string $image_size Image size. Default 'full'.
				 */
				$image_size = apply_filters( 'hum_base_attachment_size', 'full' );
				echo wp_get_attachment_image( get_the_ID(), $image_size );

				if ( wp_get_attachment_caption() ) {
					?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption() ); ?></figcaption>
					<?php
				}
				?>
			</figure><!-- .wp-block-image -->

			<?php
			the_content();

			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'hum-core' ) . '">',
					'after'    => '</nav>',
					/* translators: %: Page number. */
					'pagelink' => esc_html__( 'Page %', 'hum-core' ),
				)
			);
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer default-max-width">

			<?php
			// Check if there is a parent, then add the published in link.
			if ( wp_get_post_parent_id( $post ) ) {
				echo '<span class="posted-on">';
				printf(
					/* translators: %s: Parent post. */
					esc_html__( 'Published in %s', 'hum-core' ),
					'<a href="' . esc_url( get_the_permalink( wp_get_post_parent_id( $post ) ) ) . '">' . esc_html( get_the_title( wp_get_post_parent_id( $post ) ) ) . '</a>'
				);
				echo '</span>';
			} else {
				// Edit post link.
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						esc_html__( 'Edit %s', 'hum-core' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span>'
				);
			}

			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();
			if ( $metadata ) {
				printf(
					'<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
					esc_html_x( 'Full size', 'Used before full size attachment link.', 'hum-core' ), // phpcs:ignore WordPress.Security.EscapeOutput
					esc_url( wp_get_attachment_url() ),
					absint( $metadata['width'] ),
					absint( $metadata['height'] )
				);
			}

			if ( wp_get_post_parent_id( $post ) ) {
				// Edit post link.
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						esc_html__( 'Edit %s', 'hum-core' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					),
					'<span class="edit-link">',
					'</span><br>'
				);
			}
			?>
		</footer><!-- .entry-footer -->

	</article><!-- #post-<?php the_ID(); ?> -->
	<?php

} // End the loop.
?>

<div class="wp-block-gallery attachment-gallery">

	<?php
	// https://wpsmackdown.com/wordpress-display-all-images-attached-to-post-page/
	// https://developer.wordpress.org/reference/functions/get_attached_media/
	$images = get_attached_media('image', $post->ID);

	foreach ( $images as $image ) {

		$ximage = wp_get_attachment_image_src($image->ID,'medium');
		$xurl = wp_get_attachment_url($image->ID);

		echo '<div class="blocks-gallery-image"><a href="' .$xurl[0] . '"><img src="' .$ximage[0] . '" /></a></div';
	}
	?>

</div>


<?php
get_footer();
