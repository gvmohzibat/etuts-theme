<?php get_header(); ?>
<section id="main" class="clearfix">

    <?php while ( have_posts() ) : the_post(); ?>
                
    <div id="rightPad">
        <?php if ( is_singular( 'vmoh_user_stories' ) ) { ?>
            <?php get_template_part( 'content', 'story' ); ?>
        <?php } else { ?>
            <?php get_template_part( 'content', 'single' ); ?>
        <?php } ?>
    </div>
        
    <?php get_template_part('page','leftPad'); ?>

    <div class="clearfix"></div>

    <?php get_template_part( 'content', 'comments' ); ?>

    <?php endwhile; ?>

</section>
<?php setPostViews(get_the_ID()); ?>
<?php get_footer(); ?>