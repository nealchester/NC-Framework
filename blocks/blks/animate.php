<?php

// New Block
add_action('acf/init', 'nc_animate_block');
function nc_animate_block() {

    // register a items block
    acf_register_block_type(array(
    'name'              => 'nc_animate',
    'title'             => __('NC Animate', 'nc-framework'),
    'description'       => __('Use this block as a wrapper. Whatever you put inside you can animated on scroll.', 'nc-framework'),
    'render_callback'   => 'nc_animate_block_markup',
    'category'          => 'common',
    'icon'              => get_nc_icon('nc-block'),
    'mode'              => 'preview',
    'keywords'          => array('animate', 'scroll animation', 'animation' ),
    'post_types'        => get_post_types(),
    'supports'          => array( 
    'mode' => true,
    'multiple' => true,
    'jsx' => true,
    ),
    ));
}

/* This displays the block */

function nc_animate_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }

	//ACF Block
	/* Not necessary as this block fields are in block-functions.php */

?>
	

	<div class="ncanimate<?php echo esc_attr($className);?>" <?php echo nc_animate().nc_block_attr();?>>	
		<?php echo nc_inner_animated_blocks(); ?>
	</div>


<?php } ?>