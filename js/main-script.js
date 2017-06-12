/*
	2016 Hadi Safari
	hadi[at]hadisafari.ir

	etuts.ir
*/

$(document).ready(function() {
	if (window.location.hash.indexOf("comment") > -1)
		$(window).scrollTop($(window.location.hash).offset().top - $("#topMenu").outerHeight());
	$(".comment-meta.commentmetadata a").click(function(e) {
		$(window).scrollTop($($(this).attr("href").substr($(this).attr("href").indexOf("#comment"))).offset().top - $("#topMenu").outerHeight());
		e.preventDefault();
	});
	$("#leftMenuToggle").click(function() {
		$(this).toggleClass("active");
		$("#leftMenu").toggleClass("active");
	});
	$("#rightMenuToggle").click(function() {
		$(this).toggleClass("active");
		$("#rightMenu").toggleClass("active");
		$('#topMenu').toggleClass('toggle-top-menu');
	});
	$('#user-menu').click(function() {
		$(this).toggleClass('active');
		$('#leftMenuToggle').toggleClass('hide');
	});
	$('#user-menu').mouseleave(function() {
		$(this).removeClass('active');
		$('#leftMenuToggle').removeClass('hide');
	});
	(function prepTopMenu() {
		function checkTopMenu() {
			if ($(window).scrollTop() > $("#header").outerHeight()) {
				$("#topMenu").addClass("block");
				$("#header").addClass("block");
			} else {
				$("#topMenu").removeClass("block");
				$("#header").removeClass("block");
			}
			if (window.matchMedia("(max-width: 736px)").matches) {
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

	function leftPadPrep() {
		if (!window.matchMedia("(max-width: 992px)").matches && $("#leftPad").length) {
			var x, flag = false;
			if (($(window).scrollTop() + $(window).height()) > $("#leftPad").offset().top + $("#leftPad").outerHeight(true) + 40) {
				x = ($(window).scrollTop() + $(window).height()) - ($("#main").offset().top + $("#leftPad").outerHeight() + 40);
				flag = true;
			}
			if ($(window).scrollTop() + $("#topMenu").outerHeight() < $("#leftPad").offset().top) {
				x = $(window).scrollTop() + $("#topMenu").outerHeight() - $("#main").offset().top - 40;
				flag = true;
			}
			if (x + $("#leftPad").outerHeight() > $("#rightPad").outerHeight()) {
				x = $("#rightPad").outerHeight() - $("#leftPad").outerHeight();
			}
			x = x > 0 ? x : 0;
			if (flag)
				$("#leftPad").css("top", x);
			console.log($("#rightPad").outerHeight() + '\n' + $("#leftPad").outerHeight() + '\n' + x);
		}
	}

	function leftPadCmtPrep() {
		if (!window.matchMedia("(max-width: 992px)").matches && $("#respond-topic-tabs").length) {
			var x, flag = false;
			if (($(window).scrollTop() + $(window).height()) > $("#respond-topic-tabs").offset().top + $("#respond-topic-tabs").outerHeight(true) + 10) {
				x = ($(window).scrollTop() + $(window).height()) - ($("#comments-section").offset().top + $(".comment-section-title").outerHeight(true) + $("#comments").outerHeight(true) + $("#respond-topic-tabs").outerHeight(true) + 10);
				flag = true;
			}
			if ($(window).scrollTop() + $("#topMenu").outerHeight() + 40 < $("#respond-topic-tabs").offset().top) {
				x = $(window).scrollTop() + $("#topMenu").outerHeight() + 40 - ($("#comments-section").offset().top + $(".comment-section-title").outerHeight(true) + $("#comments").outerHeight(true));
				flag = true;
			}
			if ($(".comment-section-title").outerHeight(true) + $("#comments").outerHeight(true) + x + $("#respond-topic-tabs").outerHeight() > $("#comments-section").outerHeight(false))
				x = $("#comments-section").outerHeight(false) - ($(".comment-section-title").outerHeight(true) + $("#comments").outerHeight(true) + $("#respond-topic-tabs").outerHeight());
			x = x > 0 ? x : 0;
			if (flag)
				$("#respond-topic-tabs").css("top", x);
		}
	}
	leftPadPrep();
	leftPadCmtPrep();
	$(window).scroll(function() {
		leftPadPrep();
		leftPadCmtPrep();
	});
	(function makeTable() {
		$(".entry-content h1").each(function() {
			$(this).data("h_level", 1);
		});
		$(".entry-content h2").each(function() {
			$(this).data("h_level", 2);
		});
		$(".entry-content h3").each(function() {
			$(this).data("h_level", 3);
		});
		$(".entry-content h4").each(function() {
			$(this).data("h_level", 4);
		});
		i = 0;
		cnt_tbl = "";
		last_level = 0;
		$heading_elems = $(".entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4");
		if ($heading_elems.length === 0)
			$('#table-of-contents').remove()
		else {
			$heading_elems.each(function() {
				i++;
				// setting id - if it already has id, do not give new id
				id = $(this).prop("id");
				if (!id) {
					id = "heading" + i;
					$(this).prop("id", id);
				}

				cur_level = $(this).data("h_level");
				// if (last_level == cur_level)
				// 	cnt_tbl += "</li>";
				// while (last_level < cur_level) {
				// 	cnt_tbl += "<ul>";
				// 	if (last_level < cur_level - 1)
				// 		cnt_tbl += "<li>";
				// 	last_level++;
				// }
				// while (last_level > cur_level) {
				// 	cnt_tbl += "</li></ul>";
				// 	last_level--;
				// }
				if (last_level == cur_level)
					cnt_tbl += "</li>";
				if (last_level < cur_level) {
					cnt_tbl += "<ul>";
				}
				if (last_level > cur_level) {
					cnt_tbl += "</li></ul>";
				}
				last_level = cur_level;
				cnt_tbl += "<li><i class=\"fa fa-angle-left\"></i><a href=\"#" + id + "\">" + $(this).text() + "</a>";
			});
			while (last_level > 0) {
				cnt_tbl += "</li></ul>";
				last_level--;
			}
			$("#table-of-contents div").html(cnt_tbl);
		}
	})();
	(function show_more_share_post_butttons() {
		$('span#show-more-share-post-butttons').click(function() {
			$('.share-post-buttons ul#more-share-links').fadeIn();
			$(this).fadeOut();
		})
	})();
	(function ajaxify_comments() {
		// Get the comment form
		var commentform = $('#commentform');
		// Add a Comment Status message
		commentform.prepend('<div id="comment-status" ></div>');
		// Defining the Status message element 
		var statusdiv = $('#comment-status');
		commentform.submit(function() {
			// Serialize and store form data
			var formdata = commentform.serialize();
			//Add a status message
			statusdiv.html('<p class="ajax-placeholder">در حال ارسال کامنت شما...</p>');
			//Extract action URL from commentform
			var formurl = commentform.attr('action');
			//Post Form with data
			$.ajax({
				type: 'post',
				url: formurl,
				data: formdata,
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					statusdiv.html('<p class="ajax-error" >خیلی سریع کامنت می فرستید!</p>');
				},
				success: function(data, textStatus) {
					// if (data == "success")
					statusdiv.html('<p class="ajax-success" >خیلی ممنون! کامنت شما ارسال شد.</p>');
					// else
					// 	statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
					commentform.find('textarea[name=comment]').val('');
				}
			});
			return false;
		});
	})();

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
var addComment = {
	moveForm: function(commId, parentId, respondId, postId) {
		var div, element, style, cssHidden,
			t = this,
			comm = t.I(commId),
			respond = t.I(respondId),
			cancel = t.I('cancel-comment-reply-link'),
			parent = t.I('comment_parent'),
			post = t.I('comment_post_ID'),
			commentForm = respond.getElementsByTagName('form')[0];

		if (!comm || !respond || !cancel || !parent || !commentForm) {
			return;
		}

		t.respondId = respondId;
		postId = postId || false;

		if (!t.I('wp-temp-form-div')) {
			div = document.createElement('div');
			div.id = 'wp-temp-form-div';
			div.style.display = 'none';
			respond.parentNode.insertBefore(div, respond);
		}

		// comm.parentNode.insertBefore( respond, comm.nextSibling );
		if (post && postId) {
			post.value = postId;
		}
		parent.value = parentId;
		cancel.style.display = '';

		cancel.onclick = function() {
			var t = addComment,
				temp = t.I('wp-temp-form-div'),
				respond = t.I(t.respondId);

			if (!temp || !respond) {
				return;
			}

			t.I('comment_parent').value = '0';
			temp.parentNode.insertBefore(respond, temp);
			temp.parentNode.removeChild(temp);
			this.style.display = 'none';
			this.onclick = null;
			return false;
		};

		/*
		 * Set initial focus to the first form focusable element.
		 * Try/catch used just to avoid errors in IE 7- which return visibility
		 * 'inherit' when the visibility value is inherited from an ancestor.
		 */
		try {
			for (var i = 0; i < commentForm.elements.length; i++) {
				element = commentForm.elements[i];
				cssHidden = false;

				// Modern browsers.
				if ('getComputedStyle' in window) {
					style = window.getComputedStyle(element);
					// IE 8.
				} else if (document.documentElement.currentStyle) {
					style = element.currentStyle;
				}

				/*
				 * For display none, do the same thing jQuery does. For visibility,
				 * check the element computed style since browsers are already doing
				 * the job for us. In fact, the visibility computed style is the actual
				 * computed value and already takes into account the element ancestors.
				 */
				if ((element.offsetWidth <= 0 && element.offsetHeight <= 0) || style.visibility === 'hidden') {
					cssHidden = true;
				}

				// Skip form elements that are hidden or disabled.
				if ('hidden' === element.type || element.disabled || cssHidden) {
					continue;
				}

				element.focus();
				// Stop after the first focusable element.
				break;
			}

		} catch (er) {}

		t.I("comment").focus();

		return false;
	},

	I: function(id) {
		return document.getElementById(id);
	}
};
