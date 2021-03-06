<?php

/**
 * Archive Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums" class="content-archive-topic">

	<?php do_action( 'bbp_template_before_topics_index' ); ?>

	<?php if ( bbp_has_topics() ) : ?>
		<?php bbp_get_template_part( 'loop',       'topics'    ); ?>
	<?php else : ?>
		<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>
	<?php endif; ?>

	<?php do_action( 'bbp_template_after_topics_index' ); ?>

</div>
