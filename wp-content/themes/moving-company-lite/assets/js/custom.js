jQuery(function($){
 "use strict";
   jQuery('.main-menu > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function menu_openNav() {
	document.getElementById("mySidenav").style.top ="0";
}
function menu_closeNav() {
  document.getElementById("mySidenav").style.top = "-110%";
}

(function( $ ) {

	// makes sure the whole site is loaded
	jQuery(window).load(function() {
        // will first fade out the loading animation
	    jQuery("#status").fadeOut();
	        // will fade out the whole DIV that covers the website.
	    jQuery("#preloader").delay(1000).fadeOut("slow");
	})

	$(window).scroll(function(){
	  var sticky = $('.header-sticky'),
	      scroll = $(window).scrollTop();

	  if (scroll >= 100) sticky.addClass('header-fixed');
	  else sticky.removeClass('header-fixed');
	});

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
		$('.search-box span i').click(function(){
	        $(".serach_outer").slideDown(1000);
	    });

	    $('.closepop i').click(function(){
	        $(".serach_outer").slideUp(1000);
	    });
	});

	$(document).ready(function () {

		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});

	});

})( jQuery );