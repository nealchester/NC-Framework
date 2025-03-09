<?php

// New Block
add_action('acf/init', 'nc_sliders_block');
function nc_sliders_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_sliders',
		'title'             => __('NC Sliders', 'nc-framework'),
		'description'       => __('Slider', 'nc-framework'),
		'render_callback'   => 'nc_sliders_block_markup',
		'category'          => 'layout',
		'icon'              => get_nc_icon('nc-block'),
		'mode'              => 'preview',
		'keywords'          => array('slider', 'sliders', 'slide', 'carousel'),
		'post_types'        => get_post_types(),
		'align'             => 'wide',
		'supports'          => array( 
				'align' => array( 'wide', 'full', 'none' ), 
				'mode' => true,
				'multiple' => true,
		),
	));
}

/* This displays the block */

function nc_sliders_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	if (get_field('set_id')) { 
		$id = get_field('set_id'); } else { $id = uniqid("slider_"); };

	if (get_field('set_id')) { 
		$id_box = get_field('set_id').'-box'; } else { $id_box = uniqid("slider_").'-box'; };
	

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
		}
		
	//ACF Block

	$img_slider = get_field('image_slider');
	$slide_aspect_ratio = get_field('slide_ratio') ?: 'auto';
	$slide_aspect_ratio_mobile = get_field('slide_ratio_mobile') ?: $slide_aspect_ratio;
	$tposition = get_field('slide_text_position') ?: 'middle';
	$overlay = get_field('img_overlay_color') ?: 'rbga(0,0,0,0.3)';
	$text_max_width = get_field('slide_text_width') ?: '1000';

	$arr_style = get_field('arrow_style');
	if( $arr_style == 'outside' ) { $astyle = ' splide--arrows-outside'; } 
	elseif( $arr_style == 'inside' ) { $astyle = ' splide--arrows-inside'; } 
	elseif( $arr_style == 'default' ) { $astyle = null; }
	else { $astyle = ' splide--arrows-outside'; }

	$pgn_style = get_field('pgn_style');
	if( $pgn_style == 'o-bullets' ) { $pgn = ' splide--pgn-bullets-over '; } 
	elseif( $pgn_style == 'o-bars' ) { $pgn = ' splide--pgn-bars-over '; }
	elseif( $pgn_style == 'bullets' ) { $pgn = ' splide--pgn-bullets '; }
	elseif( $pgn_style == 'bars' ) { $pgn = ' splide--pgn-bars '; }
	else { $pgn = ' splide--pgn-bars '; }

	$center = get_field('slide_text_align');
	if($center) { $center_text = 'text-align: center;';	}
	else { $center_text = null;}

?>

				<?php if( have_rows('slides') ): // start slides ?>

				<div id="<?php echo $id_box; ?>" class="splide__box<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>

					<noscript>Your browser does not support JavaScript!</noscript>
					<div id="<?php echo $id; ?>" class="splide<?php echo $astyle.$pgn;?>">

					<div class="splide__track">
						<div class="splide__list">
						<?php while( have_rows('slides') ): the_row();?>

						<?php 
						
							$img_size = get_field('image_size') ?: 'large';
							$sname = get_sub_field('slide_name') ?: 'noname';
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

						<div class="splide__slide <?php echo 'slide-'.$sname; ?>">
							<?php echo $img_bg;?>	
							<?php echo $img_content;?>
						</div>

						<?php endwhile; ?>
						</div>
					</div>

					</div>

				<?php if( !in_the_loop() ):?>
					<p class="splide__message">Here's an example of how each slide may look. 
					For an actual visual, please preview this page.</p>
				<?php endif;?>
			
			</div>
			<?php else:?>

				<div class="nocontent">
					<p><?php _e('Add some slides to start. Use the sidebar settings to begin.','nc-framework');?></p>
				</div>

	
			<?php endif; // end slides ?>

			

