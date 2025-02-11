<?php

// New Block
add_action('acf/init', 'nc_spacer_block');
function nc_spacer_block() {

    // register a items block
    acf_register_block_type(array(
        'name'              => 'nc_spacer',
        'title'             => __('NC Spacer', 'nc-framework'),
        'description'       => __('A dynamic spacer that resizes according to the viewport.', 'nc-framework'),
        'render_callback'   => 'nc_spacer_block_markup',
        'category'          => 'layout',
        //'icon'              => 'format-image',
        'mode'              => 'preview',
        'keywords'          => array('spacer', 'space', 'gap', 'padding' ),
        'post_types'        => array('post', 'page'),
        'supports'          => array( 
                                'mode' => true,
                                'multiple' => true,
                                ),
        ));
}

/* This displays the block */

function nc_spacer_block_markup( $block, $content = '', $is_preview = false ) {

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
    }
	
    //ACF Block
	$large = get_field('large').'rem' ?: '3';
    $small = get_field('small').'rem' ?: '2';
    $rate =  get_field('rate') ?: '10dvmin';
    $style = ' style="height: clamp('.$small.', '.$rate.', '.$large.')"';

?>
	<div class="ncspacer<?php echo esc_attr($className)?>"<?php echo $style;?>></div>

<?php } ?>