<?php get_header(); ?>
<section id="main" class="clearfix">

    <?php if (have_posts()) : ?>
        <div id="lastPosts" class="home-page-section">
            <div id="last-posts-container" class="clearfix">
                <?php the_archive_title('<h1 class="section-title entry-title home-page-title">','</h1>'); ?>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php else :
        get_template_part('content', 'noresults');
    endif; ?>

</section>
<?php get_footer(); ?>