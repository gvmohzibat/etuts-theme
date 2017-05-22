<?php
/**
 * Template Name: Insert post
 *
 * Allow users to update their profiles from Frontend.
 *
 */

$draft_post_id = isset($_GET['id']) ? $_GET['id'] : 0;

$error_text = '';
 
if ( isset( $_POST['submit'] ) || isset( $_POST['save-draft'] ) ) {
	$title = $_POST['title'];
	$content = $_POST['content'];
    if ( trim( $title ) === '' || trim($content) === '' ) {
        $error_text = __('Please complete the fields.','etuts');
        $hasError = true;
    }

    $draft_id = isset($_POST['draft-id']) ? $_POST['draft-id'] : 0;

    if (isset($_POST['submit']))
    	$post_status = 'pending';
    else if (isset($_POST['save-draft'])) {
    	$post_status = 'draft';
    	echo "ok";
    }

	wp_insert_post(array(
		'post_title' => wp_strip_all_tags( $title ),
	    'post_content' => $content,
	    'post_type' => 'vmoh_user_stories',
	    'post_status' => $post_status,
	    'ID' => $draft_id
	));
}
?>
<?php get_header(); ?>

<section id="main" class="clearfix">

<div id="rightPad">
	<?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
	<?php endwhile; ?>


<?php if (is_user_logged_in()) : ?>

<div id="post-type-tabs" class="post-list-item">
	<input for="new-post-form" type="checkbox" name="post_type" id="post_type" value="post"> <label for="post_type"><?php _e( 'Tutorial article', 'etuts' ); ?></label>
	<input for="new-post-form" type="checkbox" name="post_type" id="post_type" value="vmoh_user_stories"> <label for="post_type"><?php _e( 'Story', 'etuts' ); ?></label>
</div>

	<?php 
		$current_user = wp_get_current_user();
		$user_posts = new WP_Query(array(
			// 'post_type' => 'post',
			'post_status' => array( 'pending', 'draft' ),
			'showposts' => '10',
			'author' => $current_user->ID
		));
		$user_stories = new WP_Query(array(
			'post_type' => 'vmoh_user_stories',
			'post_status' => array( 'pending', 'draft' ),
			'showposts' => '10',
			'author' => $current_user->ID
		));
	?>

	<?php if ($hasError)
		echo '<div class="has-background-icon display-error post-list-item"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$error_text.'</p></div>';
	?>

	<?php
	if ($user_posts->have_posts()) : ?>
		<div id="user-posts-list" class="draft-posts-list post-list-item">
			<h1 class="section-title"><?php _e('Draft posts','etuts'); ?></h1>
			<ul class="fa-ul">
				<li><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href="?" title="<?php _e('New post','etuts'); ?>"><?php _e('New post','etuts'); ?></a></li>
				<?php while ($user_posts->have_posts()) : $user_posts->the_post(); ?>
			    <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href=".?id=<?php the_ID(); ?>"><?php the_title(); ?> <?php echo (get_post_status(get_the_ID()) == 'pending') ? '<span class="pending">('.__('pending','etuts').')</span>' : '<span class="draft">('.__('draft','etuts').')</span>'; ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php
	if ($user_stories->have_posts()) : ?>
		<div id="user-stories-list" class="draft-posts-list post-list-item">
			<h1 class="section-title"><?php _e('Draft stories','etuts'); ?></h1>
			<ul class="fa-ul">
				<li><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href="?" title="<?php _e('New post','etuts'); ?>"><?php _e('New post','etuts'); ?></a></li>
				<?php while ($user_stories->have_posts()) : $user_stories->the_post(); ?>
			    <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href=".?id=<?php the_ID(); ?>"><?php the_title(); ?> <?php echo (get_post_status(get_the_ID()) == 'pending') ? '<span class="pending">('.__('pending','etuts').')</span>' : '<span class="draft">('.__('draft','etuts').')</span>'; ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php 
		$current_post;
		// echo $draft_post_id;
		if (is_null($draft_post_id) || $draft_post_id == 0)
			$current_post = NULL;
		else
			$current_post = get_post($draft_post_id);
		// else
		// echo $current_post;
	?>
	<div class="send-post-container">
		<form action="" id="new-post-form" method="POST">
			<div class="entry-header story-header post-list-item chain-connect">
				<?php echo get_avatar( $current_user->user_email, '90' ); ?>
				<input placeholder="<?php _e('Post title','etuts'); ?>" type="text" id="new-post-title" name="title" value="<?php echo $current_post->post_title; ?>">
				<div class="primary-storymetas single-postmeta">
				<div class="primary-meta-side-right">
					<span class="meta_author"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $current_user->display_name; ?></span>
					</div>
		    	</div>
			</div>
			<input type="hidden" name="author" value="<?php echo $current_user->ID; ?>">
			<input type="hidden" name="draft-id" value="<?php echo $draft_post_id; ?>">
			<div class="entry-content post-list-item chain-connect">
				<?php wp_editor($current_post->post_content, 'new-post-content', array('drag_drop_upload' => true, 'textarea_name' => 'content', 'teeny' => true, 'quicktags' => false)); ?>
			</div>
			<div class="post-list-item clearfix">
				<input id="new-post-save-draft" name="save-draft" type="submit" value="<?php _e('Save as draft','etuts'); ?>">
				<input id="new-post-submit" name="submit" type="submit" value="<?php _e('Submit','etuts'); ?>">
			</div>
		</form>
	</div>
<?php endif; ?>


</div>

<?php get_template_part('page','leftPad'); ?>

</section>

<?php get_footer(); ?>