<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>

<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

	<li class="bbp-body">

		<ul class="bbp-topics-replys-list">
		<?php while ( bbp_replies() ) : bbp_the_reply(); ?>
			
				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>
			
			<?php endwhile; ?>
		</ul>

	</li><!-- .bbp-body -->

</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
