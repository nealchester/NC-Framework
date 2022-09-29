<?php

// New Block
add_action('acf/init', 'nc_grad_block');
function nc_grad_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_grad',
            'title'             => __('NC Gradient', 'nc-framework'),
            'description'       => __('A content box with an image and gradient overlay', 'nc-framework'),
            'render_callback'   => 'nc_grad_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('gradient', 'content' ),
						'post_types'        => array('post', 'page'),
						'align'             => 'full',
						'supports'          => array( 
							'align' => array( 'wide', 'full' ), 
							'mode' => true,
							'multiple' => true,
							'jsx' => true,
							),
        ));
}

/* This displays the block */

function nc_grad_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

	// ACF Vars
	
	$position = get_field('image_position') ?: 'ncgradimg-left';
	$breakpoint = get_field('break_point') ?: '1000';

?>

<?php wp_enqueue_style('nc-blocks-gradient');?>

<div id="<?php echo $id; ?>" class="ncgradimg<?php echo ' '.$position.' '.esc_attr($className);?>" <?php echo nc_block_attr();?>>
	<div class="ncgradimg_image" data-aos="fade" data-aos-duration="1000" data-aos-delay="500"></div>
	<div class="ncontain ncgradimg_contain<?php echo nc_contain_classes(); ?>">
		<div class="ncgradimg_content" <?php echo nc_animate().nc_contain_attr();?>>
			<?php echo nc_inner_blocks(2); ?>
		</div>
	</div>
</div>

<style id="<?php echo $id; ?>-block-css">

<?php echo '#'.$id; ?>.ncgradimg {
  --height: <?php echo get_field('height') ?: '600px'; ?>;
  --width: <?php echo get_field('container_width') ?: '1000'; ?>px;
  --content-width: <?php echo get_field('content_width') ?: '50'; ?>%;
  --content-align: left;
  --content-padding: <?php echo get_field('padding') ?: '3rem'; ?>;
  --bgposition: <?php echo get_field('image_focus') ?: 'center center'; ?>;
  --bgcolor: <?php echo hex2RGB( get_field('color'),true ); ?>;
  --textcolor: #fff;
  --blend-mode: <?php echo get_field('image_blend_mode') ?: 'normal'; ?>;
  --grad-width: <?php echo get_field('grad_width') ?: '50'; ?>%;
  --image-width: <?php echo get_field('image_width') ?: '60'; ?>%;
}

<?php echo '#'.$id; ?> .ncgradimg_image {
	background-image:url('<?php echo get_field('image') ?: nc_block_fallback_image(); ?>');
} 

@media(max-width:<?php if ($breakpoint) { echo $breakpoint.'px'; }; ?>){

  <?php echo '#'.$id; ?>.ncgradimg {
    --content-align:left;
  }
  <?php echo '#'.$id; ?> .ncgradimg_content {
    max-width: 100%;
    padding-top: 1rem;
    min-height: 0;
  }

  <?php echo '#'.$id; ?> .ncgradimg_contain {
    min-height: 0;
  }

  <?php echo '#'.$id; ?> .ncgradimg_image {
    height: auto;
    width: 100%;
    position: relative;
  }

  <?php echo '#'.$id; ?> .ncgradimg_image:after {
    content: "";
    padding-top: 60%;
    display: block;
    width: 100%;
  }

  <?php echo '#'.$id; ?> .ncgradimg_image:before {
    height: var(--grad-width);
    width: 100%;
    left: 0;
    top: auto;
    bottom: 0;
    background-image: 
      linear-gradient(
        to top, 
        var(--gradient-smooth) 
      ) !important;
  }

}

<?php if(get_field('custom_styles')):?> 
/* Custom CSS */
<?php the_field('custom_styles');?>
<?php endif;?>

</style>
    <?php
}
?>