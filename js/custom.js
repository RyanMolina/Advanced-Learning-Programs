jQuery(document).ready(function($){
	
	// ===== Scroll to Top ====
	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	        $('#return-to-top').fadeIn(200);    // Fade in the arrow
	    } else {
	        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
	    }
	});
	$('#return-to-top').click(function() {      // When arrow is clicked
	    $('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 300);
	});


	$('#sidebar').stick_in_parent(); // sticky-kit.js


	// === Sticky Header===
	$(window).on('scroll', function(){
		var distanceY = $(this).scrollTop(),
			header = $(".header-container"),
			headerTag = $("#masthead"),
			shrinkOn = $(this).innerWidth() >= 1024 ?  100 : 0,
			main = $(".site-content");
		if (distanceY > shrinkOn) {
			headerTag.addClass("drawer-navbar--fixed");
			header.addClass("header-container--smaller");
			main.addClass("clearfix");
		} else {
			headerTag.removeClass( "drawer-navbar--fixed");
			header.removeClass("header-container--smaller");
			main.removeClass("clearfix");
		}
	});


	$('.drawer').drawer();


	$('form.search').submit(function(e) {
		if($('#s').val().length < 1) {
			var search = document.getElementById('search');
			setTimeout(function() {
				search.classList.remove('loading');
			}, 100);
			e.preventDefault();
		}
	});


	var search = $('#search');
	var button = $('#search_submit');
	var input = $('#s');

	button.click(loading);
	input.keydown(function() {
		if(event.keyCode == 13) {
			loading();
		}
	});

	function loading() {
		search.addClass('loading');
	}


	var originalInputSelector = $.fn.validator.Constructor.INPUT_SELECTOR
	$.fn.validator.Constructor.INPUT_SELECTOR = originalInputSelector + ', input[data-recaptcha]'
	window.verifyRecaptchaCallback = function (response) {
		$('input[data-recaptcha]').val(response).trigger('change')
	}

	window.expiredRecaptchaCallback = function () {
		$('input[data-recaptcha]').val("").trigger('change')
	}

	$('form[data-toggle="validator"]').validator({
			custom: {
				recaptcha: function ($el) {
					if (!$el.val()) {
						return "Please complete the captcha"
					}
				}
			}
	})


});


function hideAlert() {
	$('.alert').hide();
}