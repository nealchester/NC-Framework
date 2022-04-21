<?php

// New Block
add_action('acf/init', 'nc_divider_block');
function nc_divider_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_divider',
            'title'             => __('NC Divider', 'nc-framework'),
            'description'       => __('An svg image to divide sections', 'nc-framework'),
            'render_callback'   => 'nc_divider_block_markup',
            'category'          => 'layout',
            //'icon'            => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('divider', 'division' ),
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

function nc_divider_block_markup( $block, $content = '', $is_preview = false ) {

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
	$rotate = get_field('rotate') ?: 'ncdivider-topleft';
    $position = get_field('position') ?: 'ncdivider-overlaynone';

    $divcolor = get_field('divider_color') ?: '#ccc';
    $bgcolor = get_field('bgcolor') ?: 'transparent';
    $customsvg = get_field('custom_svg');
    $divstyle = get_field('divider_style');

?>
	<?php 
	wp_enqueue_style('nc-blocks-divider'); 
	?>

    <div id="<?php echo $id; ?>" class="ncdivider <?php echo ' '.$rotate.' '.$position; echo esc_attr($className);?>" <?php if($bgcolor):?>style="background:<?php echo $bgcolor; ?>"<?php endif?> <?php echo nc_animate().nc_block_attr();?>>
		<div class="ncdivider_container">
            <?php 
            if($customsvg) { echo $customsvg; }
            elseif( $divstyle == 'curve' ) { get_template_part('blocks/dividers/curve.svg'); } 
            elseif( $divstyle == 'curve invert' ) { get_template_part('blocks/dividers/curve-invert.svg'); } 
            elseif( $divstyle == 'curve asem' ) { get_template_part('blocks/dividers/curve-asem.svg'); } 
            elseif( $divstyle == 'curve asem invert' ) { get_template_part('blocks/dividers/curve-asem-invert.svg'); } 
            elseif( $divstyle == 'pyramids' ) { get_template_part('blocks/dividers/pyramids.svg'); } 
            elseif( $divstyle == 'pyramids invert' ) { get_template_part('blocks/dividers/pyramids-invert.svg'); } 
            elseif( $divstyle == 'sand hill' ) { get_template_part('blocks/dividers/sand-hill.svg'); } 
            elseif( $divstyle == 'triangle' ) { get_template_part('blocks/dividers/triangle.svg'); } 
            elseif( $divstyle == 'triangle invert' ) { get_template_part('blocks/dividers/triangle-invert.svg'); } 
            elseif( $divstyle == 'tilt' ) { get_template_part('blocks/dividers/tilt.svg'); } 
            ?>
		</div>
	</div>

    <style id="<?php echo $id; ?>-block-css">
        <?php echo '#'.$id; ?> svg { width:100%; height:auto; display:block; transform-origin: center; }
        <?php echo '#'.$id; ?> svg path { fill:<?php echo $divcolor; ?>; }
        <?php echo '#'.$id; ?>.ncdivider-topleft svg { transform:scale(1, 1); }
        <?php echo '#'.$id; ?>.ncdivider-topright svg { transform:scale(-1, 1); }
        <?php echo '#'.$id; ?>.ncdivider-bottomright svg { transform:rotate(180deg); }
        <?php echo '#'.$id; ?>.ncdivider-bottomleft svg { transform:rotate(180deg)scale(-1, 1); }

        <?php if(get_field('custom_styles')):?> 
        /* Custom CSS */
        <?php the_field('custom_styles');?>
        <?php endif;?>
    </style>
    
    <?php
}
?>