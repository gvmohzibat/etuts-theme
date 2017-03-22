<?php
/**
 * Template Name: Contact Form
 *
 * Contact form
 *
 */

get_header(); ?>

<section id="main" class="clearfix">
<div id="rightPad">
		
    <?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'page' ); ?>
    <?php endwhile; ?>
	
	<div id="contact-form" class="post-list-item chain-connect chain-connect-before">
		<?php
		if ($_POST['cform_submit'] ) { ?>
			
			<div class="message">

			<?php if( !$_POST['cform_name'] || !$_POST['cform_email'] || !$_POST['cform_message']) { ?>
				<?php _e('Please fill in all required fields!','etuts'); ?>

			<?php } elseif( !is_email($_POST['cform_email']) ) { ?>
				<?php _e('Invalid email!','etuts'); ?>

			<?php } else {
				wp_mail('email@etuts.ir',
						sprintf( '[%s] ' . get_bloginfo('name') ),
						esc_html($_POST['cform_message']),'From: "'. esc_html($_POST['cform_name']) .'" <' . esc_html($_POST['cform_email']) . '>');

				unset($_POST);
				_e('Thanks for contacting us.','etuts');
			} ?>

			</div>

		<?php } ?>
		
		<style>
			input[type="text"] {
				width: 48%;
				margin: 10px 1%;
				float: right;
			}
			textarea {
				display: block;
				width: 98%;
				margin: 10px 1%;
			}
		</style>
		<form method="post" action="">
			<input type="hidden" name="cform_submit" value="true" />
			<input type="text" name="cform_name" value="<?php if ( isset($_POST['cform_name']) ) { echo esc_attr($_POST['cform_name']); } ?>" placeholder="<?php _e('Name','etuts'); ?>" />
			
			<input type="text" name="cform_email" value="<?php if ( isset($_POST['cform_email']) ) { echo esc_attr($_POST['cform_email']); } ?>" placeholder="<?php _e('Email','etuts'); ?>" />
			
			<textarea rows="6" name="cform_message" placeholder="<?php _e('Message','etuts'); ?>"><?php if ( isset($_POST['cform_message']) ) { echo esc_textarea($_POST['cform_message']); } ?></textarea>
			
			<div class="contact-form-label alignleft">&nbsp;</div>
			<div class="contact-form-input" style="text-align: left;"><input type="submit" value="<?php _e('Submit','etuts'); ?>" /></div>
		</form>
		
	</div>

</div>
<?php get_template_part('page','leftPad'); ?>
</section>
	
<?php get_footer(); ?>