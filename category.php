<?php get_header(); ?>

<?php
    $category = $wp_query->get_queried_object()
?>
<section id="main" class="clearfix">
    <?php if (have_posts()) : ?>
        <div id="lastPosts" class="home-page-section">
            <div id="last-posts-container" class="clearfix">
                <div class="home-page-title">

                    <h1 class="category-page-title"><?php single_cat_title(); ?></h1>
                    <?php if (category_description()) { ?>
                        <p class="category-page-descrption"><?php echo $category->description; ?></p>
                    <?php } ?>
                </div>

                <?php while (have_posts()) : the_post();
                    get_template_part('includes/contents/content', 'single-homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php else :
        get_template_part('includes/contents/content', 'noresults');
    endif; 
    
    ?>
</section>
<?php get_footer(); ?>