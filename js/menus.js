/* 
Accessible Drop Down Menus. 
This make the drop menus accessible allowing users on 
keyboards to reveal the drop menus and tab through on screen.
*/

jQuery(function () {
	jQuery('.menu-item-has-children a').focus(function () {
		jQuery(this).siblings('.sub-menu').addClass('focused');
	}).blur(function () {

		jQuery(this).siblings('.sub-menu').removeClass('focused');
	});

	// Sub Menu
	jQuery('.sub-menu a').focus(function () {
		jQuery(this).parents('.sub-menu').addClass('focused');
	}).blur(function () {
		jQuery(this).parents('.sub-menu').removeClass('focused');
	});
});


/*  
Close or hide the mobile menu after clicking item. 
Works best for one-pagers
*/

jQuery(".mpanel .menu-item:not(.menu-item-has-children) a").click(function(){
	jQuery("#mpanel").prop("checked", false);
});



/* 
Make drop-down menus on mobile devices touch-friendly
https://osvaldas.info/drop-down-navigation-responsive-and-touch-friendly
*/

!function(t,n,o,i){
'use strict';			
t.fn.doubleTapToGo=function(i){return"ontouchstart"in n||navigator.msMaxTouchPoints||navigator.userAgent.toLowerCase().match(/windows phone os 7/i)?(this.each(function(){var n=!1;t(this).on("click",function(o){var i=t(this);i[0]!=n[0]&&(o.preventDefault(),n=i)}),t(o).on("click touchstart MSPointerDown",function(o){for(var i=!0,a=t(o.target).parents(),e=0;e<a.length;e++)a[e]==n[0]&&(i=!1);i&&(n=!1)})}),this):!1}}(jQuery,window,document);
jQuery( '.navmenu .menu-item-has-children:has(ul), .ncgallery_link' ).doubleTapToGo();		