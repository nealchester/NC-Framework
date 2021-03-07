<?php 

function nc_hero_component( 
  $att = array(
  'first_image' => null,
  'second_image' => null,
  'max_break_point' => null,
  'text' => 'Insert some text. Feel free to use HTML and PHP',
  'scroll' => false,
  'html_att' => null,
  'css_class' => null,
  'block_id' => 'herobanner'
  )
) { ?>
  
  <section <?php echo 'id="'.$att['block_id'].'"'; ?> class="nchero<?php if($att['css_class']) { echo ' '.$att['css_class']; } ?>" <?php if($att['html_att']) { echo $att['html_att']; } ?>>
    <picture class="nchero_pc">
      <?php if( $att['max_break_point'] && $att['second_image'] ):?>
      <source srcset="<?php echo $att['second_image']; ?>" media="(max-width: <?php echo $att['max_break_point']; ?>)">
      <?php endif; ?>
      <img src="<?php echo $att['first_image']; ?>" class="nchero_image" />
    </picture>
    <div class="ncontain">
      <div class="nchero_content"><?php echo $att['text']; ?></div>
    </div>
  </section>
  
  <?php
}