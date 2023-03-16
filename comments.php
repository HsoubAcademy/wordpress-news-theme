<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News-Hsoub
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback' => 'better_comments'
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'news-hsoub' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	$args = array(
		'comment_field' => '<p class="comment-form-comment">' .
			'<textarea name="comment" id="comment" class="comment-textarea mt-5" placeholder="اكتب تعليقًا هنا ..." rows="3" style="padding:10px;"></textarea>' .
			'<div class="error-message" style="display:none; color:red">الرجاء كتابة تعليق لنشره</div>' .
		'</p>',
		'title_reply' => '',
		'label_submit' => 'نشر',
	);

	comment_form($args);
	?>

</div><!-- #comments -->
