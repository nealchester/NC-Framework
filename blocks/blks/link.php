<?php

// New Block
add_action('acf/init', 'nc_singlelink_block');
function nc_singlelink_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_singlelink',
            'title'             => __('NC Single Link', 'nc-framework'),
            'description'       => __('A related or important link to showcase', 'nc-framework'),
            'render_callback'   => 'nc_singlelink_block_markup',
            'category'          => 'layout',
            'icon'              => get_nc_icon('nc-block'),
            'mode'              => 'preview',
            'keywords'          => array('link', 'inline link' ),
						'post_types'        => get_post_types(),
						'align'             => '',
						'supports'          => array( 
							'align' => array( 'wide', 'full' ), 
							'mode' => true,
							'multiple' => true,
							),
        ));
}

/* This displays the block */

function nc_singlelink_block_markup( $block, $content = '', $is_preview = false ) {

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
	$type = get_field('link_type');
	$inlink = get_field('internal_link');
	$exlink = get_field('external_link');
	$after_text = get_field('after_text');
	$image_url = get_field('image');
	$position = get_field('position');
	$style = get_field('style');
	$breakpoint = get_field('mobile_breakpoint');
	$style_mobile = get_field('style_mobile');
	if(get_field("before_title")) {	$before_text = '<strong>'.get_field("before_title").'</strong> '; }
?>

<?php 
	wp_enqueue_style('nc-blocks-posts');
	?>
	<div id="<?php echo $id; ?>" class="ncard_outerbox">
		<div class="ncard_container">

	<div class="ncard ncard-singlelink<?php echo esc_attr($className); ?>" <?php echo nc_animate().nc_block_attr();?>>
		

		<?php if($type == 'internal' && $inlink ):?>

			<?php setup_postdata( $inlink );?>

				<?php if(!empty($image_url)):?>
				<div class="ncard_imgcon">
					<?php echo wp_get_attachment_image( $image_url, 'medium', null, array( "class" => "ncard_img") ); ?>
				</div>
				<?php elseif(get_the_post_thumbnail_url($inlink->ID)):?>
				<div class="ncard_imgcon">
					<?php echo get_the_post_thumbnail( $inlink->ID, 'medium', array( "class" => "ncard_img", "style" => nc_block_image_focus($inlink->ID) )); ?>
				</div>
				<?php else:?>
				<div class="ncard_imgcon ncard-noimage">
					<img class="ncard_img" src="<?php nc_block_fallback_image(); ?>" alt="default image" />
				</div>
				<?php endif; ?>

				<div class="ncard_text">
					<div class="ncard_url">
						<span class="ncicon nc-link"></span> <?php echo get_bloginfo('name') ?>
					</div>
					<div class="ncard_title">
						<?php echo $before_text.get_the_title($inlink->ID); ?>
					</div>
					<?php if($after_text){ echo'<div class="ncard_posttext">'.$after_text.'</div>'; } else { /* echo '<div class="ncard_posttext">'.get_the_excerpt($inlink->ID).'</div>';*/ } ?>
				</div>

			<a class="ncard_link" href="<?php echo get_permalink($inlink->ID); ?>"></a>

		<?php wp_reset_postdata();?>

	<?php elseif($type == 'external'):?>
	
		<?php if(!empty($image_url)):?>
		<div class="ncard_imgcon">
			<?php echo wp_get_attachment_image( $image_url, 'medium', null, array( "class" => "ncard_img") ); ?>
		</div>

		<?php else:?>
		<div class="ncard_imgcon ncard-noimage">
			<img class="ncard_img" src="<?php nc_block_fallback_image(); ?>" alt="default image" />
		</div>

	<?php endif; ?>
					
		<div class="ncard_text">
			<div class="ncard_url"><span class="ncicon nc-link"></span> <?php $exurl = $exlink['url']; echo parse_url($exurl, PHP_URL_HOST); ?></div>
			<div class="ncard_title"><?php echo $before_text.$exlink['title']; ?></div>
			<?php if($after_text){ echo'<div class="ncard_posttext">'.$after_text.'</div>'; } ?>
		</div>
		
		<a class="ncard_link" href="<?php echo $exlink['url']; ?>"<?php if($exlink['target']) { echo ' target="'.$exlink['target'].'"'; } ?>></a>

			<?php else:?>

				<div class="ncard_imgcon ncard-noimage"></div>
				
				<div class="ncard_text">

					<div class="ncard_url">
						<span class="ncicon nc-link"></span> <?php echo esc_url( get_home_url() ); ?>
					</div>

					<div class="ncard_title">
						<?php _e('A Sample Link that Goes Nowhere','nc-framework');?>
					</div>

				</div>
			
			<a class="ncard_link" href="#"></a>

	<?php endif;?>

			</div>
		</div>
	</div>



	<style id="<?php echo $id; ?>-css">

		<?php if($position == 'float-none' && $style == 'row'):?>
		<?php echo '#'.$id; ?> .ncard_container {
			width:600px;
			max-width: 100%;
			margin-bottom: 1em;
			float:none !important
		}
		<?php endif;?>
		
		<?php if($position == 'float-none' && $style == 'column'):?>
		<?php echo '#'.$id; ?> .ncard_container {
			width:350px;
			max-width: 100%;
			margin-bottom: 1em;
			float:none !important
		}
		<?php endif;?>

		<?php if($position == 'float-left' || $position == 'float-right'):?>
		<?php echo '#'.$id; ?> .ncard_container {
			width: min(50%, 350px);
			margin-bottom: 1em;
		}
		<?php endif;?>

		<?php if($position == 'float-left'):?>	
		<?php echo '#'.$id; ?> .ncard_container {
			float:left;
			margin-right:var(--gap);
		}
		<?php endif;?>

		<?php if($position == 'float-right'):?>	
		<?php echo '#'.$id; ?> .ncard_container {
			float:right;
			margin-left: var(--gap);
		}
		<?php endif;?>

		<?php if($style == 'row'):?>

		<?php echo '#'.$id; ?> .ncard-singlelink {
			--card-direction: row;
			--card-img-width: 35%;
		}

		<?php elseif($style == 'column'):?>

		<?php echo '#'.$id; ?> .ncard-singlelink {
			--card-direction: column;
			--card-img-width: 100%;
		}

		<?php endif;?>

		.editor-styles-wrapper <?php echo '#'.$id; ?> .ncard_img {
			height:100% !important;
		}

		<?php if($position == 'float-left' || $position == 'float-right'):?>
		@media(max-width:480px){
			<?php echo '#'.$id; ?> .ncard_container {
				float:none;	
				width: 100%;
				margin-left:0;
				margin-right:0;
			}
		}
		<?php endif;?>

		<?php if( !empty($breakpoint)):?>
		@media(max-width:<?php echo $breakpoint.'px'; ?>){

				<?php if($style_mobile == 'row'):?>

				<?php echo '#'.$id; ?> .ncard-singlelink {
				--card-direction: row;
				--card-img-width: 35%;
				}

				<?php elseif($style_mobile == 'column'):?>

				<?php echo '#'.$id; ?> .ncard-singlelink {
				--card-direction: column;
				--card-img-width: 100%;
				}

				<?php endif;?>

		}
		<?php endif;?>

		<?php nc_block_custom_css(); ?>

	</style>


<?php } ?>