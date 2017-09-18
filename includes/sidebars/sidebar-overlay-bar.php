<?php if ( is_active_sidebar( 'sidebar_primary' ) ) : ?>
	<div id="leftMenu">
		<div id="leftMenuToggle">&lt;</div>
		<div class="left-sidebar-container">
			<ul id="big-page-sidebar" class="sidebar">
				<?php dynamic_sidebar( 'sidebar_primary' ); ?>
			</ul>
		</div>
	</div>
<?php endif; ?>