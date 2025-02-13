<?php

// New Block
add_action('acf/init', 'nc_cssbox_block');
function nc_cssbox_block() {

    // register a items block
    acf_register_block_type(array(
        'name'              => 'nc_cssbox',
        'title'             => __('NC Custom CSS', 'nc-framework'),
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
                                'multiple' => false,
                                ),
    ));
}

/* This displays the block */

function nc_cssbox_block_markup( $block, $content = '', $is_preview = false ) {?>

    
    <div class="nc-cssbox"></div>
   
    <style id="ncustom-css">

    <?php echo get_field('custom_css_box'); ?>

        /* The below CSS is for internal use */
        #wrapper .nc-cssbox{
            display:none;
        }
        .editor-styles-wrapper div.nc-cssbox {
            margin-inline:auto;
            width:98%;
            height:50px;
            text-align:center;
            background: #eee;
            color:#000;
            display:flex;
            align-items:center;
            justify-content:center;
            border:dashed 3px #ccc;
        }
        .editor-styles-wrapper div.nc-cssbox:before {
            content:"<?php _e('Active Custom CSS Block','nc-framework');?>";
        }
    </style>
    
<?php } ?>