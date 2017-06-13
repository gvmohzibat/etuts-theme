<?php

/**
 * New/Edit Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( !bbp_is_single_forum() ) : ?>

<div id="bbpress-forums" class="form-topic">

<?php endif; ?>

<div id="new-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-form bbp-quick-topic-form">

	<form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>">

		<?php do_action( 'bbp_theme_before_topic_form' ); ?>

			<h3 class="form-quick-topic-title"><?php _e( 'Create New Topic', 'bbpress' ); ?></h3>

			<div>

			<?php bbp_get_template_part( 'form', 'anonymous' ); ?>

			<?php do_action( 'bbp_theme_before_topic_form_title' ); ?>

			<p>
				<input type="text" id="bbp_topic_title" value="<?php bbp_form_topic_title(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_title" maxlength="<?php bbp_title_max_length(); ?>" placeholder="<?php printf( __( 'Topic Title (Maximum Length: %d):', 'bbpress' ), bbp_get_title_max_length() ); ?>" />
			</p>

			<?php do_action( 'bbp_theme_after_topic_form_title' ); ?>

			<?php do_action( 'bbp_theme_before_topic_form_content' ); ?>

			<?php bbp_the_content( array( 'context' => 'topic', 'quicktags' => false ) ); ?>

			<?php do_action( 'bbp_theme_after_topic_form_content' ); ?>

			<?php if ( !bbp_is_single_forum() ) : ?>

				<?php do_action( 'bbp_theme_before_topic_form_forum' ); ?>

				<p class="form-quick-topic-forum-choose clearfix">
					<label for="bbp_forum_id"><?php _e( 'Forum:', 'bbpress' ); ?></label>
					<?php
						bbp_dropdown( array(
							'show_none' => __( '(No Forum)', 'bbpress' ),
							'selected'  => bbp_get_form_topic_forum()
						) );
					?>
				</p>

				<?php do_action( 'bbp_theme_after_topic_form_forum' ); ?>

			<?php endif; ?>

			<?php if ( bbp_is_subscriptions_active() && !bbp_is_anonymous() && ( !bbp_is_topic_edit() || ( bbp_is_topic_edit() && !bbp_is_topic_anonymous() ) ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_form_subscriptions' ); ?>

				<p>
					<input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox" value="bbp_subscribe" <?php bbp_form_topic_subscribed(); ?> tabindex="<?php bbp_tab_index(); ?>" />

					<?php if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) ) : ?>

						<label for="bbp_topic_subscription"><?php _e( 'Notify the author of follow-up replies via email', 'bbpress' ); ?></label>

					<?php else : ?>

						<label for="bbp_topic_subscription"><?php _e( 'Notify me of follow-up replies via email', 'bbpress' ); ?></label>

					<?php endif; ?>
				</p>

				<?php do_action( 'bbp_theme_after_topic_form_subscriptions' ); ?>

			<?php endif; ?>

			<?php do_action( 'bbp_theme_before_topic_form_submit_wrapper' ); ?>

			<div class="bbp-submit-wrapper">

				<?php do_action( 'bbp_theme_before_topic_form_submit_button' ); ?>

				<button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_topic_submit" name="bbp_topic_submit" class="button submit"><?php _e( 'Submit', 'bbpress' ); ?></button>

				<?php do_action( 'bbp_theme_after_topic_form_submit_button' ); ?>

			</div>

			<?php do_action( 'bbp_theme_after_topic_form_submit_wrapper' ); ?>

			</div>

			<?php bbp_topic_form_fields(); ?>

		</fieldset>

		<?php do_action( 'bbp_theme_after_topic_form' ); ?>

	</form>
</div>

<?php if ( !bbp_is_single_forum() ) : ?>

</div>

<?php endif; ?>