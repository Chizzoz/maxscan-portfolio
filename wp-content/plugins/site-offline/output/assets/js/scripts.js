
function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if(element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if($(window).scrollTop() != scroll_to) {
		jQuery('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}


jQuery(document).ready(function() {
	
	/*
	    Navigation
	*/
	jQuery('a.scroll-link').on('click', function(e) {
		e.preventDefault();
		scroll_to($(this), $('nav').height());
	});
	// show/hide menu
	jQuery('.show-menu a').on('click', function(e) {
		e.preventDefault();
		jQuery(this).fadeOut(100, function(){ jQuery('nav').slideDown(); });
	});
	jQuery('.hide-menu a').on('click', function(e) {
		e.preventDefault();
		jQuery('nav').slideUp(function(){ jQuery('.show-menu a').fadeIn(); });
	});	
	
   
    /*
        Wow
    */
    new WOW().init();
    
   
	/*
	    Animate scroll arrows
	*/
	jQuery('.scroll-page a').on('mouseover', function(){
		jQuery(this).addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			jQuery(this).removeClass('animated bounce');
		});
	});
	
	
    
});


jQuery(window).load(function() {
	
	/*
		Loader
	*/
	jQuery(".loader-img").fadeOut();
	jQuery(".loader").delay(1000).fadeOut("slow");
	
	/*
		Modal images
	*/
	jQuery(".modal-body img").attr("style", "width: auto !important; height: auto !important;");
	
});

