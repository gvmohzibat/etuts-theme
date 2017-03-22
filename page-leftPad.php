<div id="leftPad">
    <div>

        <?php if ( is_bbpress() ) : ?>
            <?php get_sidebar('bbpress'); ?>
        <?php elseif ( is_single() ) : ?>
            <?php get_sidebar('single'); ?>
        <?php else : ?>
            <?php get_sidebar('page'); ?>
        <?php endif; ?>

    </div>
</div>
