<?php
/**
 * The template for displaying comments
 * Current comments and comment form
 *
 * @package hum-core
 */

if ( post_password_required() ) {
	return;
}
?>

<?php tha_comments_before(); ?>
<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) {

		$hum_comment_count = get_comments_number();

		?>
		<h2 class="comments-title">

			<?php
			if ( '1' === $hum_comment_count ) {
				esc_html_e( '1 comment', 'hum-core' );
			} else {
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $hum_comment_count, 'Comments title', 'hum-core' ) ),
					esc_html( number_format_i18n( $hum_comment_count ) )
				);
			}
			?>

		</h2><!-- .comments-title -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hum-core' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'hum-core' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'hum-core' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php
		}
		?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hum-core' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'hum-core' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'hum-core' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php
		}
		?>

		<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hum-core' ); ?></p>
			<?php
		}

	} // endif

	comment_form();
	?>

</div><!-- #comments -->
<?php tha_comments_after(); ?>
