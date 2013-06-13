<?php get_header(); ?>

<div class="archive-title">

<?php 
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<?php _e('<p>Archive for the &middot;</p>', 'life-is-simple'); ?><h1><?php single_cat_title(); ?></h1><?php _e('<p>&middot; Category...</p>', 'life-is-simple'); ?>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<?php _e('<p>Posts tagged &middot;</p>', 'life-is-simple'); ?><h1><?php single_tag_title(); ?></h1><p>&middot;...</p>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<?php _e('<p>Archive for </p>', 'life-is-simple'); ?><h1><?php the_time('F jS, Y'); ?></h1><p>...</p>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<?php _e('<p>Archive for </p>', 'life-is-simple'); ?><h1><?php the_time('F, Y'); ?></h1><p>...</p>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<?php _e('<p>Archive for </p>', 'life-is-simple'); ?><h1><?php the_time('Y'); ?></h1><p>...</p>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<?php _e('<p>Archive for the author &middot;</p>', 'life-is-simple'); ?><h1><?php echo $curauth->display_name; ?></h1><p>&middot;...</p>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<?php _e('<p>Blog archives...</p>', 'life-is-simple'); ?>
 	  <?php } ?>

</div><!-- #archive-title -->

<?php while (have_posts()) : the_post(); ?>

<div class="post-date">
<?php the_date(); ?> <?php the_time(); ?>
</div>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<div class="post-title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2><span class="comments-counter"> <?php comments_popup_link(__('no comments', 'life-is-simple'), __('1 comment', 'life-is-simple'), __('% comments', 'life-is-simple')); ?></span>
</div>

<div class="post-meta">
<?php _e('by', 'life-is-simple'); ?> <?php the_author_posts_link(); ?> &nbsp;&nbsp; <?php _e('in', 'life-is-simple'); ?> <?php the_category(',') ?> <?php edit_post_link(__('edit?', 'life-is-simple')); ?>
</div>

<div class="post-content">
<?php the_content(__('<em><strong>More:</strong> Read the rest of this entry...</em>', 'life-is-simple')); ?>
</div>

<?php wp_link_pages(); ?>

<?php the_tags(__('<div class="post-tags">tags: ', 'life-is-simple'), ', ', '</div>'); ?>

<div class="comments-counter2">
<?php comments_popup_link(__('No comment?', 'life-is-simple'), __('1 comment...', 'life-is-simple'), __('% comments!', 'life-is-simple')); ?>
</div>
</div><!-- #post-id -->

<div class="border">
</div>

<?php endwhile; ?>


<div class="page-nav">
<?php if(function_exists('wp_pagenavi')) { ?>
<?php wp_pagenavi(); ?>
<?php } else { ?>
<div class="newer"><?php previous_posts_link(__('&laquo; Newer Posts', 'life-is-simple')) ?></div>
<div class="older"><?php next_posts_link(__('Older Posts &raquo;', 'life-is-simple')) ?></div>
<?php } ?>
</div>


	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<div class='post-content'><p><em><strong>Not Found:</strong> Sorry, but there aren't any posts in the &middot;<strong>%s</strong>&middot; category yet.</em></p></div>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<div class='post-content'><p><em><strong>Not Found:</strong> Sorry, but there aren't any posts with this date.</em></p></div>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<div class='post-content'><p><em><strong>Not Found:</strong> Sorry, but there aren't any posts by &middot;<strong>%s</strong>&middot; yet.</em></p></div>", $userdata->display_name);
		} else {
			echo("<div class='post-content'><p><em>No posts found.</em></p></div>");
		}

	endif; ?>

</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
