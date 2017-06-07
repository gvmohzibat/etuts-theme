<?php // $author is from author.php
$id = (!empty(get_the_author_meta('id'))) ? get_the_author_meta('id') : $author; // $author is set by wordpress
$author = get_user_by( 'id', $id );
$email = $author->user_email;
$display_name = $author->display_name;
$description = $author->description;
// var_dump($author);
 ?>
<div id="post-meta-info">
	<div class="post-featured-image">
		<?php echo get_avatar( $email, '320' ); ?>
		<h3 class="entry-title section-title background-border-title post-author-name-info"><span><?php echo $display_name; ?></span></h3>
		<p class="post-author-description"><?php echo nl2br($description); ?></p>
		<ul class="fa-ul">
			<li><i class="fa fa-list-alt" aria-hidden="true"></i><a href="<?php echo get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename') . '/topics'; ?>"><?php _e('topics','etuts'); ?></a></li>
			<li><i class="fa fa-reply" aria-hidden="true"></i><a href="<?php echo get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename') . '/replies'; ?>"><?php _e('replies','etuts'); ?></a></li>
			<li><i class="fa fa-globe" aria-hidden="true"></i><a href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php _e('Website','etuts'); ?></a></li>
			<?php if (get_current_user_id() == $id) { ?>
				<li><i class="fa fa-pencil" aria-hidden="true"></i><a href="<?php echo get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename') . '/edit'; ?>" title="<?php _e('Edit profile','etuts'); ?>"><?php _e('Edit profile','etuts'); ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>


<?php if ( is_active_sidebar( 'sidebar_user' ) ) : ?>
	<div id="user-sidebar">
		<ul id="sidebar">
			<?php dynamic_sidebar( 'sidebar_user' ); ?>
		</ul>
	</div>
<?php endif; ?>