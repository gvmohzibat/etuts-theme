<?php
/**
 * The template part for displaying single posts
 */
?>

<div class="post-list-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">

		<?php the_title( '<h1 class="entry-title section-title">', '</h1>' ); ?>
		
		<!-- <div class="primary-postmetas">
			<div class="primary-meta-side-right">
				<span class="meta_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_modified_date(); ?></span>
				<span class="meta_edit_link">
					<?php
						edit_post_link(
							__( 'Edit', 'etuts' ),
							'<span class="edit-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
							'</span>'
						);
					?>
				</span>
			</div>
			<div class="primary-meta-side-left">
				<span class="meta_postviews"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></span>
				<span class="meta_author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
				<span class="meta_comments"><i class="fa fa-comments" aria-hidden="true"></i> <a href="#comments" title="<?php _e('View Comments','etuts'); ?>"><?php echo comments_number(); ?></a></span>
				<span class="meta_categories"><i class="fa fa-sitemap" aria-hidden="true"></i> 
					<?php 
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						echo esc_html( $categories[0]->name );   
					}
				?></span>
			</div>
		</div> -->

	</header><!-- .entry-header -->

	<?php 
	$post_modified_date = date('Y-m-d', strtotime(get_the_modified_date('Y-m-d'))) . "\n";
	$new_site_date = date('Y-m-d', strtotime('1 January 2017')) . "\n";
	
	if ($new_site_date > $post_modified_date) { ?>
		<div class="post-list-item inside-block yellow-box">
			<p>این مطلب از سایت قدیمی منتقل شده و ممکن است اشکالات زیادی دشته باشد. لطفا در صورت مشاهده ی هر گونه ایراد، گزارش دهید</p>
		</div>
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>

<?php
// $post_type = get_post_type();
// if ($post_type == 'aside') {
	?>
	<?php 
	// Bot id box
	$bot_id = get_post_meta( get_the_ID(), 'bot_id', true );

	if ( ! empty( $bot_id ) ) { ?>
	    <div id="bot-id-link-section" class="post-list-item clearfix">
	    	<h4>برای ورود به ربات روی لینک روبرو کلیک کنید</h4>
	    	<a class="tbot-link-button" target="_blankgit" href="http://t.me/<?php echo $bot_id; ?>">ربات <?php echo '@' . $bot_id; ?></a>
	    </div>
	<?php } ?>

	<?php 
	// Site url box
	$bot_id = get_post_meta( get_the_ID(), 'introduce_site_url', true );

	if ( ! empty( $bot_id ) ) { ?>
	    <div id="bot-id-link-section" class="post-list-item clearfix">
	    	<h4>برای ورود به ربات روی لینک روبرو کلیک کنید</h4>
	    	<a class="tbot-link-button" target="_blankgit" href="http://t.me/<?php echo $bot_id; ?>">ربات <?php echo '@' . $bot_id; ?></a>
	    </div>
	<?php } ?>
<?php //}
?>

<div class="post-list-item sidebar-item-no-bg related-posts clearfix">
	<?php
	// Default arguments
	$args = array(
		'posts_per_page' => 6, // How many items to display
		'post__not_in'   => array( get_the_ID() ), // Exclude current post
		'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
		'post_type' => get_post_type(),
	);

	// Check for current post category and add tax_query to the query arguments
	$cats = wp_get_post_terms( get_the_ID(), 'category' ); 
	$cats_ids = array();
	foreach( $cats as $wpex_related_cat ) {
		$cats_ids[] = $wpex_related_cat->term_id; 
	}
	if ( ! empty( $cats_ids ) ) {
		$args['category__in'] = $cats_ids;
	}

	// Query posts
	$wpex_query = new wp_query( $args );

	if ($wpex_query->post_count != 0) { ?>
	<h3 class="background-border-title section-title"><span><?php _e('Related posts','etuts'); ?></span></h3>
	<?php }

	// Loop through posts
	foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
		
		<a class="post-list-item related-post-item" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
			<?php
				if(has_post_thumbnail())
					the_post_thumbnail( 'thumbnail' );
			?>
			<h4 class="related-post-item-title"><?php the_title(); ?></h4>
		</a>

	<?php endforeach;
	wp_reset_postdata();
	?>
</div>

