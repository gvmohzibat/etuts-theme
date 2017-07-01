<?php get_header(); ?>
<section id="main" class="clearfix">

    <?php while ( have_posts() ) : the_post(); ?>

    <div id="rightPad">
        <?php if ( is_bbpress() ) : ?>
            <?php get_template_part( 'content', 'bbpress' ); ?>
        <?php else : ?>
            <?php get_template_part( 'content', 'page' ); ?>
        <?php endif; ?>
    </div>
        
    <?php get_template_part('page','leftPad'); ?>

    <div class="clearfix"></div>

    <?php if (is_page()) { ?>
    <?php get_template_part( 'content', 'comments' ); ?>
    <?php } ?>

    <?php endwhile; ?>

</section>
<?php get_footer(); ?>