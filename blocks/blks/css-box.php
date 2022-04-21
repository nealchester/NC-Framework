<?php

// New Block
add_action('acf/init', 'nc_cssbox_block');
function nc_cssbox_block() {

    // register a items block
    acf_register_block_type(array(
        'name'              => 'nc_cssbox',
        'title'             => __('NC CSS Box', 'nc-framework'),
        'description'       => __('A box to write custom CSS for the page', 'nc-framework'),
        'render_callback'   => 'nc_cssbox_block_markup',
        'category'          => 'layout',
        //'icon'            => 'format-image',
        'mode'              => 'preview',
        'keywords'          => array('css', 'custom css' ),
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

function nc_cssbox_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
	$id = uniqid();

?>

    <div class="nc-cssbox"></div>

    <?php if( get_field('custom_css_box') ): ?>
    <style id="<?php echo 'custom-cssbox-'.$id; ?>">
    <?php the_field('custom_css_box'); ?>
    
    /* ------ for internal use ------- */

    div.nc-cssbox {
        display:none;
    }

    #wpwrap div.nc-cssbox {
        margin:0 auto;
        width:100%;
        height:100px;
        text-align:center;
        background: #eee;
        color:#000;
        display:flex;
        align-items:center;
        justify-content:center;
        border:dashed 3px #ccc;
    }

    #wpwrap div.nc-cssbox:before {
        content:"<?php _e('NC CSS Block','nc-framework');?>";
    }
    </style>
    <?php endif;?>
    
<?php
}
?>