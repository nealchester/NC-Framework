<?php

// New Block
add_action('acf/init', 'nc_slider_block');
function nc_slider_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_slider',
		'title'             => __('NC Slider', 'nc-framework'),
		'description'       => __('Slider', 'nc-framework'),
		'render_callback'   => 'nc_slider_block_markup',
		'category'          => 'layout',
		//'icon'              => 'format-image',
		'mode'              => 'preview',
		'keywords'          => array('slider', 'sliders', 'slide' ),
		'post_types'        => array('post', 'page'),
		'align'             => 'full',
		'supports'          => array( 
				'align' => array( 'wide', 'full', 'none' ), 
				'mode' => true,
				'multiple' => true,
		),
	));
}

/* This displays the block */

function nc_slider_block_markup( $block, $content = '', $is_preview = false ) {

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

	$slider_id = 'splide-'.rand(10, 99);
	$img_slider = get_field('image_slider');
	$slide_aspect_ratio = get_field('slide_ratio') ?: 'auto';
	$slide_aspect_ratio_mobile = get_field('slide_ratio_mobile') ?: 'auto';

?>

	<div id="<?php echo $id; ?>" class="splide__box<?php echo esc_attr($className);?>" <?php echo nc_block_attr();?>>
			<?php //nc_before_content(); ?>

			<?php if( have_rows('slides') ): // start slides ?>
			<div class="splide__wrap nc_content_block_main">
				<noscript>Your browser does not support JavaScript!</noscript>
				<div class="splide" <?php echo 'id="'.$slider_id.'"'; ?>>
					<div class="splide__track">
						<div class="splide__list">
						<?php while( have_rows('slides') ): the_row();?>

						<?php 
							$img_size = get_field('image_size') ?: 'large';
							$image = get_sub_field('bg_img');
							$slide = get_sub_field('slide');
							$focal = ' background-position:'.nc_block_slider_image_focus($image).';';

							if($img_slider && $image && $slide) {
								$img_url = ' style="background-image:url('.wp_get_attachment_image_url($image, $img_size, '').');'.$focal.'"';
								$img_bg = '<div class="splide__bg"'.$img_url.'></div>';
								$img_content = '<div class="splide__content splide--has-image splide--has-text">'.$slide.'</div>';
							}
							elseif($img_slider && $image) { 
								$img_url = ' style="background-image:url('.wp_get_attachment_image_url($image, $img_size, '').');'.$focal.'"';
								$img_bg = '<div class="splide__bg"'.$img_url.'></div>';
								$img_content = '<div class="splide__content splide--has-image">'.$slide.'</div>';
							}
							else { 
								$img_url = null;
								$img_bg = null;
								$img_content = '<div class="splide__content">'.$slide.'</div>';
							 }
						?>

						<div class="splide__slide">
							<?php echo $img_bg;?>	
							<?php echo $img_content;?>
						</div>

						<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			<?php else:?>

				<p style="margin-inline:auto; max-width:600px; padding:3rem 1.5rem; background: #eee">There is no slide content, add some content using the sidebar panel.<p>
			<?php endif; // end slides ?>


	</div>

<style id="<?php echo $id; ?>-css">

<?php echo '#'.$id; ?> .splide__slide {
    padding:var(--slide-padding);
    background:var(--slide-bg-color);
    border-radius:var(--slide-border-radius);
		text-align: var(--slide-text-align);
		color:var(--slide-tx-color);
		border:var(--slide-border);
		overflow:hidden;
		display:flex;
		flex-direction:column;
		justify-content:var(--slide-justify-content);
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide > img {
		object-fit: cover;
		height:100%;
	}

<?php echo '#'.$id; ?> .splide__img {
		position:absolute;
		z-index: 5;
		left:0; top:0; bottom:0; right:0;
		width:100%; height:100%;
		object-fit:cover;
		opacity: var(--image-opacity);
    mix-blend-mode: var(--image-blend-mode);
	}	

	<?php echo '#'.$id; ?> .splide__slide > .splide__img ~ * {
		z-index:10;
		position:relative;
  }
	
	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__img  {
		height: 100% !important
	}
  
	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide {
		margin-bottom:1em;
		position: relative;
		margin-inline:auto;
		max-width:600px;
		background: #f2f2f2;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide {
		position: relative;
	}	

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide > :last-child {
		margin-bottom:0;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__plink {
		pointer-events: none;
		pointer: default;
	}

<?php // nc_box_styles($id); ?>

<?php echo '#'.$id; ?> {
	overflow-x:hidden;

	.splide__slide {
		width: 100%;
		aspect-ratio: <?php echo $slide_aspect_ratio;?>
	}
}
<?php echo '#'.$id; ?> .splide__bg {
		background-size: cover;
		background-position: center;
		background-repeat:no-repeat;
		position:absolute;
		inset:0;
	}

	<?php echo '#'.$id; ?> .splide__content {
		padding:1em;
	}

	<?php echo '#'.$id; ?> .splide__content.splide--has-image.splide--has-text {
		position:absolute;
		inset:0;
		display: flex;
		flex-direction:column;
		align-items:center;
		justify-content: center;
		text-align: center;
		color: <?php echo get_field('slide_text_color') ?: '#ffffff';?>;
		z-index: 5;

		& > * {
			z-index: 6;
			position: relative;
			filter: drop-shadow(1px 1px 3px rgba(0,0,0,0.5));
		}

		& > :last-child {
			margin-bottom:0;
		}
	}

	<?php if( get_field('type') == 'fade' && in_the_loop() ):?>
	<?php echo '#'.$id; ?> .splide__slide .splide__content.splide--has-image.splide--has-text > * {
		opacity:0;
		transform:translateY(50px);
		transition:1s;
		transition-delay: 0.5s
	}

	<?php echo '#'.$id; ?> .splide__slide.is-active .splide__content.splide--has-image.splide--has-text > * {
		transform:translateY(0);
		opacity:1;
	}
	<?php endif;?>

	<?php echo '#'.$id; ?> .splide__content.splide--has-image.splide--has-text:before {
		content:'';
		z-index: 2;
		position:absolute;
		inset:0;
		background-color: <?php echo get_field('img_overlay_color') ?: 'rbga(0,0,0,0.3)';?>;
	}

@media(max-width:<?php echo get_field('break_width').'px' ?:'0'; ?>){
<?php echo '#'.$id; ?> .splide__slide {
		aspect-ratio: <?php echo $slide_aspect_ratio_mobile;?>
	}
}

<?php nc_block_custom_css(); ?>

</style>	

<?php 
// If in the loop load styles and javascript
if( in_the_loop() ): ?>

<?php
	wp_enqueue_style('nc-blocks-slider');
	wp_enqueue_script('nc-blocks-slider');
?>

<script id="<?php echo $id; ?>-js">
	document.addEventListener( 'DOMContentLoaded', function () {
		new Splide( '<?php echo '#'.$slider_id; ?>', {
		type   : '<?php echo get_field('type') ?: loop; ?>',
		perPage: <?php the_field('per_page') ?: 3; ?>,
		perMove: <?php the_field('per_move') ?: 3; ?>,
		autoplay: <?php if ( get_field('auto_play') ) { echo 'true'; } else { echo 'false'; } ?>,
		rewind: <?php if ( get_field('rewind') ) { echo 'true'; } else { echo 'false'; } ?>,
		focus  : <?php if(get_field('center_slide')) { echo "'center'"; } else { echo '1';}; ?>,
		trimSpace: false,
		clones: 4,
		cloneStatus: true,

		speed: <?php echo get_field('speed') ?: 400; ?>,
		interval: <?php echo get_field('pause') ?: 3000; ?>,

		gap: '<?php echo get_field('gap').'rem' ?: '1'; ?>',
		
		height: '<?php echo get_field('slider_fixed_height').'rem' ?: '0'; ?>',

		direction: <?php if( get_field('direction') ) { echo "'".get_field('direction')."'"; } else { echo "'ltr'"; } ?>,

		<?php $fixw = get_field('fixed_slide_width');
		if($fixw) { echo "fixedWidth: '".$fixw."',"; } else { echo null; } ?>

		pagination: <?php if( get_field('pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
		arrows: <?php if ( get_field('arrows') ) { echo 'true'; } else { echo 'false'; } ?>,

		breakpoints: {
			<?php echo get_field('break_width') ?: '0'; ?>: {
				perPage: <?php the_field('break_per_page') ?: 1; ?>,
				pagination: <?php if( get_field('show_pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
				arrows: <?php if( get_field('show_arrows') ) { echo 'true'; } else { echo 'false'; } ?>,
				focus: <?php if(get_field('center_slide_mobile')) { echo "'center'"; } else { echo '1';}; ?>,
				
				<?php $fixwm = get_field('fixed_slide_width_mobile');
				if($fixwm) { echo "fixedWidth: '".$fixwm."',"; } else { echo null; } ?>
			}
		},

		}).mount();
	});
</script>

<?php endif; ?>

<?php } ?>