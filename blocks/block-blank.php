<?php

// New Block
add_action('acf/init', 'nc_blank_block');
function nc_blank_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_blank',
            'title'             => __('NC Blank Box', 'nc-framework'),
            'description'       => __('A blank box to write text or HTML into.', 'nc-framework'),
            'render_callback'   => 'nc_blank_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('blank', 'section' ),
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

function nc_blank_block_markup( $block, $content = '', $is_preview = false ) {

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
	$tcontent = get_field('text_content');

?>
	<section id="<?php echo $id; ?>" class="ncblank<?php echo esc_attr($className); ?>" <?php echo nc_block_attr();?>>
        <div class="ncontain<?php echo sal_classes().nc_contain_classes(); ?>" <?php echo sal_animate().nc_contain_attr();?>>
       
        <?php nc_before_content(); ?>

        <?php if($tcontent):?><?php echo '<div class="nc_content_block_main">'.$tcontent.'</div>';?><?php else:?> 
        <div class="nc_content_block_main"><p>Add some content...</p></div>
        <?php endif; ?>

        <?php nc_after_content(); ?>

		</div>
	</section>

<style id="<?php echo $id; ?>-block-css">

<?php nc_box_styles($id); ?>

<?php nc_block_custom_css(); ?>

</style>

<?php
}

?>