<?php

/**
 * Anonymous User
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( bbp_current_user_can_access_anonymous_user_form() ) : ?>

	<?php do_action( 'bbp_theme_before_anonymous_form' ); ?>

	<fieldset class="bbp-form">
		<legend><?php ( bbp_is_topic_edit() || bbp_is_reply_edit() ) ? _e( 'Author Information', 'bbpress' ) : _e( 'Your information:', 'bbpress' ); ?><?php _e( 'not required', 'bbpress' ); ?></legend>

		<?php do_action( 'bbp_theme_anonymous_form_extras_top' ); ?>

		<p>
			<input type="text" id="bbp_anonymous_author"  value="<?php bbp_author_display_name(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_name" placeholder="<?php _e( 'Name (required):', 'bbpress' ); ?>" />
		</p>

		<p>
			<input type="text" id="bbp_anonymous_email"   value="<?php bbp_author_email(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_email" placeholder="<?php _e( 'Mail (will not be published) (required):', 'bbpress' ); ?>" />
		</p>

		<?php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); ?>

	</fieldset>

	<?php do_action( 'bbp_theme_after_anonymous_form' ); ?>

<?php endif; ?>
