		// Tabs
		jQuery('.tabs_labels > li').on('click',function(){
			'use strict';
			var tab_id = jQuery(this).attr('data-tab');
			jQuery('.tabs_labels > li').removeClass('current');
			jQuery('.tabs_content > div').removeClass('current');
			jQuery(this).addClass('current');
			jQuery("#"+tab_id).addClass('current');

		})