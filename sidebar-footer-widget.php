<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
	<ul id="footer-widgets" class="clearfix">
		<?php dynamic_sidebar( 'footer_widgets' ); ?>
	</ul>
<?php endif; ?>