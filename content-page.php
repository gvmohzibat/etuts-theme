<?php
/**
 * The template part for displaying single posts
 */
?>

<div class="post-list-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title section-title">', '</h1>' ); ?>
<?php if (!(is_woocommerce() || is_checkout() || is_cart() || is_account_page() || is_product())) : ?>
		<!-- <div class="primary-postmetas">
			<div class="primary-meta-side-right">
				<span class="meta_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php // echo get_the_date(); ?></span> 
				<span class="meta_author"><i class="fa fa-user" aria-hidden="true"></i> <?php // the_author(); ?></span> 
			</div>
			<div class="primary-meta-side-left">
				<span class="meta_comments"><i class="fa fa-comments" aria-hidden="true"></i> <?php // echo comments_number(); ?></span>
				<span class="meta_edit_link">
					<?php
						/*edit_post_link(
							sprintf(
								__( 'Edit <span class="screen-reader-text">"%s"</span>', 'etuts' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);*/
					?>
				</span>
			</div>
		</div> -->
<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>