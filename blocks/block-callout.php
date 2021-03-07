<?php

// New Block
add_action('acf/init', 'nc_callout_block');
function nc_callout_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_callout',
            'title'             => __('NC Call Out', 'nc-framework'),
            'description'       => __('A call to action block.', 'nc-framework'),
            'render_callback'   => 'nc_callout_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('call out', 'call to action', 'cta' ),
			'post_types'        => array('post', 'page'),
			'align'             => 'full',
			'supports'          => array( 
									'align' => array( 'wide', 'full' ), 
									'mode' => true,
									'multiple' => true,
									),
        ));
}

/* This displays the block */

function nc_callout_block_markup( $block, $content = '', $is_preview = false ) {

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

	//ACF Block
	$callout_content = get_field('content');
	$label = get_field('button_label');
	$button_width = get_field('button_width');
	$text_align = get_field('text_align');

	$b_color = get_field('button_color');
	$bt_color = get_field('button_text_color');

	$bg_opacity = get_field('background_opacity');
	$bg_image = get_field('background_image');

	$breakpoint = get_field('breakpoint');

	$bg_color = get_field('bg_color');
	$text_color = get_field('text_color');
	$padding = get_field('padding');
	$width = get_field('max_contain_width');

?>

	<div id="<?php echo $id; ?>" class="ncallout<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<div class="ncallout_bgimage"<?php if($bg_image) { echo' style="background-image:url('.$bg_image.')"'; }?>></div>
		<div class="ncontain<?php echo sal_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>> 
			<?php if($callout_content):?>
			<div class="ncallout_content">
				<?php echo $callout_content; ?>
			</div> 
			<div class="ncallout_button">
				<a href="<?php echo esc_url($label['url']); ?>" target="<?php echo esc_attr($label['target']); ?>" class="ncbutton"><?php echo $label['title']; ?></a>
			</div>
			<?php else :?>
			<div class="ncallout_content">
				<p>You have no content, start writing some...</p>
			</div> 
			<div class="ncallout_button">
				<a href="#go_nowhere" class="ncbutton">Call Now</a>
			</div>
			<?php endif;?>
		</div> 
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php echo '#'.$id; ?>.ncallout {
	--box-padding: <?php if($padding){ echo $padding; } else { echo'3rem 0'; } ?>;
	--text-color: <?php if($text_color){ echo $text_color; } else { echo"inherit"; } ?>;
	--bg-color: <?php if($bg_color){ echo $bg_color; } else { echo'var(--gray, #f8f8f8)'; } ?>;
	--contain-max-width: <?php if($width){ echo $width.'px'; } else { echo'var(--width-wide, 1000px)'; } ?>;

	--button-color:<?php if($b_color){ echo $b_color; } else { echo'#000'; } ?>;
	--button-text-color:<?php if($bt_color){ echo $bt_color; } else { echo'#fff'; } ?>;
	--bg-opacity:<?php if($bg_opacity){ echo $bg_opacity; } else { echo'0.3'; } ?>;

	--text-align:<?php if($text_align){ echo $text_align; } else { echo'left'; } ?>;
	--button-width:<?php if($button_width){ echo $button_width; } else { echo'30%'; } ?>;
}

<?php if($breakpoint):?>
@media(max-width:<?php echo $breakpoint; ?>px){
	<?php echo '#'.$id; ?>.ncallout .ncontain {
    grid-template-columns:1fr;
  }
}

<?php endif;?>


<?php if(get_field('custom_styles')):?> 
/* Custom CSS */
<?php the_field('custom_styles');?>
<?php endif;?>

</style>
    <?php
}
?>