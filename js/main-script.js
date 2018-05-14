/*
	2016 Hadi Safari
	hadi[at]hadisafari.ir

	and
	Vahid Mohammadi

	etuts.ir
*/
function leftPadPrep() {
	if (!window.matchMedia('(max-width: 992px)').matches && $('#leftPad').length) {
		var x,
			flag = false;
		if ($(window).scrollTop() + $(window).height() > $('#leftPad').offset().top + $('#leftPad').outerHeight(true) + 40) {
			x = $(window).scrollTop() + $(window).height() - ($('#main').offset().top + $('#leftPad').outerHeight() + 40);
			flag = true;
		}
		if ($(window).scrollTop() + $('#topMenu').outerHeight() < $('#leftPad').offset().top) {
			x = $(window).scrollTop() + $('#topMenu').outerHeight() - $('#main').offset().top - 40;
			flag = true;
		}
		if (x + $('#leftPad').outerHeight() > $('#rightPad').outerHeight()) {
			x = $('#rightPad').outerHeight() - $('#leftPad').outerHeight();
		}
		x = x > 0 ? x : 0;
		if (flag) $('#leftPad').css('top', x);
	}
}

function leftPadCmtPrep() {
	if (!window.matchMedia('(max-width: 992px)').matches && $('#respond-topic-tabs').length) {
		var x,
			flag = false;
		if (
			$(window).scrollTop() + $(window).height() >
			$('#respond-topic-tabs').offset().top + $('#respond-topic-tabs').outerHeight(true) + 10
		) {
			x =
				$(window).scrollTop() +
				$(window).height() -
				($('#comments-section').offset().top +
					$('.comment-section-title').outerHeight(true) +
					$('#comments').outerHeight(true) +
					$('#respond-topic-tabs').outerHeight(true) +
					10);
			flag = true;
		}
		if ($(window).scrollTop() + $('#topMenu').outerHeight() + 40 < $('#respond-topic-tabs').offset().top) {
			x =
				$(window).scrollTop() +
				$('#topMenu').outerHeight() +
				40 -
				($('#comments-section').offset().top + $('.comment-section-title').outerHeight(true) + $('#comments').outerHeight(true));
			flag = true;
		}
		if (
			$('.comment-section-title').outerHeight(true) + $('#comments').outerHeight(true) + x + $('#respond-topic-tabs').outerHeight() >
			$('#comments-section').outerHeight(false)
		)
			x =
				$('#comments-section').outerHeight(false) -
				($('.comment-section-title').outerHeight(true) + $('#comments').outerHeight(true) + $('#respond-topic-tabs').outerHeight());
		x = x > 0 ? x : 0;
		if (flag) $('#respond-topic-tabs').css('top', x);
	}
}

function ajaxify_form($theform, error_text, success_text) {
	$theform.submit(function() {
		// Add a Comment Status message
		var statusdiv = $('#comment-status');
		if (!statusdiv.length) {
			$theform.prepend('<div id="comment-status" class="post-list-item inside-block"></div>');
			statusdiv = $('#comment-status');
		}
		// Defining the Status message element
		// Serialize and store form data
		var formdata = $theform.serialize();
		//Add a status message
		statusdiv.html('<p class="ajax-placeholder">در حال ارسال...</p>');
		//Extract action URL from $theform
		var formurl = $theform.attr('action');
		//Post Form with data
		$.ajax({
			type: 'post',
			url: formurl,
			data: formdata,
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$errorMessage = XMLHttpRequest.responseJSON;
				statusdiv.html(
					'<p class="ajax-error">' + $errorMessage.message
						? $errorMessage.message
						: errorThrown ? errorThrown : error_text + '</p>'
				);
			},
			success: function(data, textStatus) {
				// if (data == "success")
				statusdiv.html('<p class="ajax-success">' + success_text + '</p>');
				// else
				// 	statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
				$theform.find('textarea').val('');
			}
		});
		return false;
	});
}

