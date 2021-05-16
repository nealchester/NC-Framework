//http://talkerscode.com/webtricks/create-sticky-header-using-jquery.php

jQuery(window).scroll(function() {
	if (jQuery(this).scrollTop() > 1)
	{
	 jQuery('#header').addClass("sticky-enabled");
	}
	else
	{
	 jQuery('#header').removeClass("sticky-enabled");
	}
 });
 
 /*
 
 Suggested CSS
 
 #header.sticky-enabled {
		 position: fixed (supports older browsers or you can use "sticky");
		 width:100%;
		 left:0;
		 top: -1px (necessary property and value);
 }
 
 */