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
            'mode'              => 'edit',
            'keywords'          => array('slider', 'sliders', 'slide' ),
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

	$slider_id = uniqid("nc_splide_");


?>

	<div id="<?php echo $id; ?>" class="splide__box<?php echo esc_attr($className);?>" <?php echo nc_block_attr();?>>
		<div class="ncontain<?php echo nc_contain_classes(); ?>" <?php echo nc_animate().nc_contain_attr();?>>
			<?php nc_before_content(); ?>

			<?php if( have_rows('slides') ): // start slides ?>
			<div class="splide__wrap nc_content_block_main">
				<noscript>Your browser does not support JavaScript!</noscript>
				<div class="splide" <?php echo 'id="'.$slider_id.'"'; ?>>
					<div class="splide__track">
						<div class="splide__list">
						<?php $i = 1; while( have_rows('slides') ): the_row();?>

						<div class="splide__slide <?php echo 'splide__'.$i; ?>">
							<?php 
							$image = get_sub_field('bg_img');
							if($image) { 
									echo wp_get_attachment_image( $image, 'medium', '', array('class' => 'splide__img') ).'<div class="splide__padding"></div>'; 
							} 
							echo get_sub_field('slide');
							?>
						</div>

						<?php $i++; endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; // end slides ?>

			<?php nc_after_content(); ?>
		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

.splide__slide {
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

body.wp-admin .splide__img,
body.wp-admin .splide__padding  {
	display:none
}

.splide__padding {
	width:100%;
	padding-top:var(--slide-height);
} 

 .splide__img {
		position:absolute;
		z-index: 5;
		left:0; top:0; bottom:0; right:0;
		width:100%; height:100%;
		object-fit:cover;
		opacity: var(--image-opacity);
    mix-blend-mode: var(--image-blend-mode);
	}	

	.splide__slide > .splide__img ~ * {
		z-index:10;
		position:relative;
  }
	
	body.wp-admin .splide__slide {
		margin-bottom:1em;
		outline:solid 1px #eee;
	}

	body.wp-admin .splide__slide > :last-child {
		margin-bottom:0;
	}

<?php nc_box_styles($id); ?>

<?php echo '#'.$id; ?> {
	overflow-x:hidden;
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

<script>
	document.addEventListener( 'DOMContentLoaded', function () {
		new Splide( '<?php echo '#'.$slider_id; ?>', {
		type   : '<?php echo get_field('type') ?: slide; ?>',
		perPage: <?php the_field('per_page') ?: 3; ?>,
		perMove: <?php the_field('per_move') ?: 3; ?>,
		autoplay: <?php if ( get_field('auto_play') ) { echo 'true'; } else { echo 'false'; } ?>,
		rewind: <?php if ( get_field('rewind') ) { echo 'true'; } else { echo 'false'; } ?>,

		speed: <?php the_field('speed') ?: 400; ?>,
		interval: <?php the_field('pause') ?: 3000; ?>,

		gap: <?php if( get_field('gap') ) { echo "'".get_field('gap')."'"; } else { echo "'1em'"; } ?>,

		fixedWidth: <?php if( get_field('slide_width') ) { echo "'".get_field('slide_width')."'"; } else { echo '0'; } ?>,
		fixedHeight: <?php if( get_field('slide_height') ) { echo "'".get_field('slide_height')."'"; } else { echo '0'; } ?>,

		direction: <?php if( get_field('direction') ) { echo "'".get_field('direction')."'"; } else { echo "'ltr'"; } ?>,

		pagination: <?php if( get_field('pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
		arrows: <?php if ( get_field('arrows') ) { echo 'true'; } else { echo 'false'; } ?>,

		breakpoints: {
			<?php the_field('break_width') ?: 0; ?>: {
				perPage: <?php the_field('break_per_page') ?: 1; ?>,
				pagination: <?php if( get_field('show_pagination') ) { echo 'true'; } else { echo 'false'; } ?>,
				arrows: <?php if( get_field('show_arrows') ) { echo 'true'; } else { echo 'false'; } ?>
			}
		},

		}).mount();
	});
</script>

<?php endif; ?>
<?php
}
?>