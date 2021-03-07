// Standard Scripts


/* 
Accessible Drop Down Menus. 
This make the drop menus accessible allowing users on 
keyboards to reveal the drop menus and tab through on screen.
*/

jQuery(function() {
  jQuery('.menu-item-has-children a').focus( function () {
    jQuery(this).siblings('.sub-menu').addClass('focused');
  }).blur(function(){
    jQuery(this).siblings('.sub-menu').removeClass('focused');
  });
 
	// Sub Menu
	jQuery('.sub-menu a').focus( function () {
		jQuery(this).parents('.sub-menu').addClass('focused');
		}).blur(function(){
			jQuery(this).parents('.sub-menu').removeClass('focused');
		});
	});


		//  Close menu upon clicking item

		jQuery(".mpanel .menu-item:not(.menu-item-has-children) a").click(function(){
			jQuery("#mpanel").prop("checked", false);
		});

		// Double Click 

		// https://osvaldas.info/drop-down-navigation-responsive-and-touch-friendly

		!function(t,n,o,i){
			'use strict';			
			t.fn.doubleTapToGo=function(i){return"ontouchstart"in n||navigator.msMaxTouchPoints||navigator.userAgent.toLowerCase().match(/windows phone os 7/i)?(this.each(function(){var n=!1;t(this).on("click",function(o){var i=t(this);i[0]!=n[0]&&(o.preventDefault(),n=i)}),t(o).on("click touchstart MSPointerDown",function(o){for(var i=!0,a=t(o.target).parents(),e=0;e<a.length;e++)a[e]==n[0]&&(i=!1);i&&(n=!1)})}),this):!1}}(jQuery,window,document);

		jQuery( '.navmenu .menu-item-has-children:has(ul), .ncgallery_link' ).doubleTapToGo();


		// First Word selection
		// https://www.jaredatchison.com/code/use-jquery-manipulate-first-last-word-element/

		jQuery(function($){
		// First word in title
		$('.nc-first-word').html(function(){	
		var text = $(this).text().split(' ');
		var first = text.shift();
		return (text.length > 0 ? '<span class="fw">'+first+'</span> ' : first) + text.join(" ");
		});
		});		


		// Automatic wrap images with class name 'imagewrap' to apply inline styles.

		jQuery( ".imagewrap" ).each(function() {
			'use strict';
			var source = jQuery( ".imagewrap" ).attr( "src" );
			jQuery( this ).css( "shape-outside", "url(" + source + ")" );
		});


		// Wrap gravity form (plugin) because they add CSS that conflicts with positioning 

		jQuery( ".gform_wrapper" ).wrap( "<div class='gform_wrapper_outer'></div>" );	
		

		/*
		// PullQuotes

			jQuery('span.pull-right').each(function(index) { 
			'use strict';
			var $parentParagraph = jQuery(this).parent('p'); 
			$parentParagraph.css('position', 'relative'); 
			jQuery(this).clone() 
				.addClass('pulled-right') 
				.prependTo($parentParagraph); 
			}); 

			jQuery('span.pull-left').each(function(index) { 
			'use strict';
			var $parentParagraph = jQuery(this).parent('p'); 
			$parentParagraph.css('position', 'relative'); 
			jQuery(this).clone() 
				.addClass('pulled-left') 
				.prependTo($parentParagraph); 
			});
	
		*/

		// Tabs
		jQuery('.tabs_labels > li').on('click',function(){
			'use strict';
			var tab_id = jQuery(this).attr('data-tab');
			jQuery('.tabs_labels > li').removeClass('current');
			jQuery('.tabs_content > div').removeClass('current');
			jQuery(this).addClass('current');
			jQuery("#"+tab_id).addClass('current');

		})		


		// Accordion

		jQuery( ".nccordion_header, .schema-faq-question" ).on('click',function() {
		  'use strict';			
		  jQuery( this ).toggleClass( "active" );
		});	
		
		

		// Responsive Videos

	   	// from: http://willrees.com/2015/02/responsive-youtube-oembeds-in-wordpress/

		/*
		var $all_oembed_videos = jQuery("iframe[src*='youtube'], iframe[src*='vimeo'], iframe[src*='videopress']");
		$all_oembed_videos.each(function() {
			'use strict';
			jQuery(this).removeAttr('height').removeAttr('width').wrap( "<div class='videocontain'></div>" );
 		});	
		*/
			
		// Responsive Tables
		/* 
		var $all_wp_table_blocks = jQuery(".ncontent_main > .wp-block-table");

		$all_wp_table_blocks.each(function() {
			'use strict';
			jQuery(this).wrap( "<div class='wp-block-table-container'></div>" );
		 });	
		 */
		 

		// Wrap WordPress Cover Block for left/right styling	 

		var $all_wp_cover_blocks = jQuery(".ncontent_main > .wp-block-cover.alignleft, .ncontent_main > .wp-block-cover.alignright");

		$all_wp_cover_blocks.each(function() {
			'use strict';
			jQuery(this).wrap( "<div class='wp-block-cover-container'></div>" );
		 });			