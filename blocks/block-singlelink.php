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
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('link', 'inline link' ),
			'post_types'        => array('post', 'page'),
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
	$expand = get_field('full_width_on_mobile');
	if(get_field("before_title")) {	$before_text = '<strong>'.get_field("before_title").'</strong> '; }
?>

	<div id="<?php echo $id; ?>" class="ncard ncard-singlelink<?php echo esc_attr($className); ?><?php echo sal_classes(); ?>" <?php echo sal_animate().nc_block_attr();?>>

	<?php if($type == 'internal' && $inlink ):?>

		<?php 
		if (get_field("featured_image_focus", $inlink->ID)){
			$featured_image_focus = 'object-position:'.get_field("featured_image_focus",$inlink->ID).'; transform-origin:'.get_field("featured_image_focus",$inlink->ID).';'; }
		else { $featured_image_focus = 'object-position:center; transform-origin:center;'; }

		setup_postdata( $inlink );?>

		<a class="ncard_link" href="<?php echo get_permalink($inlink->ID); ?>">
			<div class="ncard_container">
				<div class="ncard_image">
					<?php if(!empty($image_url)):?>
					<div class="ncard_imgcon">
						<?php echo wp_get_attachment_image( $image_url, 'medium', null, array( "class" => "ncard_img") ); ?>
					</div>
					<?php elseif(get_the_post_thumbnail_url($inlink->ID)):?>
					<div class="ncard_imgcon">
						<?php echo get_the_post_thumbnail( $inlink->ID, 'medium', array( "class" => "ncard_img", "style" => $featured_image_focus ) ); ?>
					</div>
					<?php else:?>
					<div class="ncard_imgcon ncard-noimage">
						<img class="ncard_img" src="<?php nc_fallbackimage(); ?>" alt="default image" />
					</div>
					<?php endif; ?>
				</div>
				<div class="ncard_text">
					<div class="ncard_url"><?php get_template_part('img/icon-link.svg');?> <?php echo get_bloginfo('name') ?></div>
					<div class="ncard_title"><?php echo $before_text.get_the_title($inlink->ID); ?></div>
					<?php if($after_text){ echo'<div class="ncard_posttext">'.$after_text.'</div>'; } else { /* echo '<div class="ncard_posttext">'.get_the_excerpt($inlink->ID).'</div>';*/ } ?>
				</div>
			</div>
		</a>

		<?php wp_reset_postdata();?>

	<?php elseif($type == 'external'):?>
	
		<a class="ncard_link" href="<?php echo $exlink['url']; ?>"<?php if($exlink['target']) { echo ' target="'.$exlink['target'].'"'; } ?>>
			<div class="ncard_container">
				<div class="ncard_image">
					<?php if(!empty($image_url)):?>
					<div class="ncard_imgcon">
						<?php echo wp_get_attachment_image( $image_url, 'medium', null, array( "class" => "ncard_img") ); ?>
					</div>
					<?php else:?>
					<div class="ncard_imgcon ncard-noimage">
						<img class="ncard_img" src="<?php nc_fallbackimage(); ?>" alt="default image" />
					</div>
					<?php endif; ?>
				</div>
				<div class="ncard_text">
				<div class="ncard_url"><?php get_template_part('img/icon-link.svg');?> <?php $exurl = $exlink['url']; echo parse_url($exurl, PHP_URL_HOST); ?></div>
					<div class="ncard_title"><?php echo $before_text.$exlink['title']; ?></div>
					<?php if($after_text){ echo'<div class="ncard_posttext">'.$after_text.'</div>'; } ?>
				</div>
			</div>
		</a>

	<?php else:?>

		<a class="ncard_link" href="#">
			<div class="ncard_container">
				<div class="ncard_image">
					<div class="ncard_imgcon ncard-noimage"></div>
				</div>
				<div class="ncard_text">
					<div class="ncard_url"><?php get_template_part('img/icon-link.svg');?> <?php echo esc_url( get_home_url() ); ?></div>
					<div class="ncard_title">A Sample Link that Goes Nowhere</div>
				</div>
			</div>
		</a>

	<?php endif;?>

	</div>

	<?php if( !empty($expand)):?>
	<style id="<?php echo $id; ?>-block-css">
		@media(max-width:<?php echo $expand.'px'; ?>){
			<?php echo '#'.$id; ?>.ncard-singlelink { width: 100% !important; }
			<?php echo '#'.$id; ?>.ncard-singlelink .ncard_container { border-radius: 0; border-left: none 0 !important; border-right: none 0 !important; }
		}

		<?php if(get_field('custom_styles')):?> 
		/* Custom CSS */
		<?php the_field('custom_styles');?>
		<?php endif;?>
		
	</style>
	<?php endif;?>

    <?php
}
?>