<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php return;
		}
	}
	$oddcomment = 'class="alt" '; // alternating comments
?>

<?php if ($comments) : // there are comments ?>

		<section>
			<h3><?php comments_number('No Responses', 'One Response', '% Responses' ); ?> to &ldquo;<?php the_title(); ?>&rdquo;</h3>

			<?php foreach ($comments as $comment) : ?>

			<article <?php echo $oddcomment; ?>id="comment-<?php comment_ID(); ?>">
				<header>
					<h4><?php echo get_avatar( $comment, 32 ); ?> <cite class="commentCite"><?php comment_author_link(); ?></cite> <a href="#comment-<?php comment_ID(); ?>" title="Permalink for this comment"><?php comment_date('F jS, Y'); ?> at <?php comment_time(); ?></a> <?php edit_comment_link('Edit',' &bull; ',''); ?></h4>
					<?php if ($comment->comment_approved == '0') : ?>
						<p>Your comment is awaiting moderation.</p>
					<?php endif; ?>
				</header>
				<section>
					<?php comment_text(); ?>
				</section>
			</article>

			<?php $oddcomment = (empty($oddcomment)) ? 'class="alt" ' : ''; // alternating comments ?>
			<?php endforeach; ?>

		</section>

<?php else : // no comments yet ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- [comments are open, but there are no comments] -->

	 <?php else : ?>
		<!-- [comments are closed, and no comments] -->
		<p>Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

		<section>
			<h3>Leave a Response</h3>

			<?php if (get_option('comment_registration') && !$user_ID) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

				<?php if ($user_ID) : ?>
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
				<?php else : ?>

				<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="55" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
				
				<label for="email">Email (will not be published) <?php if ($req) echo "(required)"; ?></label>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="55" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
				
				<label for="url">Website</label>
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="55" tabindex="3">

				<?php endif; ?>

				<!-- p>Allowed <abbr title="HyperText Markup Language">HTML:</abbr> tags: <code><?php echo allowed_tags(); ?></code></p -->
				<label for="comment">Comment</label>
				<textarea name="comment" id="comment" cols="55" rows="10" tabindex="4"></textarea>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment">
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
				<?php do_action('comment_form', $post->ID); ?>

			</form>
			<?php endif; ?>
			<div class="clear"></div>
		</section>
<?php endif; ?>