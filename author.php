<?php get_header(); ?>

<section id="main" class="clearfix">

    <div id="rightPad">
    			<!-- authors posts -->
    <?php if (have_posts()) : ?>
    	<div id="lastPosts" class="user-page-section">
    		<div id="last-posts-container" class="clearfix">
	            <h1 class="section-title entry-title home-page-title"><?php _e('User\'s latest posts','etuts'); ?></h1>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'single-homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php else :
        get_template_part('content', 'noresults');
    endif; ?>

    <?php 
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
        query_posts(array(
        'post_type'=>array('vmoh_user_stories'),
        'author' => $author->ID
        )); ?>

    <?php if (have_posts()) : ?>
        <div id="lastStories" class="user-page-section">
            <div id="last-stories-container" class="clearfix">
                <h1 class="section-title entry-title home-page-title"><?php _e('User Experiences','etuts'); ?></h1>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'story-homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php else :
        get_template_part('content', 'noresults');
    endif; ?>

    </div>
        
    <div id="leftPad">
        <div>
            <?php get_sidebar('user'); ?>
        </div>
    </div>

</section>
<?php get_footer(); ?>