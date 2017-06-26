<div id="user-menu" <?php if (is_user_logged_in()) echo 'class="user-loggedin"'; else echo 'class="login-register-links"' ?>>
<?php if (is_user_logged_in()) :
	$curruser = wp_get_current_user(); ?>
	<!-- <a href="<?php // echo get_author_posts_url( $curruser->ID ); ?>" title="<?php // _e('View profile','etuts'); ?>"> -->
	<div id="curruser-info" class="clearfix">
		<?php echo get_avatar($curruser->ID, '30'); ?>
		<h3 id="curruser-display-name"><?php echo $curruser->display_name; ?></h3>
	</div>
	<!-- </a> -->
	<div id="curruser-menu">
		<div class="curruser-custom-links">
			<ul id="menu-curruser-custom-links-before" class="menu">
				<li class="menu-item"><a href="<?php echo get_author_posts_url( $curruser->ID ); ?>" title="<?php _e('View profile','etuts'); ?>"><?php _e('View profile','etuts'); ?></a></li>
				<li class="menu-item"><a href="<?php echo get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename', $curruser->ID) . '/edit'; ?>" title="<?php _e('Edit profile','etuts'); ?>"><?php _e('Edit profile','etuts'); ?></a></li>
			</ul>
		</div>
		<?php wp_nav_menu( array( 'menu' => 'curruser-menu' ) ); ?>
		<div class="curruser-custom-links">
			<ul id="menu-curruser-custom-links-after" class="menu">
				<li class="menu-item">
					<a href="<?php echo wp_logout_url(); ?>" title="<?php _e('logout','etuts'); ?>"><?php _e('logout','etuts'); ?></a>
				</li>
			</ul>
		</div>
	</div>
<?php else: ?>
	<a id="show_login_form" href="" title="<?php _e('login / register','etuts'); ?>"><?php _e('login / register','etuts'); ?></a>
	<!--<a href="<?php echo wp_registration_url() ?>" title="<?php _e('register','etuts'); ?>"><?php _e('register','etuts'); ?></a> -->
	<?php 
		// ajax popup login form
	?>
<?php endif; ?>
</div>
<?php if (!is_user_logged_in()) { ?>
<form id="popup-login-form" action="login" method="post" class="post-list-item inside-block">
    <h1><?php _e('Login','etuts'); ?><a class="close-login-form" href=""><i class="fa fa-times" aria-hidden="true"></i></a></h1>
    <p class="status"></p>
    <input id="user_login" type="text" name="user_login" placeholder="<?php _e('Username','etuts'); ?>">
    <input id="user_pass" type="password" name="user_pass" placeholder="<?php _e('Password','etuts'); ?>">
    <a class="lost-password" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?','etuts'); ?></a>
    <?php do_action( 'login_form' ); ?>
    <a href="<?php echo wp_registration_url() ?>" title="<?php _e('register','etuts'); ?>" class="wp-submit" style="background: #aaa; color: #fff;"><?php _e('register','etuts'); ?></a> 
    <input type="submit" name="submit" class="wp-submit" class="button button-primary button-large" value="<?php _e('login','etuts'); ?>">
    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
</form>
<?php } ?>