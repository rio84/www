<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<div class="post-title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
</div>

<div class="post-meta">
<?php edit_post_link(__('edit?', 'life-is-simple')); ?>
</div>

<div class="post-content">
<?php the_content(__('<em><strong>More:</strong> Read the rest of this entry...</em>', 'life-is-simple')); ?>
</div>
</div><!-- #post-id -->

<?php comments_template(); ?>

</div><!-- #content -->

<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
