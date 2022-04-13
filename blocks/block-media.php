<?php

// New Block
add_action('acf/init', 'nc_media_block');
function nc_media_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_media',
            'title'             => __('NC Media', 'nc-framework'),
            'description'       => __('An image or video alongside text.', 'nc-framework'),
            'render_callback'   => 'nc_media_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('video', 'image' ),
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

function nc_media_block_markup( $block, $content = '', $is_preview = false ) {

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
	$content = get_field('content');
	$video = get_field('video');
	$video_embed = get_field('video_embed');
	$image = get_field('image');
	$position = get_field('media_position');
	$alignment = get_field('media_alignment');
	$cwidth = get_field('content_width');
	$link = get_field('link');
	$link_class = get_field('link_class');
	$width = get_field('media_width');
	$height = get_field('image_height');
	$gap = get_field('media_gap');
	$focus = get_field('image_focus');
	$breakpoint = get_field('break_point');
	$text_align = get_field('text_align');
	$bg_color = get_field('bg_color');
	$text_color = get_field('text_color');
	$padding = get_field('padding');

?>
	<div id="<?php echo $id; ?>" class="ncmedia<?php if($position) { echo' '.$position; }; echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<div class="ncontain<?php echo nc_contain_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>

			<div class="ncmedia_media">
				<?php if($link ==!'' && $image):?>
				<?php
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';	
				?>
				<a class="ncmedia_link<?php if($link_class){ echo' '.$link_class; }?>"<?php if($link_title) { echo' title="'.esc_attr($link_title).'"';}; if($link_url) { echo' href="'.esc_url($link_url).'"'; }; if($link_target){ echo' target="'.esc_attr($link_target).'"';}; ?>>
					<?php echo wp_get_attachment_image( $image, 'large', '', array( "class" => "ncmedia_image" ) ); ?>
				</a>
				<?php elseif($image):?>
				<?php echo wp_get_attachment_image( $image, 'large', '', array( "class" => "ncmedia_image" ) ); ?>

				<?php elseif($video_embed):?>
				<div class="ncmedia_video">
					<?php echo $video_embed; ?>
				</div>				

				<?php elseif($video):?>
				<div class="ncmedia_video">
					<?php echo $video; ?>
				</div>

				<?php else: ?>
				<img class="ncpic_image" src="<?php nc_fallbackimage(); ?>" alt="<?php _e('A default picture','nc-framework');?>" title="<?php _e('A default picture','nc-framework');?>" />
				<?php endif;?>
			</div>

			<div class="ncmedia_text">
				<?php if($content) { echo $content; } else { echo'<h2>Heading</h2><p>A paragraph...</p>'; } ?>
			</div>
			
		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php echo'#'.$id; ?>.ncmedia {

	--bg-color:<?php if($bg_color) { echo $bg_color; } else { echo'transparent'; }; ?>;
	--text-color:<?php if($text_color) { echo $text_color; } else { echo'inherit'; }?>;
	--box-padding: <?php if($padding){ echo $padding; } else { echo'0'; }?>;
	--text-align:<?php if($text_align){ echo $text_align; } else { echo'left'; }?>; 

	--content-width:<?php if($cwidth){ echo $cwidth.'px'; } else { echo'var(--width-wide, 1000px)'; }?>;
	--align-items:<?php if($alignment){ echo $alignment; } else { echo'center'; }?>;

	--media-width: <?php if($width){ echo $width; } else { echo'40%'; }?>;
	--media-gap: <?php if($gap){ echo $gap; } else { echo'3rem'; }?>;

	--image-height: <?php if($height){ echo $height; } else { echo'auto'; }?>;
	--image-focus: <?php if($focus){ echo $focus; } else { echo'center'; }?>;  
}

@media(max-width:<?php if ($breakpoint) { echo $breakpoint.'px'; } else { echo'640px';} ?>){

	<?php echo'#'.$id; ?>.ncmedia .ncontain {
		grid-template-columns:auto;
		grid-gap: var(--gap);
	}

	<?php echo '#'.$id; ?>.ncmedia-right .ncmedia_media { order:0 }
	<?php echo '#'.$id; ?> .ncmedia_image { height:auto; width:auto; }

}

<?php if(get_field('custom_styles')):?> 
/* Custom CSS */
<?php the_field('custom_styles');?>
<?php endif;?>

</style>
    <?php
}
?>