<div id="post-meta-info">
	<div class="post-featured-image">
		<?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
		<?php the_title( '<h3 class="entry-title section-title background-border-title"><span>', '</span></h3>' ); ?>
		<ul class="fa-ul">
			<li class="meta_date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> <?php
				$modified_date = get_the_modified_date();
				$published_date = get_the_date();
				if ($modified_date == $published_date)
					echo $published_date;
				else
					echo $published_date . ' ' . __('edited on', 'etuts') . ' ' . $modified_date;
				?></li>
			<li class="meta_postviews"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></li>
			<li class="meta_author"><i class="fa fa-user fa-fw" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
			<li class="meta_comments"><i class="fa fa-comments fa-fw" aria-hidden="true"></i> <a href="#comments" title="<?php _e('View Comments','etuts'); ?>"><?php echo comments_number(); ?></a></li>
			<li class="meta_categories"><i class="fa fa-sitemap fa-fw" aria-hidden="true"></i><?php 
				$cats=get_the_category();
				$top_cat = $cats[0];
				foreach($cats as $i => $cat)
					if ($cat->parent == 0) {
						$top_cat = $cat;
						unset($cats[$i]);
						break;
					}
				array_unshift($cats, $top_cat);
				
				$separator = ' - ';
				if (! empty($cats)) {
					foreach( $cats as $cat ) {
						$output .= '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'etuts' ), $cat->name ) ) . '">' . get_category_icon( $cat->slug ) . ' ' .esc_html( $cat->name ) . '</a>' . $separator;
					}
				}
				echo trim( $output, $separator );
			?></li>
			<?php
				edit_post_link(
					sprintf(
						__( 'Edit <span class="screen-reader-text">"%s"</span>', 'etuts' ),
						get_the_title()
					),
					'<li class="meta_edit_link"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>',
					'</li>'
				);
			?>
		</ul>
	</div>
	<div class="post-author-info">
		<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
		<a class="post-author-other-posts" href="<?php echo get_bloginfo('url') . '/author/' . get_the_author_meta('nicename'); ?>" target="_blank"><span><?php _e('Other posts', 'etuts'); ?></span> <i class="fa fa-angle-double-left" aria-hidden="true"></i> </a>
		<h3 class="post-author-name-info"><a href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php echo get_the_author_meta('display_name'); ?></a></h3>
		<p class="post-author-description"><?php echo nl2br(get_the_author_meta('description')); ?></p>
		<div class="l-list-bottom-box post-author-social-links">
			<ul class="fa-ul">
				<?php echo get_user_contact_methods(get_the_author_meta( 'ID' ), true); ?>
			</ul>
		</div>
	</div>
	<div class="share-post-buttons hover-foldable">
		<h5 class="entry-title section-title background-border-title"><span><?php _e('Share this post', 'etuts'); ?></span><span id="show-more-share-post-butttons"><?php _e('More','etuts'); ?>  <i class="fa fa-angle-double-left" aria-hidden="true"></i></span></h5>
		<ul class="clearfix">
			<li><a title="<?php _e('Download PDF','etuts'); ?>" href="javascript:void(0);" onclick="window.print()"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="" style="color: #ff0000;"></i> <?php _e('Download PDF','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('WhatsApp','etuts'); ?>" href="whatsapp://send?text=<?php the_title(); ?> - <?php echo wp_get_shortlink(); ?>"><i class="fa fa-whatsapp fa-fw" aria-hidden="true" style="color: #50b043;"></i> <?php _e('WhatsApp','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('Telegram','etuts'); ?>" href="https://telegram.me/share/url?url=<?php echo wp_get_shortlink(); ?>&text=<?php the_title(); ?>"><i class="fa fa-paper-plane fa-fw" aria-hidden="true" style="color: #24b5f3;"></i> <?php _e('Telegram','etuts'); ?></a></li>
			<li><a class="post-shortlink" target="_blank" title="<?php _e('Short link','etuts'); ?>" href="<?php echo wp_get_shortlink(); ?>"><i class="fa fa-link fa-fw" aria-hidden="true" style="color: #000000;"></i> <?php _e('Short link','etuts'); ?></a></li>
		</ul>
		<ul id="more-share-links" class="clearfix">
			<li><a target="_blank" title="<?php _e('Ask questions','etuts'); ?>" href="http://etuts.ir/ask"><i class="fa fa-question fa-fw" aria-hidden="true" style="color: #82b440;"></i> <?php _e('Ask questions','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('Email','etuts'); ?>" href="mailto:?subject=etuts.ir - <?php the_title(); ?>&body=<?php the_title(); ?> - <?php echo wp_get_shortlink(); ?>"><i class="fa fa-envelope-o fa-fw" aria-hidden="" style="color: #e1cf00;"></i> <?php _e('Email','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('Facebook','etuts'); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink(); ?>"><i class="fa fa-facebook fa-fw" aria-hidden="true" style="color: #284c99;"></i> <?php _e('Facebook','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('Google +','etuts'); ?>" href="https://plus.google.com/share?url=<?php echo wp_get_shortlink(); ?>"><i class="fa fa-google-plus fa-fw" aria-hidden="true" style="color: #ff3422;"></i> <?php _e('Google +','etuts'); ?></a></li>
			<li><a target="_blank" title="<?php _e('Twitter','etuts'); ?>" href="https://twitter.com/share?url=<?php echo wp_get_shortlink(); ?>&text=<?php the_title(); ?>&hashtags=etuts"><i class="fa fa-twitter fa-fw" aria-hidden="true" style="color: #00aff1;"></i> <?php _e('Twitter','etuts'); ?></a></li>
		</ul>
	</div>
</div>

<div id="table-of-contents" class="post-list-item sidebar-item-no-bg table-of-contents">
	<h3 class="entry-title section-title background-border-title"><span><?php _e('contents', 'etuts'); ?></span></h3>
	<div></div>
</div>

<?php if ( is_active_sidebar( 'sidebar_single' ) ) : ?>
	<div id="single-sidebar">
		<ul class="sidebar">
			<?php dynamic_sidebar( 'sidebar_single' ); ?>
		</ul>
	</div>
<?php endif; ?>