<?php
function nc_customizer_options_dev($wp_customize) {

    $wp_customize->add_section('dev_options_section', array(
    'title' => __('Developer Options','nc-framework'),
    'panel' => 'layout_panel',
    'priority' => 1000,
    ));

    // Disable Full Screen Editor Gutenberg
    $wp_customize->add_setting('nc_disable_fullscreen_editor', array(
    'default' => true,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('nc_disable_fullscreen_editor', array(
    'label' => __('Disable full screen editor','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => 'This will stop WP from starting the editor screen in full screen. This can be reenabled in the editor settings.'
    )); 

    // Disable Image Compression
    $wp_customize->add_setting('nc_disable_imgcompression', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('nc_disable_imgcompression', array(
    'label' => __('Disable image compression','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => 'This will stop WP from compressing images often reducing their quality. '
    ));  

    // Disable Automated Image Generation
    $wp_customize->add_setting('nc_disable_imgen', array(
    'default' => true,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('nc_disable_imgen', array(
    'label' => __('Disable automated image generation','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => 'This will stop WP from generating extra images. Only Medium and Large will be created; nothing else.'
    )); 
    
    // Disable Emojis in WordPress
    $wp_customize->add_setting('nc_disable_emojis', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('nc_disable_emojis', array(
    'label' => __('Disable Emojis in WordPress','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => ''
    ));

    // Load Dashicons on frontend
    $wp_customize->add_setting('nc_load_dashicons', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('nc_load_dashicons', array(
    'label' => __('Load WordPress\' Dashicons on frontend','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => ''
    ));

    // Enhanced Radio and Check boxes
    $wp_customize->add_setting('enhance_radio_checkboxes', array(
    'default' => true,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('enhance_radio_checkboxes', array(
    'label' => __('Enhance radio and checkboxes','nc-framework'),
    'section' => 'dev_options_section',
    'type' => 'checkbox',
    'description' => __('This will enable CSS that will allow you to fully style the radio and checkbox elements. 
    If the radio or checkboxes don\'t show up, it\'s because the HTML markup is not semantic. 
    The radio/checkbox input elements should always come before the label elements.','nc-framework'),
    ));
 
}
add_action('customize_register', 'nc_customizer_options_dev');

// Disable Full Screen Editor
if( is_admin() && get_theme_mod('nc_disable_fullscreen_editor', true) == true ){

    function nc_disable_editor_fullscreen_by_default() {
        $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
        wp_add_inline_script( 'wp-blocks', $script );
    }
    add_action( 'enqueue_block_editor_assets', 'nc_disable_editor_fullscreen_by_default' );
}

// Disable Image Compression
if( get_theme_mod('nc_disable_imgcompression', false) == true ){
    function disable_img_compression() { return 100; }
    add_filter( 'jpeg_quality', 'disable_img_compression' );
}

// Disable generated image sizes
if(get_theme_mod('nc_disable_imgen', true) == true ){

    function shapeSpace_disable_image_sizes($sizes) {
        unset($sizes['thumbnail']);    // disable thumbnail size
        // unset($sizes['medium']);       // disable medium size
        // unset($sizes['large']);        // disable large size
        unset($sizes['medium_large']); // disable medium-large size
        unset($sizes['1536x1536']);    // disable 2x medium-large size
        unset($sizes['2048x2048']);    // disable 2x large size
        return $sizes;
    }
    add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');

    // disable scaled image size
    add_filter('big_image_size_threshold', '__return_false');

    // disable other image sizes
    function shapeSpace_disable_other_image_sizes() {
        remove_image_size('post-thumbnail'); // disable images added via set_post_thumbnail_size() 
        
        // disable any other added image sizes
        remove_image_size('gform-image-choice-sm');   
        remove_image_size('gform-image-choice-md'); 
        remove_image_size('gform-image-choice-lg'); 
    }
    add_action('init', 'shapeSpace_disable_other_image_sizes');
}

// Remove Emojis if checked in Customizer
if(get_theme_mod('nc_disable_emojis', false) == true ){

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

// Load Dashicons on the frontend
if(get_theme_mod('nc_load_dashicons', false) == true) {
    function nc_load_dashicons_front_end() {
        wp_enqueue_style( 'dashicons' );  
    }
    add_action( 'wp_enqueue_scripts', 'nc_load_dashicons_front_end' );
}

?>