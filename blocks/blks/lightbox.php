<?php

// New Block
add_action('acf/init', 'nc_lightbox_block');
function nc_lightbox_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_lightbox',
            'title'             => __('NC Light box', 'nc-framework'),
            'description'       => __('A light box containing more information upon click.', 'nc-framework'),
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
    $mwidth = get_field('max_width').'px' ?: '700';
    $ovcolor = get_field('overlay_color') ?: 'rgba(2,0,30,0.8)';
    $bsize = get_field('button_size') .'rem' ?: '1.3';

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
        <div class="lbox_content">
            <label class="lbox_close" for="<?php echo $lb_id;?>"><div class="ncicon nc-close"></div></label>
            <?php echo $lb_content; ?>
        </div>
    </div>

</div>
  

<style id="<?php echo $id; ?>-block-css">

    <?php echo '#'.$id; ?>.lbox {
    --ovcolor: <?php echo $ovcolor; ?>;
    --bgcolor: <?php echo $bgcolor; ?>;
    --txcolor: <?php echo $txcolor; ?>;
    --mwidth: <?php echo $mwidth; ?>;
    --bsize: <?php echo $bsize; ?>;
    }

    @media(min-width:1024px){
        .stop-scrolling { 
            overflow:hidden; 
            padding-right: 17px; 
        }
    }

<?php nc_block_custom_css(); ?>

</style>

<script>
    jQuery(document).ready(function() {
        // Select the input element.  Replace '#myCheckbox' with the actual ID or selector
        // of your checkbox input.
        const $checkbox = jQuery('<?php echo '#'.$lb_id;?>'); 
        const bodyClass = 'stop-scrolling'; // The class you want to add/remove

        // Function to update the body class based on checkbox state
        function updateBodyClass() {
            if ($checkbox.is(':checked')) {
                jQuery('body').addClass(bodyClass);
            } else {
                jQuery('body').removeClass(bodyClass);
            }
        }

        // Initial check when the page loads
        updateBodyClass();

        // Check whenever the checkbox is changed (clicked)
        $checkbox.change(updateBodyClass); 
    });
</script>



<?php } ?>