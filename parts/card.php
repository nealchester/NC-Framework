<?php 
/* Variables and conditions */

// Post ID
  $post_unid = 'id="post-'.get_the_ID().'"';
// Post Link
  $ismore = @strpos( $post->post_content, '<!--more-->');
  if($ismore){ 
    $postlink = get_the_permalink().'#more-'.get_the_ID();
  } 
  else { 
    $postlink = get_the_permalink();
  }

// Post Thumbnail  
  $post_thumbnail = get_the_post_thumbnail( $post->ID, 'medium', 
    array( "class" => "lcard_img", "style" => nc_featured_image_focus() 
  ));

  if($post_thumbnail) {
    $post_thumbnail_block = '<div class="lcard_imgcon">'.$post_thumbnail.'</div>';
  } 
  else {
    $post_thumbnail_block ='<div class="lcard_imgcon"><img class="lcard_img" src="'.nc_fallbackimage().'" alt="default image" /></div>';
  };

// Post Date
  $post_time = get_the_time(get_option('date_format'));

// Post Description
  if($ismore){
  $post_desc = strip_tags(get_the_content('')).'<span class="lcard_ell">&hellip;</span> <span class="nowrap lcard_readmore">'.__('Continue reading','nc-framework').'</span>';
  }
  elseif (has_excerpt()){
    $post_desc =  get_the_excerpt();
  }
  else {
    $post_desc = wp_trim_words( get_the_excerpt(), 20,'<span class="lcard_ell">&hellip;</span> ').'<span class="nowrap lcard_readmore">'.__('Read More','nc-framework').'</span>';
  };

?>

<div <?php post_class('lcard') ?>>

  <?php echo $post_thumbnail_block; ?>

  <div class="lcard_text">
    <div class="lcard_title"><?php the_title();?></div>
    <div class="lcard_meta"><?php echo $post_time; ?></div>
    <div class="lcard_desc"><?php echo $post_desc; ?></div>
  </div>

  <a class="lcard_link" href="<?php echo $postlink;?>"></a>
</div>