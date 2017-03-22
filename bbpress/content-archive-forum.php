<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums" class="content-archive-topic">

	<?php bbp_forum_subscription_link(); ?>
	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>
		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>
	<?php else : ?>
		<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>
	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>

<h1 class="section-title entry-title"><?php _e('Latest topics','etuts') ?></h1>
<?php echo do_shortcode('[bbp-topic-index]'); ?>
<?php echo do_shortcode('[bbp-topic-form]'); ?>