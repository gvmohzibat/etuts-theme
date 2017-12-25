<div id="leftPad">
    <div>

        <?php if ( is_bbpress() ) : ?>
            <?php get_template_part('includes/sidebars/sidebar', 'bbpress'); ?>
        <?php elseif ( is_single() ) : ?>
            <?php get_template_part('includes/sidebars/sidebar', 'single'); ?>
        <?php else : ?>
            <?php get_template_part('includes/sidebars/sidebar', 'page'); ?>
        <?php endif; ?>

    </div>
</div>
