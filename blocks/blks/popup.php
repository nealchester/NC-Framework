<?php

// New Block
add_action('acf/init', 'nc_popup_block');
function nc_popup_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_popup',
            'title'             => __('NC PopUp Box', 'nc-framework'),
            'description'       => __('Create a popup box that will appear once per session. To see the popup close the page and open it again.', 'nc-framework'),
            'render_callback'   => 'nc_popup_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('modal', 'popup box', 'popup' ),
            'post_types'        => array('post', 'page'),
            'align'             => 'full',
            'supports'          => array( 
              'align' => array( 'wide', 'full' ), 
              'mode' => true,
              'multiple' => false,
              'jsx' => true,
              ),
        ));
}

/* This displays the block */

function nc_popup_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
    if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    /*
		if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
		*/

	//ACF Block
    $content = get_field('content') ?: '<h2>Hello</h2><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>';
    $ocolor = get_field('overlay_color') ?: '#000';
    $opacity = get_field('overlay_opacity') ?: '0.5';
    $bgimg = 'url('.get_field("background_image").')';
    $bgcolor = get_field('background_color') ?: '#fff';
    $color = get_field('text_color') ?: '#000';
    $width = get_field('max_width') ?: '700';
    $height = get_field('min_height') ?: '400';
?>
	<?php wp_enqueue_script('nc-blocks-popup');	?>
  
<div id="<?php echo $id; ?>" class="ncpopup_overlay<?php echo esc_attr($className); ?>">
  <div class="ncpopup">
    <div class="ncpopup_container">
      <div class="ncpopup_content">
        <?php // echo $content; ?>
        <?php echo nc_inner_blocks(2); ?>
      </div>
    </div>
    <button class="ncpopup_close">
      <span class="ncicon nc-close"></span>
    </button>
  </div>
</div>

<style id="<?php echo $id; ?>-block-css">

/* Popup */

<?php echo '#'.$id; ?> .ncpopup { 
  background: <?php echo $bgcolor.' '.$bgimg; ?> no-repeat center;
  background-size: cover;
  padding:3rem 7%; 
  display:flex; 
  align-items:center; 
  justify-content:center; 
  text-align:center;  
  color:<?php echo $color; ?>;
  width:100%;
  max-width: <?php echo $width.'px'; ?>;
  min-height: <?php echo $height.'px'; ?>;
  box-shadow: 0 3px 1em rgba(0,0,0,0.5);
  position: relative;
  margin:0 auto;
}

/* for frontend */
#wrapper <?php echo '#'.$id; ?> .ncpopup {
  transition: 0.5s;
  transition-delay: 0.5s;
  opacity: 0;
  top:<?php echo '-'.$height.'px'; ?>;
}

<?php echo '#'.$id; ?> .ncpopup_close {
  background: transparent;
  padding:1em;
  position: absolute;
  right:0; 
  top:0;
  cursor: pointer;
  border:none;
  display:block;
  color: <?php echo $color; ?>;
}


#wrapper <?php echo '#'.$id; ?>.ncpopup_overlay {
  position: fixed;
  left:0; top:0; right:0; bottom:0;
  width:100% !important;
  max-width:100% !important;
  height: 100% !important;
  display:flex;
  align-items: center;
  justify-content: center;
  z-index: 99998;
  padding:0.75rem;
  visibility: hidden;
  opacity:0;
  transition-property: opacity;
  transition-duration:0.5s;
  overflow: hidden;
}

#wrapper <?php echo '#'.$id; ?>.ncpopup_overlay:before {
  content:'';
  opacity: <?php echo $opacity; ?>;
  background-color: <?php echo $ocolor; ?>;
  position: absolute;
  left:0; top:0; right:0; bottom:0;
  width:100%; height:100%;
  display:block;
}

#wrapper <?php echo '#'.$id; ?>.ncpopup_overlay.open {
  visibility: visible;
  opacity:1;
}

#wrapper <?php echo '#'.$id; ?>.ncpopup_overlay.open .ncpopup {
  opacity:1;
  top:0;
}

<?php get_field('custom_css'); ?>

</style>

<?php
}

?>