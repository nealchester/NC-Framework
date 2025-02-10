// Second click

jQuery(document).ready(function() {

  jQuery('.page_item_has_children > a').on('click', function(event) {
  
      var $anchor = jQuery(this);
      var clickCount = $anchor.data('click-count') || 0;
      clickCount++;
      $anchor.data('click-count', clickCount);
      
      if (clickCount < 2) {
          event.preventDefault();
          // Prevent default behavior on first click
          return false;
      }
  
  });

});