<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) { ?>
	<div id="comments-section" class="<?php if (get_comments_number()) echo 'has-comments'; ?> clearfix">
		<h1 class="section-title comment-section-title"><a href="<?php echo get_the_permalink() . 'feed'; ?>" title="<?php _e('Notify of latest comments in this post','etuts'); ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a> <?php _e('Comments','etuts') ?></h1>
    	<?php comments_template(); ?>
    </div>
<?php } ?>
