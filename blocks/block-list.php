<?php

// New Block
add_action('acf/init', 'nc_list_block');
function nc_list_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_list',
            'title'             => __('NC Icon List', 'nc-framework'),
            'description'       => __('A text list with select images and icons', 'nc-framework'),
            'render_callback'   => 'nc_list_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'edit',
            'keywords'          => array('image list', 'icon list', 'list' ),
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

function nc_list_block_markup( $block, $content = '', $is_preview = false ) {

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
	$svg_class = get_field('svg_class');
	$size = get_field('image_size');

?>

	<div id="<?php echo $id; ?>" class="nclist<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
		<div class="ncontain<?php echo sal_classes().nc_contain_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>
		
		<?php nc_before_content(); ?>

		<?php if( have_rows('list_content') ): ?>

		<ul class="nclist_group nc_content_block_main">

		<?php while( have_rows('list_content') ): the_row(); 
			$image_url = get_sub_field('image');
			$image = $image_url['sizes'][ $size ];

			$label = get_sub_field('label');
			$link = get_sub_field('link');
			$svg = get_sub_field('svg');
			$bgimg = get_sub_field('bg_image');
		?>

		<li class="nclist_item">
		<?php if($link):?>	
		<a class="nclist_link"<?php if($link['url']) { echo' href="'.esc_url($link['url']).'"'; } if($link['target']){ echo' target="'.esc_attr($link['target']).'"';} ?>>
		<div class="nclist_box">
		<?php
		if( $bgimg ) {
				echo wp_get_attachment_image( $bgimg, 'medium', '', array("class" => "nclist_bgimg") );
		}?>

		<?php if($image):?>
			<div class="nclist_imgcontain">
				<img src="<?php echo $image; ?>" alt="<?php echo $image_url['alt']; ?>" class="nclist_image<?php if($svg){echo ' '.$svg_class;}?>"/>
			</div><?php else:?>
			<div class="nclist_imgcontain">
				<img src="<?php nc_fallbackimage(); ?>" alt="" class="nclist_image" />
			</div>
		<?php endif;?>
		<div class="nclist_label"><?php echo $label; ?></div>
		</div>
		</a>
		<?php else:?>
		<div class="nclist_box">
		<?php if($image):?>
		<div class="nclist_imgcontain">
			<img src="<?php echo $image; ?>" alt="<?php echo $image_url['alt']; ?>" class="nclist_image<?php if($svg && $svg_class){echo ' '.$svg_class;}?>"/>
		</div>
		<?php else:?>
		<div class="nclist_imgcontain">
			<img src="<?php nc_fallbackimage(); ?>" alt="" class="nclist_image" />
		</div>
		<?php endif;?>
		<div class="nclist_label"><?php echo $label; ?></div>
		</div>
		<?php endif;?>
		</li>

		<?php endwhile; ?>

		</ul>

		<?php endif;?>

		<?php nc_after_content(); ?>
		
		</div>
	</div>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

<?php nc_block_custom_css(); ?>

</style>
    <?php
}
?>