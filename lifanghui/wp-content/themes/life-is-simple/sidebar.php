<div id="sidebar-wrapper">

<div id="menu">
<ul>
<li><a href="<?php bloginfo('url'); ?>/"><?php _e('Home', 'life-is-simple');?></a></li> <?php wp_list_pages('title_li=&sort_column=ID' ); ?> <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><?php _e('RSS Feed', 'life-is-simple');?></a></li>
</ul>
</div>

<div id="sidebar">
<ul>

<?php
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>

<li><?php _e('<span class="widget-title">Meta</span>', 'life-is-simple'); ?>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS', 'life-is-simple'); ?>"><?php _e('RSS Feed', 'life-is-simple'); ?></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS', 'life-is-simple'); ?>"><?php _e('Comments RSS', 'life-is-simple'); ?></a></li>
<?php wp_meta(); ?>
</ul>
</li>

</ul>
</div>

</div><!-- #sidebar-wrapper -->