<?php

// New Block
add_action('acf/init', 'nc_gallery_block');
function nc_gallery_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_gallery',
            'title'             => __('NC Gallery', 'nc-framework'),
            'description'       => __('A gallery of images', 'nc-framework'),
            'render_callback'   => 'nc_gallery_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'edit',
            'keywords'          => array('gallery', 'images' ),
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

function nc_gallery_block_markup( $block, $content = '', $is_preview = false ) {

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
	$gallery = get_field('the_gallery');
	$mposition = get_field('meta_position');
	
	$clayout = get_field('column_layout');
	$cstyle = get_field('column_style');
	$columns = get_field('column_count');
	$bcolumns = get_field('break_columns');
	$cgap = get_field('column_gap');
	$rgap = get_field('row_gap');
	$ratio = get_field('thumb_shape');

	$thumb_width = get_field('thumb_min_width') ?: "250";
	$thumb_size = get_field('thumb_image_size') ?: 'medium';

	$breaklayout = get_field('breakpoint_layout');

	if (get_field('breakpoint')) { $breakpoint = get_field('breakpoint'); } else { $breakpoint = '640'; }

?>

	<?php 
	wp_enqueue_style('nc-blocks-gallery');
	wp_enqueue_style('nc-blocks-columns'); 
	?>

	<div id="<?php echo $id; ?>" class="ncgallery_container<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
			<div class="ncontain">
			<?php if($gallery):?>

			<div class="ncgallery ncolumns nc_content_block_main<?php echo ' '.$cstyle.' '.$clayout.' '.$breaklayout.' '.$mposition;?>">
			
			<?php $i = 1; foreach( $gallery as $image ):?>
			
			<?php 
				$mdisplay = get_field('meta_display');
				$link2img = get_field('link_to_image');
			?>

				<figure class="ncgallery_item ncgallery_item-<?php echo $i++;?>">
					<?php if(get_field('custom_link', $image['ID'])):?><a class="ncgallery_link" href="<?php echo esc_url( get_field('custom_link', $image['ID']) ); ?>">
					<?php elseif($link2img == 'image_page'):?><a class="ncgallery_link" aria-label="<?php _e('View larger','nc-framework');?>" href="<?php echo get_attachment_link($image['ID']); ?>">
					<?php elseif($link2img == 'image_lightbox'):?><a data-title="<?php echo $image['title']; ?>" aria-label="<?php _e('View larger','nc-framework');?>" class="ncgallery_link <?php echo'ncgimg_'.$id; ?>" href="<?php echo wp_get_attachment_image_url($image['ID'], 'large'); ?>"><?php endif;?>
						<div class="ncgallery_size">
							<?php echo wp_get_attachment_image( $image['ID'], $thumb_size, '', array( 
								"class" => "ncgallery_image", 
								"style" => nc_block_image_focus($image['ID'])
								) ); ?>
						</div>
					<?php if( get_field('custom_link', $image['ID']) ):?></a>
					<?php elseif($link2img == 'image_page'):?></a>
					<?php elseif($link2img == 'image_lightbox'):?></a><?php endif;?>

					<?php if($mdisplay && in_array('titles', $mdisplay) || $mdisplay && in_array('captions', $mdisplay)):?>
					<figcaption class="ncgallery_caption"><?php if($mdisplay && in_array('titles', $mdisplay) && $image['title']) { echo'<span class="ncgallery_title">'.$image['title'].'</span>';}?><?php if($mdisplay && in_array('captions', $mdisplay) && $image['caption']) { echo'<span class="ncgallery_desc">'.$image['caption'].'</span>';}?></figcaption>
					<?php endif;?>
				</figure>

			<?php endforeach; ?>

			</div>

			<?php endif;?>
			</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

<?php echo '#'.$id; ?> .ncolumns {
	--count: <?php if($columns) { echo $columns;} else { echo '3'; } ?>;
    --column-gap: <?php if($cgap){ echo $cgap; } else { echo'1rem'; } ?>;
    --row-gap: <?php if($rgap){ echo $rgap; } else { echo'1rem'; } ?>;
	--bottom-box-padding: var(--u-padding); /* Bottom padding of the box */
	--img-height:<?php if($ratio){ echo $ratio; } else { echo'70%'; } ?>;
	--min-col-width: <?php echo $thumb_width.'px'; ?>;
}


.editor-styles-wrapper .ncgallery_size {
    height: auto;
}

/* Responsive */
<?php if($breakpoint && $breaklayout == 'ncolumns-scroll'):?>
@media(max-width:<?php echo $breakpoint; ?>px){

	<?php echo '#'.$id; ?> .ncolumns-scroll {
		display:grid;
		--column-gap: 0.75rem;
    grid-template-columns: auto;
    grid-auto-flow: column;
		overscroll-behavior-inline: contain;
    scroll-snap-type: inline mandatory;
    scroll-padding-inline: var(--gap);
		overflow-x:auto;
		overflow-y:hidden;
		padding-inline:var(--gap);
		margin-inline: calc(-1 * var(--gap));
		margin-bottom: calc(-1 * var(--u-padding));
	}

	<?php echo '#'.$id; ?> .ncolumns-scroll > .ncgallery_item { 
		min-width:var(--min-col-width);
		margin-bottom:var(--u-padding);
		scroll-snap-align: start;
	}

	<?php echo '#'.$id; ?> .ncolumns-scroll.ncgallery-capbelow .ncgallery_size {
		height: auto;
	}

	/* If mason was selected */
	<?php echo '#'.$id; ?> .ncolumns-scroll.ncolumns-mason .ncgallery_size {
	padding-top:<?php if($ratio){ echo $ratio; } else { echo'70%'; } ?>;
	}

	<?php echo '#'.$id; ?> .ncolumns-scroll.ncolumns-mason .ncgallery_image {
	position:absolute;
	height:100%;
	}

}


<?php elseif($breakpoint && $breaklayout == 'ncolumns-stack'):?>
@media(max-width:<?php echo $breakpoint; ?>px){
	<?php echo '#'.$id; ?> .ncolumns-stack { grid-template-columns: 1fr; }
	<?php echo '#'.$id; ?> .ncolumns-mason { --count: 1; --min-col-width:0; }
	}

<?php elseif($breakpoint && $breaklayout == 'ncolumns-grid'):?>
@media(max-width:<?php echo $breakpoint; ?>px){
	<?php echo '#'.$id; ?> .ncolumns-grid,
	<?php echo '#'.$id; ?> .ncolumns-mason { 
		--min-col-width:0; 
		grid-template-columns: repeat(<?php if($bcolumns) { echo $bcolumns;} else { echo '2'; } ?>,1fr);
		--count: <?php if($bcolumns) { echo $bcolumns;} else { echo '2'; } ?>;
	}

}
<?php endif;?>

<?php nc_block_custom_css(); ?>

</style>

<?php if( get_field('link_to_image') == 'image_lightbox') :?>

	<?php 
		wp_enqueue_script('nc-blocks-magnify'); 
		wp_enqueue_style('nc-blocks-magnify');
	?>

	<script id="<?php echo 'gallery_'.$id.'_script'; ?>">
		jQuery(document).ready(function() {
			jQuery('<?php echo'.ncgimg_'.$id; ?>').magnificPopup({
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

<?php
}
?>