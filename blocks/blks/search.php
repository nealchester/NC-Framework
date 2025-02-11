<?php

// New Block
add_action('acf/init', 'nc_search_block');
function nc_search_block() {

        // register a items block
        acf_register_block_type(array(
            'name'              => 'nc_search',
            'title'             => __('NC Search Box', 'nc-framework'),
            'description'       => __('A search box with additional features.', 'nc-framework'),
            'render_callback'   => 'nc_search_block_markup',
            'category'          => 'layout',
            //'icon'              => 'format-image',
            'mode'              => 'preview',
            'keywords'          => array('search field', 'search' ),
			'post_types'        => array('post', 'page'),
			'supports'          => array( 
									'mode' => true,
									'multiple' => true,
									),
        ));
}

/* This displays the block */

function nc_search_block_markup( $block, $content = '', $is_preview = false ) {

	// ID Setup
    if (get_field('set_id')) { $id = get_field('set_id'); } else { $id = uniqid("block_"); };

    // Create class attribute allowing for custom "className" and "align" values.
    $className = '';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }

	//ACF Block
	$placeholder = get_field('placeholder') ?: 'Search';
    $address = get_field('alt_address') ?: home_url().'/';

?>

    <?php 
    wp_enqueue_style('nc-blocks-search-box');
    ?>

    <form class="ncsearchform" role="search" method="get" action="<?php echo $address; ?>" id="<?php echo $id; ?>">
        <div class="ncsearchform_contain">
            <label for="wp-searchbox" class="hidetext"><?php _e('Search','nc-framework');?></label>
            <input class="ncsearchform_input" type="search" id="wp-searchbox" name="s" <?php if(is_search()){ echo 'placeholder="'.__('Search again','nc-framework').'"'; } else { echo 'placeholder="'.__($placeholder,'nc-framework').'"'; } ?>>
            <button class="ncsearchform_button" type="submit">
            <span class="ncsearchform_icon ncicon nc-search"></span>
            </button>
        </div>  
    </form>

<style id="<?php echo $id; ?>-block-css">

    <?php nc_block_custom_css(); ?>

</style>

<?php } ?>