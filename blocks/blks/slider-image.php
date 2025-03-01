<?php

// New Block
add_action('acf/init', 'nc_imgslider_block');
function nc_imgslider_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_imgslider',
		'title'             => __('NC Image Slider', 'nc-framework'),
		'description'       => __('Image Slider', 'nc-framework'),
		'render_callback'   => 'nc_imgslider_block_markup',
		'category'          => 'layout',
		//'icon'            => 'format-image',
		'mode'              => 'preview',
		'keywords'          => array('slider', 'images', 'gallery', 'sliders', 'slide' ),
		'post_types'        => get_post_types(),
		'align'             => 'full',
		'supports'          => array( 
				'align' => array( 'wide', 'full', 'none' ), 
				'mode' => true,
				'multiple' => true,
				'jsx' => true,
		),
	));
}

/* This displays the block */

function nc_imgslider_block_markup( $block, $content = '', $is_preview = false ) {

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

	$slider_id = uniqid("nc_splide_");
	$slides = get_field('slides');
	$img_height = get_field('slide_height') ?: '50';
	$img_height_mobile = get_field('slide_height_mobile') ?: '75';
	$breakpoint = get_field('break_width') ?: '0';

?>

	<?php wp_enqueue_style('nc-blocks-gallery');?>

	<div id="<?php echo $id; ?>" class="splide__box<?php echo esc_attr($className);?>">
		<div class="ncontain">

			<?php nc_before_content(); ?>

			<?php if( $slides ): ?>
			<div class="splide__wrap nc_content_block_main">
				<noscript>Your browser does not support JavaScript!</noscript>
				<div class="splide" <?php echo 'id="'.$slider_id.'"'; ?> style="visibility:hidden">
					<div class="splide__track">
						<div class="splide__list">
						<?php foreach( $slides as $image ):?>

						<?php 	
						$mdisplay = get_field('meta_display');
						$link2img = get_field('link_to_image'); 
						?>

						<div class="splide__slide">

						<?php if($link2img == 'image_page'):?><a class="splide__plink" aria-label="View larger" href="<?php echo get_attachment_link($image['ID']); ?>">
						<?php elseif($link2img == 'image_lightbox'):?><a aria-label="View larger" data-title="<?php echo $image['title']; ?>" class="splide__plink <?php echo'ncsimg_'.$id; ?>" href="<?php echo wp_get_attachment_image_url($image['ID'], 'large'); ?>"><?php endif;?>

						<div class="splide__padding"></div>

						<?php echo wp_get_attachment_image( $image['ID'], 'large', '', 
						array('class' => 'splide__img', 'style' => nc_block_image_focus($image['ID'])
						)); ?>

						<?php if( $mdisplay && in_array('titles', $mdisplay) || $mdisplay && in_array('captions', $mdisplay) ):?>
						<div class="ncgallery_caption">
							<?php if($mdisplay && in_array('titles', $mdisplay) && $image['title']) { echo'<span class="ncgallery_title">'.$image['title'].'</span>';}?>
							<?php if($mdisplay && in_array('captions', $mdisplay) && $image['caption']) { echo'<span class="ncgallery_desc">'.$image['caption'].'</span>';}?>
						</div>
						<?php endif;?>

						<?php if($link2img == 'image_page'):?></a>
						<?php elseif($link2img == 'image_lightbox'):?></a><?php endif;?>

						</div>

						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<?php else: ?>
				<p class="imgslider_noimages">Add some images to get started. Use the sidebar settings to begin.</p>
			<?php endif; // end slides ?>

			<?php // nc_after_content(); ?>
		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php if(!$slides):?>
	<?php echo '#'.$id; ?> .imgslider_noimages {
	max-width: 500px; 
	font-size: var(--txt-medium);
	margin-inline: auto;
	cursor: default;
}
<?php echo '#'.$id; ?>{
	background-color: #eee;

	.nc_content_block_before {
		max-width:500px;
		margin-inline: auto;
	}
}
<?php endif;?>

<?php echo '#'.$id; ?> .splide__slide {
    background:var(--slide-bg-color);
    border-radius:var(--slide-border-radius);
		text-align: var(--slide-text-align);
		border:var(--slide-border);
		overflow:hidden;
	}

	#wrapper <?php echo '#'.$id; ?> .splide__slide .ncgallery_caption{
		opacity:0;
		transition:0.6s;
		transition-delay: <?php echo get_field('speed').'ms'; ?>;
	}

	#wrapper <?php echo '#'.$id; ?> .splide__slide.is-active .ncgallery_caption{
		opacity:1;
	}

	<?php echo '#'.$id; ?> .splide__padding {
		width:100%;
		padding-top:var(--slide-height);
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

	<?php echo '#'.$id; ?> .splide__padding {
		padding-top: <?php echo $img_height.'%'; ?>;
	}	

	<?php echo '#'.$id; ?> .splide .ncgallery_caption {
		position:absolute !important;
		z-index:15 !important;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__img  {
		height: 100% !important
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide {
		margin-bottom:1em;
		outline:solid 1px #eee;
		position: relative;
		margin-inline:auto;
		max-width:600px;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide {
		position: relative;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide:before {
		content: 'Here\'s an example of how each slide will look. For an actual visual, Preview this page.';
		display: block;
		text-align: center;
		padding: 0.5em;
		font-size: var(--txt-xsmall);
		color: currentColor;
		position: absolute;
		z-index: 100;
		top: 100%;
		width: 100%;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide ~ .splide__slide {
		display:none;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide {
		visibility: visible !important;	
	}	

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide > :last-child {
		margin-bottom:0;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__plink {
		pointer-events: none;
		pointer: default;
	}


<?php nc_box_styles($id); ?>

<?php echo '#'.$id; ?> {
	overflow:hidden;
}

@media(max-width:<?php echo $breakpoint.'px'; ?>){
	<?php echo '#'.$id; ?> .splide__padding {
		padding-top: <?php echo $img_height_mobile.'%'; ?>;
	}	
}

<?php nc_block_custom_css(); ?>

</style>	

<?php 

// If in the loop load styles and javascript
if( in_the_loop() ):?>

	<?php
			wp_enqueue_style('nc-blocks-slider');
			wp_enqueue_script('nc-blocks-slider');
	?>

		<?php if( get_field('link_to_image') == 'image_lightbox') :?>

		<?php 
			wp_enqueue_script('nc-blocks-magnify'); 
			wp_enqueue_style('nc-blocks-magnify');
		?>

		<script id="<?php echo 'gallery_'.$id.'_script'; ?>">
		jQuery(document).ready(function() {
		jQuery('<?php echo'.ncsimg_'.$id; ?>').magnificPopup({
			type:'image',
			image: { titleSrc: 'data-title' },
			gallery:{ enabled:true },
				mainClass:'mfp-with-zoom',
				zoom: {
					enabled: true,
					duration: 300,
					easing: 'ease-in-out',
					opener: function(openerElement) {
						return openerElement.is('img') ? openerElement : openerElement.find('img');
					}
				},
		});
		});
		</script>

		<?php endif;?>

<script>
	document.addEventListener( 'DOMContentLoaded', function () {
		new Splide( '<?php echo '#'.$slider_id; ?>', {
		type   : '<?php echo get_field('type') ?: 'loop'; ?>',
		perPage: <?php echo get_field('per_page') ?: '2'; ?>,
		perMove: <?php echo get_field('per_move') ?: '1'; ?>,
		gap: '<?php echo get_field('gap_space') ?: '1.5rem'; ?>',
		focus  : <?php if(get_field('center_slide')) { echo "'center'"; } else { echo '1';}; ?>,
		trimSpace: false,
		clones: 1,
		autoplay: <?php if ( get_field('auto_play') ) { echo 'true'; } else { echo 'false'; } ?>,
		rewind: <?php if ( get_field('rewind') ) { echo 'true'; } else { echo 'false'; } ?>,

		speed: <?php echo get_field('speed') ?: 400; ?>,
		interval: <?php echo get_field('pause') ?: 3000; ?>,

		direction: '<?php if( get_field('direction') ) { echo get_field('direction'); } else { echo 'ltr'; } ?>',

		pagination: <?php if( get_field('pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
		arrows: <?php if ( get_field('arrows') ) { echo 'true'; } else { echo 'false'; } ?>,

		breakpoints: {
			<?php echo get_field('break_width') ?: 0; ?>: {
				pagination: <?php if( get_field('show_pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
				arrows: <?php if( get_field('show_arrows') ) { echo 'true'; } else { echo 'false'; } ?>,
				perPage: <?php echo get_field('per_page_mobile') ?: '2'; ?>,
				perMove: <?php echo get_field('per_move_mobile') ?: '1'; ?>,
				focus: <?php if(get_field('center_slide_mobile')) { echo "'center'"; } else { echo '1';}; ?>,
			}
		},

		}).mount();
	});
</script>


<?php endif; ?>

<?php } ?>