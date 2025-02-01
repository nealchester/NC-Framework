<?php 

if ( function_exists('get_field') && has_post_thumbnail() && is_home() ) {
  $thumbnail = get_option( 'page_for_posts' );

  if ( get_field("horizontal", $thumbnail) && get_field("vertical", $thumbnail) ) {
    $positions = 'background-position:'.get_field("horizontal", $thumbnail).'% '.get_field("vertical", $thumbnail).'%';
  }
  else {
    $positions = 'background-position:50% 50%';
  };

  $img_desc  = '';	
  $image_url = get_the_post_thumbnail_url($thumbnail);
  $image_bg = 'style="background-image:url('.$image_url.'); '.$positions.'"';
}

elseif ( has_post_thumbnail() && !is_home() ) {
  $thumbnail = get_post( get_post_thumbnail_id() );
  $img_desc  = 'role="img" aria-label="'.get_post_meta($thumbnail->ID, '_wp_attachment_image_alt', true ).'"';	
  $image_url = get_the_post_thumbnail_url();
  $image_bg = 'style="background-image:url('.$image_url.'); '.nc_featured_image_focus().'"';
}

else {
  $thumbnail = '';
  $img_desc = '';
  $image_url = nc_fallbackimage();
  $image_bg = 'style="background-image:url('.$image_url.'); '.nc_featured_image_focus().'"';
}

?>

<div class="banner">
  <div class="banner_image" <?php echo $image_bg.' '.$img_desc;?>></div>
  <div class="banner_content ncontain">
    <?php get_template_part('parts/headings');?>
  </div>
</div>