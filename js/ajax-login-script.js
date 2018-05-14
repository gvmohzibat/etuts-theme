jQuery(document).ready(function($) {
	// Show the login dialog box on click
	$('a#show_login_form').on('click', function(e) {
		// $('body').prepend('<div class="login_overlay"></div>');
		// $('form#popup-login-form').fadeIn(500);
		$('form#popup-login-form').addClass('show-login-form');
		$('div.login_overlay, form#popup-login-form a.close').on('click', function() {
			$('div.login_overlay').remove();
			$('form#popup-login-form').hide();
		});
		e.preventDefault();
	});

	// Perform AJAX login on form submit
	$('form#popup-login-form').on('submit', function(e) {
		$('form#popup-login-form p.status')
			.show()
			.text(ajax_login_object.loadingmessage);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_login_object.ajaxurl,
			data: {
				action: 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
				user_login: $('form#popup-login-form #user_login').val(),
				user_pass: $('form#popup-login-form #user_pass').val(),
				security: $('form#popup-login-form #security').val()
			},
			success: function(data) {
				$('form#popup-login-form p.status').text(data.message);
				if (data.loggedin == true) {
					// document.location.href = ajax_login_object.redirecturl;
					location.reload(true);
				}
			}
		});
		e.preventDefault();
	});

	$('#close-login-form').on('click', function(e) {
		$('#popup-login-form').hide(200);
	});
});
