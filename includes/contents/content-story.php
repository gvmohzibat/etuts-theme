<?php
/**
 * The template part for displaying Stories
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header story-header post-list-item chain-connect">
		<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
		<?php the_title( '<h1 class="entry-title section-title">', '</h1>' ); ?>
        <div class="primary-storymetas">
			<div class="primary-meta-side-right">
				<span class="meta_author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
				<span class="meta_date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
				<span class="meta_edit_link">
					<?php
						edit_post_link(
							__( 'Edit', 'etuts' ),
							'<span class="edit-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ',
							'</span>'
						);
					?>
				</span>
			</div>
    	</div>
	</div>
	<div class="entry-content post-list-item">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