<style id="<?php echo $id; ?>-css">

	<?php if( !in_the_loop() ):?>
			
	.editor-styles-wrapper <?php echo '#'.$id; ?> {
		overflow-x:hidden;
	}

	.editor-styles-wrapper .splide__message {
		display: block;
		text-align: center;
		padding-top: calc( -1 * var(--u-padding) );
		font-size: var(--txt-small);
		max-width: 400px;
		margin-inline: auto;
		margin-bottom:0;
	}
  
	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide {
		margin-bottom:1em;
		position: relative;
		margin-inline:auto;
		max-width:600px;
		background-color: #f2f2f2;
	}

	.editor-styles-wrapper .splide__arrows {
		display:none;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__bg {
    mix-blend-mode: var(--image-blend-mode);
    opacity: var(--image-opacity);
    background-size: cover;
		background-position: center;
		background-repeat:no-repeat;
		position:absolute;
		inset:0;
  }

  .editor-styles-wrapper <?php echo '#'.$id; ?> .splide__content {
		padding:1em 2rem;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?> .splide__slide ~ .splide__slide {
		display:none;
	}

	.editor-styles-wrapper <?php echo '#'.$id; ?>.splide {
		position: relative;
	}	
	
	<?php endif;?>

	<?php echo '#'.$id; ?> .splide__slide {
		aspect-ratio: <?php echo $slide_aspect_ratio;?>
	}


	/* Arrow Display */

	<?php if( get_field('show_on_hover') ):?>
	<?php echo '#'.$id; ?> .splide__arrow { opacity:0; }
	.splide__box:hover <?php echo '#'.$id; ?> .splide__arrow {	opacity:1; }
	<?php endif;?>

	/* /End Arrow Display */


	<?php echo '#'.$id; ?> .splide__content.splide--has-image.splide--has-text {
		position:absolute;
		display: flex;
		flex-direction:column;
		color: <?php echo get_field('slide_text_color') ?: '#ffffff';?>;
		align-items: start;
		z-index: 5;
		<?php echo $center_text; ?>
		
		<?php if($tposition == 'middle'):?>
		inset:0;
		justify-content: center;
		
		<?php elseif($tposition == 'bottom'): ?>
		inset: auto 0 0;
		justify-content: end;
		padding-top: 4rem;

		<?php endif;?>

		& > * {
			z-index: 6;
			position: relative;
			align-self: stretch;
			max-width: <?php echo $text_max_width.'px'; ?>;
			filter: drop-shadow(1px 1px 3px rgba(0,0,0,0.5));

			<?php if($center): ?>
			margin-inline: auto;
			<?php endif;?>
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

		<?php if($tposition == 'bottom'): ?>
		background: linear-gradient(to top, <?php echo $overlay; ?>, transparent);

		<?php else: ?>
		background: <?php echo $overlay; ?>;
		<?php endif;?>
		
	}

@media(max-width:<?php echo get_field('break_width').'px' ?:'0'; ?>){
<?php echo '#'.$id; ?> .splide__slide {
		aspect-ratio: <?php echo $slide_aspect_ratio_mobile;?>
	}
}

@media(max-width:<?php echo get_field('break_width').'px' ?:'1024'; ?>){
	<?php echo '#'.$id; ?>{	--arrow-width: 25px; }
}

<?php nc_box_styles($id_box); ?>

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
		new Splide( '<?php echo '#'.$id; ?>', {
		type   : '<?php echo get_field('type') ?: loop; ?>',
		perPage: <?php the_field('per_page') ?: 3; ?>,
		perMove: <?php the_field('per_move') ?: 3; ?>,
		autoplay: <?php if ( get_field('auto_play') ) { echo 'true'; } else { echo 'false'; } ?>,
		rewind: <?php if ( get_field('rewind') ) { echo 'true'; } else { echo 'false'; } ?>,
		<?php if(get_field('center_slide')) { echo "focus : 'center',"; } else { echo null;}; ?>
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
		arrows: <?php if ( get_field('arrows') == 1 ) { echo 'true'; } else { echo 'false'; } ?>,

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