<?php if ( is_active_sidebar( 'sidebar_bbpress' ) ) : ?>
	<div id="bbpress-sidebar">
		<ul class="sidebar">
			<?php dynamic_sidebar( 'sidebar_bbpress' ); ?>
		</ul>
	</div>
<?php endif; ?>