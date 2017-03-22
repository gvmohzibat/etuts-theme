<?php get_header(); ?>
<section id="main" class="clearfix">

    <div id="rightPad">
        <div class="post-list-item">
            <?php woocommerce_content() ?>
        </div>
    </div>
        
    <div id="leftPad">
        <div>
            <?php get_sidebar('shop'); ?>
        </div>
    </div>

</section>
<?php get_footer(); ?>