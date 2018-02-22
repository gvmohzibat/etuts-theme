

<?php if (is_user_logged_in()) : ?>

	<div id="user-menu" class="user-loggedin">

		<?php
		$curruser = wp_get_current_user();
		$user_id = $curruser->ID;
		?>
		
		<div id="curruser-info" class="clearfix">
			<?php echo get_avatar($user_id, '30'); ?>
			<h3 id="curruser-display-name"><?php echo $curruser->display_name; ?></h3>
		</div>

		
		<div id="curruser-menu">
			
			<div class="curruser-custom-links">
				<ul id="menu-curruser-custom-links-before" class="menu">
					<li class="menu-item"><a href="<?php echo get_author_posts_url( $user_id ); ?>" title="<?php _e('View profile','etuts'); ?>"><?php _e('View profile','etuts'); ?></a></li>
					<li class="menu-item"><a href="<?php echo get_user_edit_profile_link($user_id); ?>" title="<?php _e('Edit profile','etuts'); ?>"><?php _e('Edit profile','etuts'); ?></a></li>
				</ul>
			</div>

			<!-- get user menu from wordpress -->

			<?php wp_nav_menu( array( 'menu' => 'curruser-menu' ) ); ?>

			<!-- end user menu -->
			
			<div class="curruser-custom-links">
				<ul id="menu-curruser-custom-links-after" class="menu">

					<!-- Author links -->
					<?php if(!current_user_can('edit_posts')) { ?>
						<li class="menu-item small-padding"><?php echo do_shortcode( '[authorship_signup_form show_text="false"]' ); ?></li>
					<?php } else { ?>
						<li class="menu-item"><a href="<?php echo get_admin_url(); ?>" title="<?php _e('Enter admin dashboard', 'etuts') ?>"><?php _e('Enter admin dashboard', 'etuts') ?></a></li>
					<?php } ?>

					<!-- Vendor links -->
					<?php if(class_exists('WCV_Vendors') && WCV_Vendors::is_vendor( $user_id )) {
						$vendor_dashboard_page = get_permalink(WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' ));
						?>
						<li class="menu-item"><a href="<?php echo $vendor_dashboard_page; ?>" title="<?php _e( 'Vendor dashboard', 'etuts' ); ?>"><?php _e( 'Vendor dashboard', 'etuts' ); ?></a></li>
					<?php } ?>

				</ul>
			</div>

			<!-- last custom links -->

			<div class="curruser-custom-links">
				<ul id="menu-curruser-custom-links-after" class="menu">
					<li class="menu-item"><a href="<?php echo wp_logout_url(); ?>" title="<?php _e('logout','etuts'); ?>"><?php _e('logout','etuts'); ?></a></li>
				</ul>
			</div>

		</div>
	</div>

<?php else: ?>

	<div id="user-menu" class="login-register-links">
		<a id="show_login_form" href="" title="<?php _e('login / register','etuts'); ?>"><?php _e('login / register','etuts'); ?></a>
		<!--<a href="<?php echo wp_registration_url() ?>" title="<?php _e('register','etuts'); ?>"><?php _e('register','etuts'); ?></a> -->
	</div>


	<!-- ajax popup login form -->
	<form id="popup-login-form" action="login" method="post">
	    <h1><?php _e('Login','etuts'); ?><span id="close-login-form" class="close-login-form" style="cursor: pointer;"><i class="fa fa-times" aria-hidden="true"></i></span></h1>
	    <p class="status post-list-item inside-block"></p>
	    <input id="user_login" type="text" name="user_login" placeholder="<?php _e('Username','etuts'); ?>">
	    <input id="user_pass" type="password" name="user_pass" placeholder="<?php _e('Password','etuts'); ?>">
	    <a class="lost-password" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?','etuts'); ?></a>
	    <?php do_action( 'login_form' ); ?>
	    <a href="<?php echo wp_registration_url() ?>" title="<?php _e('register','etuts'); ?>" class="wp-submit" style="background: #aaa; color: #fff;"><?php _e('register','etuts'); ?></a> 
	    <input type="submit" name="submit" class="wp-submit" class="button button-primary button-large" value="<?php _e('login','etuts'); ?>">
	    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
	</form>

<?php endif; ?>

