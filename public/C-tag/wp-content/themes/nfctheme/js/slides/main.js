var timer = null, timer2 = null;
MAIN = {
	
	init : function () {
	
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

		$("#rigthbutton1").click(function() {$('body,html').stop().animate({scrollTop: 0}, 2000); });
		$("#rigthbutton2").click(function() {$('body,html').stop().animate({scrollTop: 1000}, 2000); });
		$("#rigthbutton3").click(function() {$('body,html').stop().animate({scrollTop: 4000}, 2000); });
		$("#rigthbutton4").click(function() {$('body,html').stop().animate({scrollTop: 7500}, 2000); });
		$("#rigthbutton5").click(function() {$('body,html').stop().animate({scrollTop: 10200}, 2000); });
		$("#rigthbutton6").click(function() {$('body,html').stop().animate({scrollTop: 11700}, 2000); });
		$("#rigthbutton7").click(function() {$('body,html').stop().animate({scrollTop: 16300}, 2000); });
		$("#rigthbutton8").click(function() {$('body,html').stop().animate({scrollTop: 19500}, 2000); });
		$("#rigthbutton9").click(function() {$('body,html').stop().animate({scrollTop: 21500}, 2000); });

		$(window).scroll(function() {    
		    var scroll = $(window).scrollTop();

		    if (scroll <= 1000) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton1").addClass("active");
		    }
		    if (scroll >= 1000) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton2").addClass("active");
		    }
		    if (scroll >= 4000) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton3").addClass("active");
		    }
		    if (scroll >= 7500) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton4").addClass("active");
		    }
		    if (scroll >= 10200) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton5").addClass("active");
		    }
		    if (scroll >= 11700) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton6").addClass("active");
		    }
		    if (scroll >= 16300) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton7").addClass("active");
		    }
		    if (scroll >= 19500) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton8").addClass("active");
		    }
		    if (scroll >= 21500) {
		        $("#nav a").removeClass("active");
		        $("#rigthbutton9").addClass("active");
		    }
		});
		
		$('#top-menu .dropdown-list').on('mouseleave', function () {
			var self = this;			
			timer = setTimeout(function () {
				$("#top-menu .dropdown-list").removeClass('active');
			}, 500);
				
		});
//		
//		$.stellar({
//			horizontalScrolling: false,
//			verticalOffset: 40
//		});
		
	},
	
	parallaxHeight : function () {
		var pContentHeight = $(window).height();
		$('.parallax-content').height(pContentHeight - 400);
	}
}


$(function () {
	
	MAIN.init();
	MAIN.parallaxHeight();
	
	$(window).resize(function () {
		MAIN.parallaxHeight();
	});
	
	$(window).scroll(function () {
		console.log($(window).scrollTop());
	});
	
	
	
});