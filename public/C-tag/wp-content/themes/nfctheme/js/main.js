var timer = null, timer2 = null;
MAIN = {

	init : function () {

		$(".send-btn").click(function () {
		window.location.href = $('.searchbox').val() + "-arama-kelimesi.bkm";
	    });

		$("#orange-btn").click(function () {

			$(this).toggleClass('down')

			if ($(this).hasClass('down')) {
				$('#bottom-menu').removeClass('closed');
				$('#bottom-menu').addClass('opened');
				$('#bottom-menu.opened').animate({ height: "365px"}, 300 );
				$('.overlay').show();
			}
			else {
				$('#bottom-menu').removeClass('opened');
				$('#bottom-menu').addClass('closed');
				$('#bottom-menu.closed').animate({ height: "70px"}, 300 );
				$('.overlay').hide();
			}

		});

		$('.overlay').click(function () {
			$('#orange-btn').removeClass('down')
			$('#bottom-menu').removeClass();
			$('#bottom-menu').animate({ height: "70px"}, 300 );
			$(this).hide();
		});

		//$('#top-menu nav:eq(0) a:eq(5)').attr('class', 'various').attr('href', '/apps/login.aspx').attr('data-fancybox-type', 'iframe');

		$(".various").fancybox({
			maxWidth	: 1000,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});

//		$('#top-menu .dropdown-list').click(function () {
//			$('#top-menu .dropdown-list').removeClass('active');
//			$(this).toggleClass('active');
//			$(this).children('.menu-dropdown a').fadeToggle();
//		});


		$('#top-menu .dropdown-list').on('mouseover', function () {
			var self = this;
			if($("#top-menu .dropdown-list").hasClass('active') == false){
				$(self).addClass('active');
			}
			if (timer !== null) {
				clearTimeout(timer);
			}
			if (timer2 !== null) {
				clearTimeout(timer2);
			}
			timer2 = setTimeout(function () {
				$("#top-menu .dropdown-list").removeClass('active');
				$(self).addClass('active');
			}, 400);
		});

		$('#top-menu .dropdown-list').on('mouseleave', function () {
			var self = this;
			timer = setTimeout(function () {
				$("#top-menu .dropdown-list").removeClass('active');
			}, 500);

		});

		$('.carousel').carousel({
	      interval: 4000
	    });

	    $('#r-btn').click(function () {
	    	$('#r-menu').slideToggle();
	    });

	    var mtitle = $('#sidebar > h3').text();
	    $('.d-drop a span:nth-child(1)').text(mtitle);

	    var mdrop = $('#sidebar .list-menu').html();
	    $('.d-drop .dropdown-menu').html(mdrop);

			/*var mlink1 = $('#top-menu .dropdown-list').eq(0).children('a').children('span').html();
	    var mlink2 = $('#top-menu .dropdown-list').eq(1).children('a').children('span').html();
	    var mlink3 = $('#top-menu .dropdown-list').eq(2).children('a').children('span').html();
	    var mlink4 = $('#top-menu .dropdown-list').eq(3).children('a').children('span').html();
	    var mlink5 = $('#top-menu .dropdown-list').eq(4).children('a').children('span').html();

	    var mlink1a = $('#top-menu .dropdown-list').eq(0).children('a').attr('href');
	    var mlink2a = $('#top-menu .dropdown-list').eq(1).children('a').attr('href');
	    var mlink3a = $('#top-menu .dropdown-list').eq(2).children('a').attr('href');
	    var mlink4a = $('#top-menu .dropdown-list').eq(3).children('a').attr('href');
	    var mlink5a = $('#top-menu .dropdown-list').eq(4).children('a').attr('href');

	    $('#r-menu .m-menu-link').eq(0).text(mlink1).attr('href', mlink1a);
	    $('#r-menu .m-menu-link').eq(1).text(mlink2).attr('href', mlink2a);
	    $('#r-menu .m-menu-link').eq(2).text(mlink3).attr('href', mlink3a);
	    $('#r-menu .m-menu-link').eq(3).text(mlink4).attr('href', mlink4a);
	    $('#r-menu .m-menu-link').eq(4).text(mlink5).attr('href', mlink5a);*/



//		$('#top-menu .dropdown-list').on('mouseover', function () {
//			$(this).addClass('active');
//		});
//
//		$('#top-menu .dropdown-list').on('mouseleave', function () {
//			var self = this;
//			$(self).removeClass('active');
//			setTimeout(function () {
//
//			}, 500)
//
//		});

		//$('#single-content').height($('#single-content').height());

//	    Cufon.replace('#top-menu, .menu-dropdown, h3, p, span, h2, h1, a, .article-area', { fontFamily: 'AvenirNextC', hover: true });

	},

	accordion : function () {
		$(".accordion").accordion({collapsible: true, heightStyle: "content", active: false});
	},

	stickySidebar : function () {
		$("#sidebar").sticky({ topSpacing: 0 });
	},

	fancy : function () {
		$(".fancybox").fancybox({
	        openEffect: 'none',
	        closeEffect: 'none'
	    });
	},

	iframeBox : function () {
		$(".various").fancybox({
			maxWidth: 800,
			maxHeight: 600,
			fitToView: false,
			width: '70%',
			height: '70%',
			autoSize: false,
			closeClick: false,
			openEffect: 'none',
			closeEffect	: 'none'
		});
	},
	autoFancy : function () {
		$("#hidden-link").fancybox({
			wrapCSS : 'fancy-custom',
			maxWidth: 600,
			maxHeight: 600,
			minWidth: 600,
			minHeight: 400,
			fitToView: false,
			width: '600px',
			height: '70%',
			autoSize: false,
			closeClick: false,
			openEffect: 'none',
			closeEffect	: 'none',
			afterShow: function(){
                            var pdf = $(this.element).attr('pdf');
														if(pdf)	$('.fancy-custom').append("<div class='l-set'><a class='pdf-btn' href='"+pdf+"' target='_blank'></a><!--<div class='share-title'></div><a class='twitter-btn' href='#'></a><a class='facebook-btn' href='#'></a><a class='google-btn' href='#'></a></div>-->");
			}
		});

	}
}


