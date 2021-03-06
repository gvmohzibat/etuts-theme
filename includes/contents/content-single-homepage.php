<a class="post-tumb-link" href="<?php echo get_the_permalink(); ?>">
	<div <?php post_class('home-post-list-item home-latest-posts post-list-item col-xs-12 col-lg-6 col-xl-4 clearfix');?> id="post-<?php echo get_the_ID(); ?>">

<?php // get an icon based on post format
$post_format = get_post_format() ?: 'standard';
switch ($post_format) {
    case 'standard':
        $icon = 'fa-pencil';
        break;
    case 'aside':
        $icon = 'fa-sticky-note';
        break;
    default:
        $icon = $post_format;
        break;
}
?>
		<!-- <i class="post-format-icon <?php echo $post_format; ?> fa <?php echo $icon; ?> fa-fw" aria-hidden="true"></i> -->
		<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('homepage-thumb');
}
?>
		<div class="content-container">
		<h2 class="title"><?php echo get_the_title(); ?></h2>

				<p class="excerpt"><?php the_excerpt_max_charlength(150);?></p>

			<div class="postmeta-primary">
				<span class="meta_postviews"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></span>
				<!-- <span class="meta_comments"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo comments_number(); ?></span> -->
				<span class="meta_categories"><i class="fa fa-sitemap" aria-hidden="true"></i>
					<?php
$categories = get_the_category();
if (!empty($categories)) {
    echo esc_html($categories[0]->name);
}
?>
				</span>
			</div>
		</div>
	</div>
</a>