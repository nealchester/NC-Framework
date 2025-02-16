<?php

// New Block
add_action('acf/init', 'nc_split_block');
function nc_split_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_split',
            'title'             => __('NC Split', 'nc-framework'),
            'description'       => __('A split screen with image and text', 'nc-framework'),
            'render_callback'   => 'nc_split_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('split', 'splash', 'split screen', 'splitscreen' ),
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

function nc_split_block_markup( $block, $content = '', $is_preview = false ) {

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
	$position = get_field('image_position');
	$acontent = get_field('align_content');
	$breakpoint = get_field('break_point');

	$imgbreak = get_field('image_break_point');
	if( $imgbreak ) { 
		$imgpos = 'ncsplit-imagetop'; 
	};	

	$image = get_field('image');
	$parallax = get_field('parallax');

	$bg_color = get_field('bg_color') ?: "#222222";
	$text_color = get_field('text_color') ?: '#ffffff';
	$padding = get_field('padding') ?: '3rem';

	$caption = get_field('caption') ?: 'none';
	$cap_align = get_field('cap_align') ?: 'center';

	$width = get_field('width') ?: '450px';
	$height = get_field('height') ?: '550px';
	$focus = get_field('image_focus') ?: '50% 50%';

	$image_content = get_field('image_content');
	$image_width = get_field('image_width') ?: '50';
	$image_height = get_field('image_height') ?: '70';

?>

	<?php wp_enqueue_style('nc-blocks-hero-split');?>

	<section id="<?php echo $id; ?>" class="ncsplit<?php echo' '.$position.' '.$acontent.' '.$imgpos.' '.esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<figure class="ncsplit_image jarallax"<?php if($parallax) { echo ' data-jarallax data-img-position'; }?><?php echo nc_contain_attr();?>>

			<?php if($image) { 
				echo wp_get_attachment_image( $image, 'large', '', 
				array( "class" => "ncsplit_pic jarallax-img" )); }?>

			<div 
			class="ncsplit_overlay" 
			data-aos="fadeout" data-aos-delay="500" data-aos-duration="1000"
			style="background-color: <?php echo $bg_color; ?>">
		  </div>
		
			<?php if(wp_get_attachment_caption($image)):?>
				<figcaption class="ncsplit_caption" data-aos="fadein" data-aos-delay="1000" data-aos-duration="1000">
					<?php echo wp_get_attachment_caption($image); ?>
				</figcaption>
			<?php endif;?>
		</figure>
		<div class="ncsplit_content">
			<div class="ncsplit_contentcontain">
				<?php echo nc_inner_blocks(); ?>
			</div>
		</div>
	</section>

<style id="<?php echo $id; ?>-block-css">

<?php echo '#'.$id; ?>.ncsplit {
    --image-position: <?php echo $focus; ?>;
    --text-color: <?php echo $text_color; ?>;
    --bg-color: <?php echo $bg_color; ?>;
    --text-space: <?php echo $padding; ?>;
    --box-min-height: <?php echo $height; ?>;
    --content-max-width: <?php echo $width.'px'; ?>;
    --display-caption: <?php echo $caption; ?>;
	  --caption-align: <?php echo $cap_align; ?>;
  	--img-width: <?php echo $image_width.'%'; ?>;
		--img-height: <?php echo $image_height.'%'; ?>;
}

.editor-styles-wrapper .ncsplit_overlay {
		display:none;
	}

	[data-aos="fadeout"] {
		opacity: 1 !important;
		transition-property: opacity;
	}

	[data-aos="fadeout"].aos-animate {
		opacity: 0 !important;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .ncsplit_pic {
		height:100%;
	}

	<?php if($parallax):?>
		<?php 
			wp_enqueue_script('nc-blocks-parallax');
			wp_enqueue_style('nc-blocks-parallax');
		?>
	<?php endif;?>

@media(max-width:<?php if ($breakpoint) { echo $breakpoint.'px'; } else { echo'640px';} ?>){

		<?php echo'#'.$id; ?>.ncsplit {
		flex-direction:column;
		min-height:0;
		}

		<?php echo '#'.$id; ?> .ncsplit_image {
		min-height:0;
		width:100%;
		flex-basis:0;
		padding-top: var(--img-height);
		}

		<?php echo '#'.$id; ?> .ncsplit_caption {
		position: absolute;
		display: var(--display-caption);
		width: 100%;
		color: #fff;
		}


		<?php echo '#'.$id; ?> .ncsplit_content {
		padding: clamp(2.2rem, 8vw, 3rem) 0 !important;
		display:block;
		flex-basis: auto;
		}
		

		<?php echo '#'.$id; ?> .ncsplit_contentcontain {
		max-width:var(--content-max-width);
		width:calc(100% - 2 * var(--gap));
		margin:0 auto;
		padding-left:0 !important;
		padding-right:0 !important;
		}

		/* Modifier: Make the image always stack on top  */

		<?php echo '#'.$id; ?>.ncsplit-imagetop .ncsplit_image { order:1 }
		<?php echo '#'.$id; ?>.ncsplit-imagetop .ncsplit_content { order:2 }

		}

<?php if(get_field('custom_styles')):?> 
/* Custom CSS */
<?php the_field('custom_styles');?>

<?php endif;?>

</style>

<?php } ?>