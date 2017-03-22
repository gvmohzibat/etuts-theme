<a class="post-tumb-link" href="<?php echo get_the_permalink(); ?>">
	<div <?php post_class('home-latest-posts home-latest-stories post-list-item clearfix'); ?> id="post-<?php echo get_the_ID(); ?>">
		<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
		<h2 class="title"><?php echo get_the_title(); ?></h2>

		<div class="postmeta-primary">
			<span class="meta_author"><i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_author_posts_link(); ?></span>
			<span class="meta_categories"><i class="fa fa-sitemap" aria-hidden="true"></i> 
				<?php 
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo esc_html( $categories[0]->name );				}
			?></span>
		</div>
	</div>
</a>