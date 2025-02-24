<?php 

// Alt text on an image by ID 
function nc_wp_img_alt($image_id){ 
  $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
  if( $alt ) { return $alt; } else { return null; }
}

// Get the title of the image by ID
function nc_wp_img_title($image_id){ 
  $title = get_post_field( 'post_title', $image_id );
  if( $title ) { return $title; } else { return null; }
}

// Get the caption of the image by ID
function nc_wp_img_caption($image_id){ 
  $caption = get_post_field( 'post_excerpt', $image_id );
  if( $caption ) { return $caption; } else { return null; }
}

// Get the description of the image by ID
function nc_wp_img_desc($image_id){ 
  $desc = get_post_field( 'post_content', $image_id );
  if( $desc ) { return $desc; } else { return null; }
}