$(document).ready(function() {
	if (window.location.hash.indexOf('comment') > -1)
		$(window).scrollTop($(window.location.hash).offset().top - $('#topMenu').outerHeight());
	$('.comment-meta.commentmetadata a').click(function(e) {
		$(window).scrollTop(
			$(
				$(this)
					.attr('href')
					.substr(
						$(this)
							.attr('href')
							.indexOf('#comment')
					)
			).offset().top - $('#topMenu').outerHeight()
		);
		e.preventDefault();
	});
	$('#leftMenuToggle').click(function() {
		$(this).toggleClass('active');
		$('#leftMenu').toggleClass('active');
	});
	$('#rightMenuToggle').click(function() {
		$(this).toggleClass('active');
		$('#rightMenu').toggleClass('active');
		$('#topMenu').toggleClass('toggle-top-menu');
	});
	$('#user-menu').click(function() {
		$(this).toggleClass('active');
		$('#leftMenuToggle').toggleClass('hide');
	});
	$(document).click(function(event) {
		if (!$(event.target).closest('#user-menu').length) {
			var $userMenu = $('#user-menu');
			if ($userMenu.is(':visible')) {
				$userMenu.removeClass('active');
				$('#leftMenuToggle').removeClass('hide');
			}
		}
	});
	/* $('#user-menu').mouseleave(function() {
		$(this).removeClass('active');
		$('#leftMenuToggle').removeClass('hide');
	}); */
	(function prepTopMenu() {
		function checkTopMenu() {
			if ($(window).scrollTop() > $('#header').outerHeight()) {
				$('#topMenu').addClass('block');
				$('#header').addClass('block');
			} else {
				$('#topMenu').removeClass('block');
				$('#header').removeClass('block');
			}
			if (window.matchMedia('(max-width: 736px)').matches) {
				$('#topMenu').addClass('block');
				$('#rightMenuToggle').addClass('show-right-menu-toggle');
			} else {
				$('#rightMenuToggle').removeClass('show-right-menu-toggle');
			}
		}
		checkTopMenu();
		$(window).scroll(function() {
			checkTopMenu();
		});
	})();

	leftPadPrep();
	leftPadCmtPrep();
	$(window).scroll(function() {
		leftPadPrep();
		leftPadCmtPrep();
	});

	// table of contents
	(function makeTable() {
		// add level of headings to the headings
		$('.entry-content h1')
			.not('.symple-toggle-trigger')
			.each(function() {
				$(this).data('h_level', 1);
			});
		$('.entry-content h2')
			.not('.symple-toggle-trigger')
			.each(function() {
				$(this).data('h_level', 2);
			});
		$('.entry-content h3')
			.not('.symple-toggle-trigger')
			.each(function() {
				$(this).data('h_level', 3);
			});
		$('.entry-content h4')
			.not('.symple-toggle-trigger')
			.each(function() {
				$(this).data('h_level', 4);
			});
		i = 0;
		cnt_tbl = '';
		last_level = 0;
		// get all headings
		$heading_elems = $(
			'.entry-content h1:not(.symple-toggle-trigger), .entry-content h2:not(.symple-toggle-trigger), .entry-content h3:not(.symple-toggle-trigger), .entry-content h4:not(.symple-toggle-trigger)'
		);
		if ($heading_elems.length === 0) $('#table-of-contents').remove();
		else {
			$heading_elems.each(function() {
				i++;
				// setting id - if it already has id, do not give new id
				id = $(this).prop('id');
				if (!id) {
					id = 'heading' + i;
					$(this).prop('id', id);
				}

				cur_level = $(this).data('h_level');

				if (last_level == cur_level) cnt_tbl += '</li>';
				if (last_level < cur_level) {
					cnt_tbl += '<ul>';
				}
				if (last_level > cur_level) {
					cnt_tbl += '</li></ul>';
				}
				last_level = cur_level;
				cnt_tbl += '<li><i class="fa fa-angle-left"></i><a href="#' + id + '">' + $(this).text() + '</a>';
			});
			while (last_level > 0) {
				cnt_tbl += '</li></ul>';
				last_level--;
			}
			$('#table-of-contents div').html(cnt_tbl);
		}
	})();
	(function show_more_share_post_butttons() {
		$('span#show-more-share-post-butttons').click(function() {
			$('.share-post-buttons ul#more-share-links').fadeIn();
			$(this).fadeOut();
		});
	})();

	// ajaxify quick report widget
	ajaxify_form($('#quick-report-form'), 'خطا! متاسفانه پیام تان ارسال نشد', 'بسیار سپاسگذاریم از پیام تان.');
	// add comment form
	ajaxify_form($('#commentform'), 'خیلی سریع کامنت می فرستید!', 'خیلی ممنون! کامنت شما ارسال شد.');

	// post-type tabs selecting
	$('#post-type-tabs label').click(function() {
		$('#post-type-tabs label.post-type-tab-active').toggleClass('post-type-tab-active');
		$(this).toggleClass('post-type-tab-active');
		$('#send-post-container').show();
		if ($(this).attr('id') == 'post_type-post') {
			$('#user-stories-list').hide();
			$('#user-posts-list').show();
			$('#post-format-radio').show();
		} else if ($(this).attr('id') == 'post_type-story') {
			$('#user-stories-list').show();
			$('#user-posts-list').hide();
			$('#post-format-radio').hide();
		}
	});
});
