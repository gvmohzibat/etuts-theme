<?php global $theme; get_header(); ?>

<section id="main" class="clearfix">
    <?php if (have_posts()) : ?>
    	<div id="lastPosts" class="home-page-section">
    		<div id="last-posts-container" class="clearfix">
	            <h1 class="section-title entry-title home-page-title"><?php _e('Latest Posts','etuts'); ?></h1>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'single-homepage');
                endwhile; ?>
            </div>
            <?php pagination_bar(); ?>
        </div>
    <?php else :
        get_template_part('content', 'noresults');
    endif; ?>
</section>
<?php get_footer(); ?>