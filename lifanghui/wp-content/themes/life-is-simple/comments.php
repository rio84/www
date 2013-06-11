<?php if ( post_password_required() ) : // IF the post is password protected ?>
<p><?php _e('<em><strong>Warning:</strong> This post is password protected. Enter the password to view comments.</em>', 'life-is-simple'); ?></p>
<?php return; endif; ?>


<div id="comments">

<?php if ( have_comments() ) : // IF there are posted comments ?>

<div class="comments-title">
<?php comments_number(__('No Responses', 'life-is-simple'), __('1 Response', 'life-is-simple'), __('% Responses', 'life-is-simple') ); ?> <?php _e('to', 'life-is-simple'); ?> "<?php the_title(); ?>".<?php if ( comments_open() ) : ?> <a href="#respond"><?php _e('Add a comment?', 'life-is-simple'); ?></a> <?php _e('or', 'life-is-simple'); ?> <?php post_comments_feed_link(__('Follow comments by RSS', 'life-is-simple')); ?>?<?php endif; ?>	
</div>

<?php foreach ($comments as $comment) : ?>
<div class="comment" id="comment-<?php comment_ID(); ?>">
<p class="comment-avatar"><?php echo get_avatar($comment,'32','' ); ?></p>
<p class="comment-meta"><span class="comment-number"><a href="#comment-<?php comment_ID() ?>"><?php $commentNumber++; echo $commentNumber; ?>.</a></span>
<?php comment_type(__('Comment', 'life-is-simple'), __('Trackback', 'life-is-simple'), __('Pingback', 'life-is-simple')); ?> <?php _e('by', 'life-is-simple'); ?> <strong><?php comment_author_link(); ?></strong></p>
<p class="comment-date"><?php comment_date('j/M/Y') ?> <?php _e('at', 'life-is-simple'); ?> <?php comment_time() ?> <?php edit_comment_link(__('edit?', 'life-is-simple'), ' &nbsp;&nbsp; '); ?></p>
<?php if ($comment->comment_approved == '0') : ?>
<p><?php _e('<em><strong>Note:</strong> Your comment is awaiting moderation and eventually will be available later. Thanks for the patience!</em>', 'life-is-simple'); ?></p>
<?php endif; ?>
<?php comment_text() ?>
</div>
<?php endforeach; ?>

<?php else : // IF there are no comments yet ?>

<?php if ( comments_open() ) : // IF comments are open (not closed) ?>
<div class="comments-title">
<?php comments_number(__('No Responses', 'life-is-simple'), __('1 Response', 'life-is-simple'), __('% Responses', 'life-is-simple') ); ?> <?php _e('to', 'life-is-simple'); ?> "<?php the_title(); ?>". <a href="#respond"><?php _e('Add a comment?', 'life-is-simple'); ?></a> <?php _e('or', 'life-is-simple'); ?> <?php post_comments_feed_link(__('Follow comments by RSS', 'life-is-simple')); ?>?
</div>
<div class="comment"><?php _e('Be the first and share your thoughts!', 'life-is-simple'); ?></div>
<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : // IF comments are open ?>

<div id="respond" class="comment-form">
<p align="center" class="comments-title"><?php _e('Please leave a comment...', 'life-is-simple'); ?></p>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('<em><strong>Note:</strong> You must be <a href="%s">logged in</a> to post a comment.</em>', 'life-is-simple'), wp_login_url( get_permalink() ) );?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('<em><strong>Note:</strong> You must be <a href="<?php echo get_option(\'siteurl\'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</em>', 'life-is-simple'); ?></p>
<?php else : ?>
<table border="0" cellspacing="0" cellpadding="13">
<tr>
<td width="270" align="right" valign="top">
<?php if ( $user_ID ) : ?>
<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>...', 'life-is-simple'), get_option('siteurl').'/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('log out of this account', 'life-is-simple'); ?>"><?php _e('Logout?', 'life-is-simple'); ?></a></p>
<p><?php _e('You can use these tags:', 'life-is-simple'); ?> <br>&lt;b&gt;, &lt;em&gt;, &lt;a href=""&gt;, &lt;img src=""&gt;,<br>&lt;blockquote cite=""&gt;, &lt;code&gt;.</p>
<?php do_action('comment_form', $post->ID); ?>
<?php else : ?>
<div class="notice"><?php _e('Stay behind your words, use your real name or nickname.', 'life-is-simple'); ?></div>
<p>
<label for="comment-name" title="<?php _e('your real name or nickname', 'life-is-simple'); ?>"><?php _e('name', 'life-is-simple'); ?></label> &raquo; <input id="comment-name" value="<?php echo $comment_author; ?>" name="author" type="text" class="field" maxlength="35" tabindex="1" />
</p>
<p>
<label for="comment-email" title="<?php _e('your e-mail address is confidential information and WON\'T be shared or published!', 'life-is-simple'); ?>"><?php _e('e-mail', 'life-is-simple'); ?></label> &raquo; 
<input id="comment-email" name="email" value="<?php echo $comment_author_email; ?>" type="text" class="field" maxlength="45" tabindex="2" />
</p>
<p>
<label for="comment-site" title="<?php _e('your web site', 'life-is-simple'); ?>"><?php _e('site', 'life-is-simple'); ?></label> &raquo; 
<input id="comment-site" name="url" value="<?php echo $comment_author_url; ?>" type="text" class="field" maxlength="70" tabindex="3" />
</p>
<?php do_action('comment_form', $post->ID); ?>
<?php endif; ?>
</td>
<td width="330" align="left" valign="top">
<div class="notice"><?php _e('Please be nice and tolerant, don\'t offend. Thanks!' , 'life-is-simple'); ?></div>
<p><textarea name="comment" rows="4" cols="1" tabindex="4"></textarea></p>
<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php _e('Write here, right now', 'life-is-simple'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />			
</td>
</tr>
</table>
<?php endif; ?>
</form>
<?php endif; // IF registration required and not logged in ?>

</div>

<?php else : // IF Comments are closed ?>
<?php if ( !is_page() || (is_page()&&have_comments()) ) { // IF not page, OR IF page with already posted comments ?>
<p><?php _e('<p align="center" class="comments-title">Comments are closed now!</p>', 'life-is-simple'); ?></p>
<?php } ?>
<?php endif; ?>


</div><!-- #comments -->
