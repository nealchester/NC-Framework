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
        'icon'              => get_nc_icon('nc-block'),
        'mode'              => 'preview',
        'keywords'          => array('spacer', 'space', 'gap', 'padding' ),
        'post_types'        => get_post_types(),
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
    $spacer_id = ' ncspacer-'.rand(100, 200); 
	$large = get_field('large').'rem' ?: '4';
    $small = get_field('small').'rem' ?: '2.3';
    $rate =  get_field('rate') ?: '8vw';
    $style = ' style="height: clamp('.$small.', '.$rate.', '.$large.')"';

?>
	<div class="ncspacer<?php echo esc_attr($className)?>"<?php echo $style.$spacer_id;?>></div>

<?php } ?>