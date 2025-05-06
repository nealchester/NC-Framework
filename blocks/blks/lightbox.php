<?php

// New Block
add_action('acf/init', 'nc_lightbox_block');
function nc_lightbox_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_lightbox',
            'title'             => __('NC Light box', 'nc-block-theme'),
            'description'       => __('A light box containing more information upon click.', 'nc-block-theme'),
            'render_callback'   => 'nc_lightbox_block_markup',
            'category'          => 'layout',
            'icon'              => get_nc_icon('nc-block'),
            'mode'              => 'preview',
            'keywords'          => array('lightbox', 'light box' ),
			'post_types'        => get_post_types(),
			'supports'          => array( 
									'mode' => true,
									'multiple' => true,
                                    'jsx' => true
									),
        ));
}

/* This displays the block */

function nc_lightbox_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
    if (get_field('set_id')) { 
        $id = get_field('set_id'); 
    } 
    else { 
        $id = 'block_'.rand(100, 500); 
    };

    

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }

    // ACF Fields and Variables

    $lb_id = uniqid("lightbox_");

    $lb_content = get_field('lb_content');

    $bgcolor = get_field('bg_color') ?: '#fff';
    $txcolor = get_field('text_color') ?: 'currentColor';
    $xcolor = get_field('x_color') ?: '#ffffff';
    $mwidth = get_field('max_width').'px' ?: '700';
    $ovcolor = get_field('overlay_color') ?: 'rgba(2,0,30,0.8)';

?>

<?php wp_enqueue_style('nc-blocks-lightbox');?>

<div class="lbox" id="<?php echo $id; ?>">
    <div class="lbox_container">
        <?php echo nc_inner_blocks(); ?>
        
        <?php if ($lb_content) :?>
        <label for="<?php echo $lb_id;?>" class="lbox_trigger" aria-hidden></label>
        <?php endif;?>

    </div>

    <input id="<?php echo $lb_id;?>" type="checkbox" class="hide lbox_check" name="popup" value="popup" aria-hidden>

    <div class="lbox_overlay" hidden>
        <label class="lbox_close" for="<?php echo $lb_id;?>">
            <div class="ncicon nc-close"></div>
        </label>
        <div class="lbox_content" <?php echo nc_block_attr();?>>
            <?php echo $lb_content; ?>
        </div>
    </div>

</div>
  

<style id="<?php echo $id; ?>-css">

    <?php echo '#'.$id; ?>.lbox {
    --ovcolor: <?php echo $ovcolor; ?>;
    --bgcolor: <?php echo $bgcolor; ?>;
    --txcolor: <?php echo $txcolor; ?>;
    --xcolor: <?php echo $xcolor; ?>;
    --mwidth: <?php echo $mwidth; ?>;
    }

<?php nc_block_custom_css(); ?>

</style>

<?php } ?>