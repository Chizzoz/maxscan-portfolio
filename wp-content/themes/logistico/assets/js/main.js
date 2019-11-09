(function($) {
"use strict";

/*------------------------------------------------------------------
[Table of contents]

1. CUSTOM PRE DEFINE FUNCTION
2. MEANMENU INIT JS
3. DROPDOWN MENU RIGHT SIDE CUT FIXED

-------------------------------------------------------------------*/



/*--------------------------------------------------------------
1. CUSTOM PRE DEFINE FUNCTION
------------------------------------------------------------*/
/* is_exist() */
jQuery.fn.is_exist = function(){
  return this.length;
}

$(function(){


/*--------------------------------------------------------------
2. MEANMENU INIT JS
--------------------------------------------------------------*/
// var lgtico_menu = $('.lgtico-menu');
// if ( lgtico_menu.is_exist()) {
//   lgtico_menu.meanmenu({
//     meanMenuContainer: '.lgtico-nav-wrap',
//     meanScreenWidth: "991"
//   });
// }


/*--------------------------------------------------------------
3. DROPDOWN MENU RIGHT SIDE CUT FIXED
--------------------------------------------------------------*/
$("#primary-menu li").on('mouseenter mouseleave', function (e) {
  if ($('ul', this).length) {
    // alert('55');
      var elm = $('ul.sub-menu', this);
      var off = elm.offset();
      var l = off.left;
      var w = elm.width();
      var docH = $(window).height();
      var docW = $(window).width();

      var isEntirelyVisible = (l + w <= docW);

      if (!isEntirelyVisible) {
          $(this).addClass('edge-submenu');
      } else {
          $(this).removeClass('edge-submenu');
      }
  }
});

});/*End document ready*/


})(jQuery);






