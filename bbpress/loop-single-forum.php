<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<a class="bbp-forum-list-link" href="<?php bbp_forum_permalink(); ?>">
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<!-- <li class="bbp-forum-info"> -->

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<h1 class="bbp-forum-title"><?php bbp_forum_title(); ?></h1>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php bbp_forum_row_actions(); ?>

	<!-- </li> -->

	<li class="bbp-forum-topic-count"><i class="fa fa-list-alt" aria-hidden="true"></i> <?php bbp_forum_topic_count(); ?></li>

	<li class="bbp-forum-reply-count"><i class="fa fa-comments" aria-hidden="true"></i> <?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></li>

</ul>
</a><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
