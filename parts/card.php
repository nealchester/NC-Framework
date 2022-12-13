<?php $ismore = @strpos( $post->post_content, '<!--more-->');?>

<div id="post-<?php the_ID(); ?>" <?php post_class('lcard') ?>>
  <a class="lcard_link" href="<?php if($ismore){ the_permalink(); echo'#more-'; the_ID();} else { the_permalink();};?>">
    <div class="lcard_container">
      <div class="lcard_image<?php if(!get_the_post_thumbnail($post->ID)) { echo' lcard_noimage';} ?>">
      <?php if(get_the_post_thumbnail($post->ID)):?>
        <div class="lcard_imgcon">
          <?php echo get_the_post_thumbnail( $post->ID, 'large', array( "class" => "lcard_img", "style" => nc_featured_image_focus() ) ); ?>
        </div>
      <?php else:?>
        <div class="lcard_imgcon">
          <img class="lcard_img" src="<?php nc_fallbackimage(); ?>" alt="default image" />
        </div>	
      <?php endif; ?>	
      </div>
      <div class="lcard_text">
        <!-- Everything in here is up to the creator -->
        <div class="lcard_title"><?php the_title();?></div>
        <div class="lcard_meta"><?php the_time(get_option('date_format')); ?> | <?php comments_number( 
          __('No Comments','nc-framework'), 
          __('1 Response','nc-framework'), 
          __('% Responses','nc-framework'), 
          ); ?></div>
        <div class="lcard_desc"><?php $ismore = @strpos( $post->post_content, '<!--more-->'); if($ismore):?><?php echo strip_tags(get_the_content(''));?><span class="lcard_ell">&hellip;</span> <span class="nowrap lcard_readmore"><?php _e('Continue reading','nc-framework');?></span><?php elseif (has_excerpt()):?><?php echo get_the_excerpt(); ?><?php else :?><?php echo substr(get_the_excerpt(), 0,150); ?><span class="lcard_ell">&hellip;</span> <span class="nowrap lcard_readmore"><?php _e('Read More','nc-framework');?></span><?php endif;?></div>
        <!-- end creative HTML -->
      </div>
    </div>
  </a>
</div>