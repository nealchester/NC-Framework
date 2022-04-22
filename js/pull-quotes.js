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