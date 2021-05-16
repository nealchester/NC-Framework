// Popup per session

if (!sessionStorage.alreadyClicked) {
	jQuery('#wrapper .ncpopup_overlay').addClass('open');

	jQuery('#wrapper .ncpopup_close').click(function() {
		jQuery('#wrapper .ncpopup_overlay').removeClass('open');
	});
	sessionStorage.alreadyClicked = "true";
}