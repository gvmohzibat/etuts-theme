<?php if (has_post_thumbnail()) { ?>
    <div class="post-list-item post-featured-image">
<?php the_post_thumbnail('medium'); ?>
    </div>
<?php } ?>
<?php if ( is_active_sidebar( 'sidebar_page' ) ) : ?>
	<ul id="big-page-sidebar">
			<?php dynamic_sidebar( 'sidebar_page' ); ?>
	</ul>
<?php endif; ?>