<?php global $theme; get_header(); ?>

<section id="main" class="clearfix home-page-main">
    <?php if (have_posts()) : ?>
        <div id="lastPosts" class="home-page-section">
            <div id="last-posts-container" class="clearfix">
                <div class="section-title entry-title home-page-title"><h1><?php _e('Latest Posts','etuts'); ?><a href="<?php echo get_bloginfo('url').'/new-post'; ?>" class="page-title-button"><i class="fa fa-plus" aria-hidden="true"></i> <?php _e( 'Add post', 'etuts' ); ?></a></h1>
                </div>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'single-homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php endif; ?>

    <div class="home-page-intro home-page-section clearfix" id="home-page-forums">
        <i class="fa fa-question home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-question home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-list-alt home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-question home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-list-alt home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-question home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-list-alt home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-list-alt home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-question home-page-intro-icon" aria-hidden="true"></i>
        <?php 
        function bbpress_summary() {
            global $wpdb;
            return $wpdb->get_var("SELECT COUNT(post_id) FROM $wpdb->postmeta WHERE meta_key = '_bbp_topic_id' AND `post_id` = `meta_value`");
        }
        $forum_counts = bbpress_summary();
        ?>
        <div class="home-page-intro-content">
            <h1 class="home-page-intro-title"><?php _e('Ask your questions in our forums','etuts'); ?></h1>
            <p class="home-page-intro-par">
                <?php printf( __( '<span>%d</span> Solved topics until now!', 'etuts' ), $forum_counts ); ?>
            </p>
            <div id="bbpress-forums" class="content-archive-topic">
                <?php do_action( 'bbp_template_before_forums_index' ); ?>
                <?php if ( bbp_has_forums() ) : ?>
                    <?php bbp_get_template_part( 'loop',     'forums'    ); ?>
                <?php else : ?>
                    <?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>
                <?php endif; ?>
                <?php do_action( 'bbp_template_after_forums_index' ); ?>
            </div>
        </div>
    </div>

    <div id="lastTopics" class="home-page-section">
        <h1 class="home-page-title section-title entry-title"><?php _e('Latest topics','etuts') ?></h1>
        <?php echo do_shortcode('[bbp-topic-index]'); ?>
    </div>

    <?php 
    function woocommerce_product_count_home() {
        $args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
        $products = new WP_Query( $args );
        return $products->found_posts;
    }
    ?>
    <div class="home-page-intro home-page-section clearfix" id="home-page-shop">
        <i class="fa fa-shopping-cart home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-bag home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-cart home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-bag home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-bag home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-cart home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-cart home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-basket home-page-intro-icon" aria-hidden="true"></i>
        <i class="fa fa-shopping-basket home-page-intro-icon" aria-hidden="true"></i>
        <div class="home-page-intro-content">
            <h1 class="home-page-intro-title"><?php _e('Latest products of our shop','etuts'); ?></h1>
            <p class="home-page-intro-par">
                <?php printf( __( 'We have <span>%d</span> products in our shop!', 'etuts' ), woocommerce_product_count_home() ); ?>
            </p>
            <?php echo do_shortcode('[recent_products per_page="12" columns="5"]'); ?>
        </div>
    </div>

    <?php query_posts(array('post_type'=>array('vmoh_user_stories'))); ?>

    <?php if (have_posts()) : ?>
        <div id="lastStories" class="home-page-section">
            <div id="last-stories-container" class="clearfix">
                <h1 class="section-title entry-title home-page-title"><?php _e('User Experiences','etuts'); ?></h1>
                <?php while (have_posts()) : the_post();
                    get_template_part('content', 'story-homepage');
                endwhile; ?>
            </div>
            <?php get_template_part('page','navigation'); ?>
        </div>
    <?php endif; ?>

</section>
<?php get_footer(); ?>