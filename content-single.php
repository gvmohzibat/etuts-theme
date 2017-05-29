<?php
/**
 * The template part for displaying single posts
 */
?>

<div class="post-list-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">

		<?php the_title( '<h1 class="entry-title section-title">', '</h1>' ); ?>

		<div class="primary-postmetas">
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
				<!-- <span class="meta_comments"><i class="fa fa-comments" aria-hidden="true"></i> <a href="#comments" title="<?php // _e('View Comments','etuts'); ?>"><?php // echo comments_number(); ?></a></span> -->
				<span class="meta_categories"><i class="fa fa-sitemap" aria-hidden="true"></i> 
					<?php 
					$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						echo esc_html( $categories[0]->name );   
					}
				?></span>
			</div>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>

<?php 
$bot_id = get_post_meta( get_the_ID(), 'bot_id', true );

if ( ! empty( $bot_id ) ) { ?>
    <div id="bot-id-link-section" class="post-list-item clearfix">
    	<h4>برای ورود به ربات روی لینک روبرو کلیک کنید</h4>
    	<a class="tbot-link-button" href="http://t.me/<?php echo $bot_id; ?>">ربات <?php echo '@' . $bot_id; ?></a>
    </div>
<?php } ?>