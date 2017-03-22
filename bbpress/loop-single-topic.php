<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>
	<li class="bbp-topic-started-by"><?php echo bbp_get_topic_author_link( array( 'size' => '60', 'sep' => '' ) ); ?></li>
	<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

	<li class="bbp-topic-title">
		<?php do_action( 'bbp_theme_before_topic_title' ); ?>
		<h3><a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a></h3>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>
		<p class="bbp-topic-meta">
			<?php if ( !bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>
				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>
				<span class="bbp-topic-started-in"><?php printf( '<a href="%1$s">%2$s</a>', bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?></span>
				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>
			<?php endif; ?>
			<span class="bbp-topic-freshness">
				<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>
				<?php bbp_topic_freshness_link(); ?>
				<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
			</span>
			<span class="bbp-topic-voice-count"><i class="fa fa-user" aria-hidden="true"></i> <?php bbp_topic_voice_count(); ?></span>
			<span class="bbp-topic-reply-count"><i class="fa fa-comments" aria-hidden="true"></i> <?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></span>
		</p>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

		<?php bbp_topic_row_actions(); ?>

	</li>

</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->