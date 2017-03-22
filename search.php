<?php get_header(); ?>

<?php
	global $wp_query;
	$total_results = $wp_query->found_posts;
?>

<section id="main" class="clearfix">
    <div id="lastPosts" class="home-page-section">
        <div id="last-posts-container" class="clearfix">
        <?php if (have_posts()) : ?>
	        <h1 class="section-title entry-title home-page-title"><?php echo $total_results . __(' Search results for ','etuts') . get_search_query(); ?></h1>
            <?php while (have_posts()) : the_post();
                get_template_part('content', 'single-homepage');
            endwhile; ?>
        <?php else : ?>
            <h1 class="section-title entry-title home-page-title"><?php _e('No search results','etuts'); ?></h1>
        <?php endif; ?> 
        </div>
    </div>
</section>
<?php get_footer(); ?>