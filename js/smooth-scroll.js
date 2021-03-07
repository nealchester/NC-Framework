jQuery('.ncanchorscroll').on('click',function(e) {
	'use strict';
	e.preventDefault();
	var offset = 0;
	var target = this.hash;
	if (jQuery(this).data('offset') !== undefined) offset = jQuery(this).data('offset');
	jQuery('html, body').stop().animate({
		'scrollTop': jQuery(target).offset().top - offset
	}, 750, 'swing', function() {
		// window.location.hash = target;
	});
});

// Add a class "ncanchorscroll" to the link and an offset in pixels. Example below:


/*


<a class="ncanchorscroll" data-offset="50" href="#jumplink">My Scroll Link</a>


*/