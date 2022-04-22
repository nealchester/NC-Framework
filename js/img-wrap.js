		// Automatic wrap images with class name 'imagewrap' to apply inline styles.

		jQuery( ".imagewrap" ).each(function(index) {
			'use strict';
			var source = jQuery( ".imagewrap" ).attr( "src" );
			jQuery( this ).css( "shape-outside", "url(" + source + ")" );
		});