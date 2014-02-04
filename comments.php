<?php if ( have_comments() ) : ?>
	<p id="comments" class="blog-post-meta"><?php	printf( _n( 'One Brilliant Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ),
									number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;' ); ?></p>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
		<ol class="commentlist">
			<?php wp_list_comments( 'callback=bootstrap_blog_comment' );?>
		</ol>


	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

<h3><?php comment_form_title( __('Leave a Reply'), __('Leave a Reply to %s' ) ); ?></h3>

<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo site_url(); ?>/wp-comments-post.php" method="post" id="commentform" role="form">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a></p>

<?php else : ?>

<div class="form-group">
	<small><label for="author"><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></label></small>
	<input class="form-control" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true' required"; ?> />
</div>

<div class="form-group">
	<label for="email"><small><?php _e('Mail (will not be published)'); ?> <?php if ($req) _e('(required)'); ?></small></label>
	<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" class="form-control" <?php if ($req) echo "aria-required='true' required"; ?> />
</div>

<div class="form-group">
	<label for="url"><small><?php _e('Website'); ?></small></label>
	<input type="text" name="url" id="url" value="<?php echo  esc_attr($comment_author_url); ?>" size="22" tabindex="3" class="form-control" />
</div>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>'), allowed_tags()); ?></small></p>-->

<div class="form-group">
	<label for="comment"><small><?php _e('Comment'); ?></small></label>
	<textarea name="comment" id="comment" class="form-control" cols="58" rows="10" tabindex="4"></textarea>
</div>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" class="btn btn-default" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>