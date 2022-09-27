<?php

// New Block
add_action('acf/init', 'nc_heroslider_block');
function nc_heroslider_block() {

	// register a items block
	acf_register_block_type(array(
		'name'              => 'nc_heroslider',
		'title'             => __('NC Hero Slider', 'nc-framework'),
		'description'       => __('Image Slider', 'nc-framework'),
		'render_callback'   => 'nc_heroslider_block_markup',
		'category'          => 'layout',
		//'icon'            => 'format-image',
		'mode'              => 'edit',
		'keywords'          => array('slider', 'images', 'gallery', 'sliders', 'slide' ),
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

function nc_heroslider_block_markup( $block, $content = '', $is_preview = false ) {

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

	<div id="<?php echo $id; ?>" class="splide__box<?php echo esc_attr($className);?>" <?php echo nc_block_attr();?>>
  
    <?php if( $slides ): ?>
			<div class="splide__wrap">
				<noscript>Your browser does not support JavaScript!</noscript>
				<div class="splide" <?php echo 'id="'.$slider_id.'"'; ?> style="visibility:hidden">
					<div class="splide__track" data-aos="fade" data-aos-duration="1000" data-aos-delay="500">
						<div class="splide__list">
						<?php foreach( $slides as $image ):?>

						<?php 	
						$mdisplay = get_field('meta_display');
						$link2img = get_field('link_to_image'); 
						?>

						<div class="splide__slide">

						<?php if($link2img == 'image_page'):?><a class="splide__plink" aria-label="View larger" href="<?php echo get_attachment_link($image['ID']); ?>"><?php endif;?>

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

						<?php if($link2img == 'image_page'):?></a><?php endif;?>

						</div>

						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

      <?php else: ?>

      <div class="splide__wrap">
        <noscript>Your browser does not support JavaScript!</noscript>
        <div class="splide" <?php echo 'id="'.$slider_id.'"'; ?> style="visibility:hidden">
          <div class="splide__track">
            <div class="splide__list">
              <div class="splide__slide">
                <div class="splide__padding"></div>
                <img class="splide__img" 
                src="<?php nc_block_fallback_image(); ?>" 
                alt="<?php _e('A default picture','nc-framework');?>" 
                title="<?php _e('A default picture','nc-framework');?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
			<?php endif; // end slides ?>

      <?php 
      $hero_content = get_field('hero_slider_content');
      if( $hero_content ):?>
      <div class="splide__content">
        <div class="ncontain">
          <div class="splide__container<?php echo nc_contain_classes(); ?>" <?php echo nc_animate().nc_contain_attr();?>>
            <?php // echo $hero_content; ?>
            <?php echo nc_inner_blocks(1); ?>
          </div>
        </div>
      </div>
      <?php endif;?>

	</div><?php // slider box end  ?>

<style id="<?php echo $id; ?>-block-css">

<?php
/* vars for content position */
  $hcp = get_field('hero_content_position');
      if ( $hcp == 'tl') {
        $position = 'align-items:start; justify-content:start;';
      } 
  elseif ( $hcp == 'tc') {
    $position = 'align-items:start; justify-content:center;';
  } 
  elseif ( $hcp == 'tr') {
    $position = 'align-items:start; justify-content:end;';
  } 

  elseif ( $hcp == 'ml') {
    $position = 'align-items:center; justify-content:start;';
  } 
  elseif ( $hcp == 'mc') {
    $position = 'align-items:center; justify-content:center;';
  } 
  elseif ( $hcp == 'mr') {
    $position = 'align-items:center; justify-content:end;';
  } 

  elseif ( $hcp == 'bl') {
    $position = 'align-items:end; justify-content:start;';
  } 
  elseif ( $hcp == 'bc') {
    $position = 'align-items:end; justify-content:center;';
  } 
  elseif ( $hcp == 'br') {
    $position = 'align-items:end; justify-content:end;';
  } 
  else {
    $position = 'align-items:center; justify-content:center;';
  }

?>

<?php echo '#'.$id; ?>.splide__box {
  position: relative;
  padding:0 !important
}

<?php echo '#'.$id; ?> .splide__content,
<?php echo '#'.$id; ?> .splide__slide:before {
  position: absolute;
  width:100%;
  height:100%;
  top:0; right:0; left:0; bottom:0;
  display:flex;
}

<?php if($hero_content):?>

  <?php echo '#'.$id; ?> .splide__slide:before {
    display: block;
    content:'';
    background-color: <?php echo get_field('overlay_color') ?: 'rgba(0,0,0,0.5)'; ?>;
    z-index: 7;
  }

  <?php echo '#'.$id; ?> .ncontain {
    height: 100%;
    display:flex;
    <?php echo $position; ?>
  }

  <?php echo '#'.$id; ?> .splide__container {
    max-width: <?php echo get_field('max_content_width') ?: '600'; echo 'px'; ?>;
    position: relative;
    z-index: 21;
  }
/*
  body.wp-admin <?php echo '#'.$id; ?> .splide__container {
    z-index: 10;
  }
  */

  <?php echo '#'.$id; ?> .splide__arrow {
  background: rgba(0,0,0,0);
  }

  <?php echo '#'.$id; ?> .ncgallery_caption {
    background: transparent;
    text-align:right;
    padding-inline: var(--gap);
  }

<?php endif;?>

<?php echo '#'.$id; ?> .splide__arrow {
  height:100%;
}

<?php echo '#'.$id; ?> .splide__arrows {
  z-index: 20;
}

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

	body.wp-admin <?php echo '#'.$id; ?> .splide__img  {
		height: 100% !important
	}

	body.wp-admin <?php echo '#'.$id; ?> .splide__slide {
		outline:solid 1px #eee;
		position: relative;
    margin-bottom:0;
	}

  body.wp-admin <?php echo '#'.$id; ?> .splide__slide ~ * {
    display:none;
  }

	body.wp-admin .splide {
		visibility: visible !important;	
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

<script>
	document.addEventListener( 'DOMContentLoaded', function () {
		new Splide( '<?php echo '#'.$slider_id; ?>', {
		type   : 'fade',
		perPage: 1,
		perMove: 1,
		autoplay: <?php if ( get_field('auto_play') ) { echo 'true'; } else { echo 'true'; } ?>,
		rewind: <?php if ( get_field('rewind') ) { echo 'true'; } else { echo 'true'; } ?>,

		speed: <?php the_field('speed') ?: 600; ?>,
		interval: <?php the_field('pause') ?: 3000; ?>,

		pagination: false,
		arrows: <?php if ( get_field('arrows') ) { echo 'true'; } else { echo 'true'; } ?>,

		breakpoints: {
			<?php the_field('break_width') ?: 0; ?>: {
				pagination: false,
				arrows: <?php if( get_field('show_arrows') ) { echo 'true'; } else { echo 'true'; } ?>
			}
		},

		}).mount();
	});
</script>


<?php endif; ?>
<?php
}
?>