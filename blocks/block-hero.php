<?php

// New Block
add_action('acf/init', 'nc_hero_block');
function nc_hero_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_hero',
            'title'             => __('NC Hero', 'nc-framework'),
            'description'       => __('A hero block with different layouts.', 'nc-framework'),
            'render_callback'   => 'nc_hero_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('hero', 'splash' ),
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

function nc_hero_block_markup( $block, $content = '', $is_preview = false ) {

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
	$image = get_field('image');
	$image_mobile = get_field('image_mobile');
	$media_query = get_field('media_query');
	$parallax = get_field('parallax');
	$focus = get_field('image_focus') ?: 'center center';
	$o_opacity = get_field('overlay_opacity') ?: '0.5';
	$o_color = get_field('overlay_color') ?: '#000';
	$o_blend = get_field('overlay_blend_mode') ?: 'normal';
	$img_blend = get_field('image_blend_mode') ?: 'normal';
	$t_color = get_field('text_color') ?: '#fff';
	$t_align = get_field('text_align') ?: 'center';
	$shadow = get_field('drop_shadow') ?: '0 2px 6px rgba(0,0,0,0.3)';
	$content_width = get_field('max_content_width') ?: '700px';
	$contain_width = get_field('max_container_width') ?: '1400px';
	$c_x = get_field('content_position_x') ?: 'center';
	$c_y = get_field('content_position_y') ?: 'center';
	$c_padding = get_field('content_padding') ?: '3rem 0';
	$min_height = get_field('block_min_height') ?: '700px';
	$bgcolor = get_field('background_color') ?: '#000';
?>

	<div id="<?php echo $id; ?>" class="nchero jarallax<?php echo esc_attr($className); ?>"<?php if($parallax == 'js') { echo ' data-jarallax data-img-position'; }?><?php echo nc_block_attr();?>>

	<?php nc_before_content(); ?>
	
	<?php if($parallax == 'css'):?> <?php else:?>
		<?php if( $image && $image_mobile ):?>
		<picture class="nchero_pc jarallax-img">	
				<source srcset="<?php echo wp_get_attachment_image_srcset( $image_mobile, 'full'); ?>" media="(max-width: <?php echo $media_query.'px'; ?>)" class="nchero_image">
			<?php echo wp_get_attachment_image( $image, 'full', '', array( "class" => "nchero_image jarallax-img nchero_image-fadein", "style" => "animation-delay: 0.5s") ); ?>
		</picture>

		<?php elseif($image ):?>
		<?php echo wp_get_attachment_image( $image, 'full', '', array( "class" => "nchero_image jarallax-img nchero_image-fadein", "style" => "animation-delay: 0.5s") ); ?>	

		<?php else: ?>
		<img class="nchero_image" src="<?php nc_fallbackimage(); ?>" alt="<?php _e('A default picture','nc-framework');?>" title="<?php _e('A default picture','nc-framework');?>" />
		<?php endif;?>

	<?php endif;?>

		<div class="ncontain">
			<div class="nchero_content<?php echo nc_contain_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>

				<?php echo nc_inner_blocks(); ?>

				<?php /* if($content) { echo $content; } else { echo'<h2>Heading</h2><p>Lorem ipsum dolor sit amet, consectetuer 
				adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et 
				magnis dis parturient montes, nascetur ridiculus mus.</p><p><a class="btn btn-outline" style="color:'.$t_color.';" href="#null">Button</a></p>'; } */ ?>
			</div>
		</div>

		<?php nc_after_content(); ?>

	</div>

<style id="<?php echo $id; ?>-block-css">
	<?php echo '#'.$id; ?>.nchero {
		--overlay-opacity: <?php echo $o_opacity.";\n"; ?>
		--overlay-color: <?php echo $o_color.";\n"; ?>
		--overlay-blend-mode: <?php echo $o_blend.";\n"; ?>

		--image-focus: <?php echo $focus.";\n"; ?>
		--image-blend-mode: <?php echo $img_blend.";\n"; ?>

		--text-color: <?php echo $t_color.";\n"; ?>
		--text-align: <?php echo $t_align.";\n"; ?>

		--max-container-width: <?php echo $contain_width."px;\n"; ?>

		--content-dropshadow: <?php echo $shadow.";\n"; ?>
		--content-max-width: <?php echo $content_width."px;\n"; ?>
		--content-position-x: <?php echo $c_x.";\n"; ?>
		--content-position-y: <?php echo $c_y.";\n"; ?>
		--content-padding: <?php echo $c_padding.";\n"; ?>

		--box-min-height: <?php echo $min_height.";\n"; ?>
		--box-bgcolor: <?php echo $bgcolor.";\n"; ?>
	}

	<?php if($parallax == 'js'):?>
		<?php echo '#'.$id; ?>.jarallax { z-index: 0;	}
		<?php echo '#'.$id; ?>.jarallax .jarallax-img { z-index: -1; }

		<?php wp_enqueue_script( 'jarallax', get_theme_file_uri('/js/jarallax.min.js'), array( 'jquery' ), '1', true );	?>	

	<?php endif;?>

	<?php if($image_mobile && $media_query) :?>
	@media(max-width:<?php echo $media_query.'px';?>) {	
		<?php echo '#'.$id; ?> .nchero_image {
			object-position: center center;
		}
	}
	<?php endif;?>

	<?php if($parallax == 'css' && $image ):?>
		<?php echo '#'.$id; ?>.nchero {
			background-image:url(<?php echo wp_get_attachment_image_url( $image, 'full'); ?>);
		}
	<?php endif;?>	
	
	<?php if($parallax == 'css' && $image_mobile && $media_query):?>
	@media(max-width:<?php echo $media_query.'px';?>) {	
		<?php echo '#'.$id; ?>.nchero {
			background-image:url(<?php echo wp_get_attachment_image_url( $image_mobile, 'large'); ?>);
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