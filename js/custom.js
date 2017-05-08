jQuery(document).ready(function($){

    var $title = $('.accordion__header');
    var copy   = '.accordion__content';
	var total = 0;

	// var doc = new jsPDF();
	// var moduleHtml = $('.entry-module');
	// doc.fromHTML(moduleHtml.html(), 10, 5, {});

	$('.entry-module-header').after('<a class="entry-module-button no-print">Expand All</a>');

    for(var i = 0; i < $title.length; i++) {
        var count = $($title[i]).next(copy).children().length;
		total += count;
        $title.get(i).innerHTML += '<span class="badge">' + count + (count > 1 ? ' Topics' : ' Topic') + '</span>';
    }

	$('.entry-module-count').text(total + " Topic" + (total > 1 ? "s" : ""));

    $title.click(function () {
        if(!classie.has($(this).get(0), 'accordion__header--active')) {
            classie.add($(this).get(0), 'accordion__header--active');
			$(this).next(copy).slideDown();
        } else {

            classie.remove($(this).get(0), 'accordion__header--active');
			$(this).next(copy).slideUp();
        }
        return false;
    });

	$('.entry-module-button').click(function() {

		// $('.entry-module-button')
		// 		.text(($('.entry-module-button')
		// 			.text() == "Expand All") ? "Collapse All" : "Expand All");

		if($('.entry-module-button').text() == "Expand All") {
			$(this).text("Collapse All");
			for( var i = 0; i < $title.length; i++) {
            	classie.add($title.get(i), 'accordion__header--active');
				$($title.get(i)).next(copy).slideDown();
			}
		} else {
			$(this).text("Expand All");
			for(var i = 0; i < $title.length; i++) {
            	classie.remove($title.get(i), 'accordion__header--active');
				$($title.get(i)).next(copy).slideUp();
			}
		}

		return false;
	});

	// $('.entry-module-download').click(function() {
	// 	doc.save($('.entry-title').text() + ".pdf", 'letter');
	// });
	// var card_title = $('.card-title').text();
	// if (card_title.length > 48) {
	// 	var truncated = card_title.trim().substring(0, 48) + "…";
	// 	$('.card-title').text(truncated);
	// }
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
	    }, 500);
	});

	var stickySidebar = $('.sticky');

	if (stickySidebar.length > 0) {
	  var stickyHeight = stickySidebar.height(),
	      sidebarTop = stickySidebar.offset().top;
	}

	// on scroll move the sidebar
	$(window).scroll(function () {
	  if (stickySidebar.length > 0) {
	    var scrollTop = $(window).scrollTop() + 96;

	    if (sidebarTop < scrollTop) {
	      stickySidebar.css('top', scrollTop - sidebarTop);

	      // stop the sticky sidebar at the footer to avoid overlapping
	      var sidebarBottom = stickySidebar.offset().top + stickyHeight,
	          stickyStop = $('.entry-content').offset().top + $('.entry-content').height();
	      if (stickyStop < sidebarBottom) {
	        var stopPosition = $('.entry-content').height() - stickyHeight;
	        stickySidebar.css('top', stopPosition);
	      }
	    }
	    else {
	      stickySidebar.css('top', '0');

	    }
	  }
	});

	$(window).resize(function () {
	  if (stickySidebar.length > 0) {
	    stickyHeight = stickySidebar.height();
	  }
	});

	window.addEventListener('scroll', function(e){
		var distanceY = window.pageYOffset || document.documentElement.scrollTop,
			header = document.querySelector(".header-container"),
			headerTag = document.querySelector("header"),
			shrinkOn = headerTag.offsetWidth > 1024 ?  100 : 0,
			main = document.querySelector(".site-content");
		if (distanceY > shrinkOn) {
			classie.add(headerTag, "drawer-navbar--fixed");
			classie.add(header,"header-container--smaller");
			classie.add(main, "clearfix");
		} else {
			classie.remove(headerTag, "drawer-navbar--fixed");
			classie.remove(header,"header-container--smaller");
			classie.remove(main, "clearfix");
		}
	});
});
