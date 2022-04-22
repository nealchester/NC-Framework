// First Word selection
// https://www.jaredatchison.com/code/use-jquery-manipulate-first-last-word-element/

jQuery('.nc-first-word').html(function(){	
  var text = jQuery(this).text().split(' ');
  var first = text.shift();
  return (text.length > 0 ? '<span class="fw">'+first+'</span> ' : first) + text.join(" ");
});