$(function () {

	MAIN.init();

});


//(function () {
//    if (!window.console) {
//        window.console = {};
//    }
//    // union of Chrome, FF, IE, and Safari console methods
//    var m = [
//        "log", "info", "warn", "error", "debug", "trace", "dir", "group",
//        "groupCollapsed", "groupEnd", "time", "timeEnd", "profile", "profileEnd",
//        "dirxml", "assert", "count", "markTimeline", "timeStamp", "clear"
//    ];
//    // define undefined methods as noops to prevent errors
//    for (var i = 0; i < m.length; i++) {
//        if (!window.console[m[i]]) {
//            window.console[m[i]] = function () { };
//        }
//    }
//})();
//
//var isMobile = {
//    Android: function () {
//        return navigator.userAgent.match(/Android/i);
//    },
//    BlackBerry: function () {
//        return navigator.userAgent.match(/BlackBerry/i);
//    },
//    iOS: function () {
//        //return navigator.userAgent.match(/iPhone|iPad|iPod/i);
//        return navigator.userAgent.match(/iPhone|iPod/i);
//
//    },
//    Opera: function () {
//        return navigator.userAgent.match(/Opera Mini/i);
//    },
//    Windows: function () {
//        return navigator.userAgent.match(/IEMobile/i);
//    },
//    any: function () {
//        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
//    }
//};
//
//
//if (isMobile.any()) {
//
//
//}
//
//else {
//	Cufon.replace('#top-menu, .menu-dropdown, h3, p, span, h2, h1, a, .article-area', { fontFamily: 'AvenirNextC', hover: true });
//}
