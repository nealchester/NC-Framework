<?php

// New Block
add_action('acf/init', 'nc_list_block');
function nc_list_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_list',
            'title'             => __('NC Icon List', 'nc-framework'),
            'description'       => __('A text list with font or SVG icons.', 'nc-framework'),
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
		<div class="ncontain<?php echo nc_contain_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>
		
		<?php nc_before_content(); ?>

		<?php if( have_rows('list_content') ): ?>

		<ul class="nclist_group nc_content_block_main">

		<?php while( have_rows('list_content') ): the_row();
			$label = get_sub_field('label');
			$icon = get_sub_field('icon');
			$text = get_sub_field('text');
			$link = get_sub_field('link');
			$svg = get_sub_field('svg_code');
		?>

		<li class="nclist_item">

		<?php if($link):?>	
		<a class="nclist_link"<?php if($link['url']) { echo' href="'.esc_url($link['url']).'"'; } if($link['target']){ echo' target="'.esc_attr($link['target']).'"';} ?>>
		<div class="nclist_box">

			<?php if($svg):?>
			<div class="nclist_svg">
				<?php echo $svg; ?>
			</div>
			<?php elseif($icon):?>
				<div class="nclist_icon">
					<?php echo '<span class="'.$icon.'"></span>'; ?>
				</div>
			<?php else :?>
			<?php endif;?>
			<div class="nclist_content">
				<div class="nclist_label"><?php echo $label; ?></div>
				<div class="nclist_text"><?php echo $text; ?></div>
			</div>

		</div>
		</a>

		<?php else:?>

		<div class="nclist_box">
			
			<?php if($svg):?>
			<div class="nclist_svg">
				<?php echo $svg; ?>
			</div>
			<?php elseif($icon):?>
				<div class="nclist_icon">
					<?php echo '<span class="'.$icon.'"></span>'; ?>
				</div>
			<?php else :?>
			<?php endif;?>
			<div class="nclist_content">
				<div class="nclist_label"><?php echo $label; ?></div>
				<div class="nclist_text"><?php echo $text; ?></div>
			</div>

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