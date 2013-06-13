<?php get_header(); ?>

<div class="post-title">
<?php _e('<h1>Error 404</h1>', 'life-is-simple'); ?>
</div>

<div class="post-content">
<?php _e('<p><em><strong>Error 404:</strong> Not Found!<br>Sorry, but the page you were looking for does not exist. Check the address for typing errors. You can also start with the', 'life-is-simple'); ?> <a href="<?php bloginfo("url"); ?>/"><?php _e('homepage', 'life-is-simple'); ?></a> <?php _e('or browse the menu in right.</em></p>', 'life-is-simple'); ?>
</div>

</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>