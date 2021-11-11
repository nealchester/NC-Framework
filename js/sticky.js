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