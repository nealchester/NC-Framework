<?php

// For featured images in page banners and thumbnail archives
function nc_featured_image_focus() {

  if( function_exists('get_field') && get_field("horizontal") && get_field("vertical") ){ 
    
    $img_focus = get_field("horizontal").'% '.get_field("vertical").'%';

    return 'background-position:'.$img_focus.'; transform-origin:'.$img_focus.';'; 
  }
  else {
    return 'background-position:50% 50%; transform-origin:50% 50%;';	
  }

}
?>