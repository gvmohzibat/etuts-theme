<?php get_header(); ?>
<?php
$id = $author; // $author is set by wordpress
$author = get_user_by( 'id', $id );
?>

<section id="main" class="clearfix">

<div id="rightPad">			
<!-- authors posts -->
	<div id="lastPosts" class="user-page-section">
		<div id="last-posts-container" class="clearfix">
			<h1 class="section-title entry-title home-page-title"><?php _e('User\'s latest posts','etuts'); ?></h1>
			<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post();
				get_template_part('content', 'single-homepage');
			endwhile; ?>
			
			<?php else :
				get_template_part('content', 'noresults');
			endif; ?>
		</div>
		<?php get_template_part('page','navigation'); ?>
	</div>
		

<!-- authors stories -->
	<?php // get user stories
	query_posts([
		'post_type'=>array('vmoh_user_stories'),
		'author' => $id,
	]);
	?>
	<div id="lastStories" class="user-page-section">
		<div id="last-stories-container" class="clearfix">
			<h1 class="section-title entry-title home-page-title"><?php _e('User Experiences','etuts'); ?></h1>
			<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post();
				get_template_part('content', 'story-homepage');
			endwhile; ?>

			<?php else :
				get_template_part('content', 'noresults');
			endif; ?>
		</div>
			<?php get_template_part('page','navigation'); ?>
	</div>
</div>
		

<div id="leftPad">
	<div>
		<?php get_sidebar('user'); ?>
	</div>
</div>

</section>
<?php get_footer(); ?>