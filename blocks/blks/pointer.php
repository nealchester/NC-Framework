<?php

// New Block
add_action('acf/init', 'nc_pointer_block');
function nc_pointer_block() {

    // register a items block
    acf_register_block_type(array(
        'name'              => 'nc_pointer',
        'title'             => __('NC Pointer', 'nc-framework'),
        'description'       => __('A pointer to direct you to the next block', 'nc-framework'),
        'render_callback'   => 'nc_pointer_block_markup',
        'category'          => 'layout',
        //'icon'            => 'format-image',
        'mode'              => 'preview',
        'keywords'          => array('pointer', 'arrow', 'spacer', 'separater' ),
        'post_types'        => array('post', 'page'),
        'align'             => 'full',
        'supports'          => array( 
                                'align' => array( 'full' ), 
                                'mode' => true,
                                'multiple' => true,
                                ),
    ));
}

/* This displays the block */

function nc_pointer_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

	//ACF Block
    $size = get_field('size') ?: '20';
    $color = get_field('color') ?: 'red';

?>

    <div id="<?php echo $id; ?>"></div>

    <style id="<?php echo $id; ?>-block-css">
    <?php echo '#'.$id; ?> { width:100%; position:relative; }
    <?php echo '#'.$id.':after'; ?> {
    --size: <?php echo $size.'px'; ?>; 
    --sizen: <?php echo '-'.$size.'px'; ?>; 
    background: <?php echo $color; ?>;
    content: '';
    width: var(--size);
    height: var(--size);
    transform: rotate(45deg);
    position: absolute;
    z-index:100;
    left: 50%;
    margin-left: calc( var(--sizen) / 2 );
    margin-top: calc( var(--sizen) / 2 );
    top: 100%;
    }
    </style>
    
    <?php
}
?>