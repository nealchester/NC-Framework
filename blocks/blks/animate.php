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
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('animate', 'scroll animation', 'animation' ),
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

function nc_animate_block_markup( $block, $content = '', $is_preview = false ) {

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
	/* ... */

?>
	

	<div id="<?php echo $id; ?>" class="ncanimate<?php echo esc_attr($className);?>" <?php echo nc_animate().nc_block_attr();?>>			
			<?php echo nc_inner_animated_blocks(); ?>
	</div>

	<style id="<?php echo $id; ?>-block-css">
		<?php nc_block_custom_css(); ?>
	</style>


<?php } ?>