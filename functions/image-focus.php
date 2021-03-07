<?php

// For Gallery Images
function nc_image_focus($image) {

  if( function_exists('get_field') && get_field("featured_image_focus", $image) ){ 
    
    $img_focus = get_field("featured_image_focus", $image);

    return 'object-position:'.$img_focus.'; transform-origin:'.$img_focus.';'; 
  }
  else {
    return 'object-position:center; transform-origin:center;';	
  }

}

// Featured Image 
function nc_featured_image_focus() {

  if( function_exists('get_field') && get_field("featured_image_focus") ){ 
    
    $img_focus = get_field("featured_image_focus");

    return 'object-position:'.$img_focus.'; transform-origin:'.$img_focus.';'; 
  }
  else {
    return 'object-position:center; transform-origin:center;';	
  }

}
?>