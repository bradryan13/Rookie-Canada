<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package d1atv
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

	<?php comment_form(
	array(
		'comment_notes_after' => '',
		'title_reply' 	=> '',
		'comment_field' => '<textarea placeholder="Leave a comment..." id="comment" name="comment" rows="1" aria-required="true"></textarea>',
		'must_log_in' => 'You must <a href="#login" class="modal" data-reveal-id="login-register">Login</a> to comment.',
		)
	); ?>

	<?php if ( have_comments() ) : ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'login_text' => 'reply',
					'callback' =>   'base_comment',
					'avatar_size'       => 50
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'd1atv' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'd1atv' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'd1atv' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'd1atv' ); ?></p>
	<?php endif; ?>


</div><!-- #comments -->
