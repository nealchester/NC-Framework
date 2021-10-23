<?php
function nc_customizer_options_dev($wp_customize)
{
 $wp_customize->add_section('dev_options_section', array(
  'title' => __('Dev Options','nc-framework'),
  'panel' => 'layout_panel',
  'priority' => 1000,
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

// ------------------- Remove Emojis if checked in Customizer -------------------------

if(get_theme_mod('nc_disable_emojis') == true ){

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

// --------------------------- Load Dashicons on the frontend ---------------------------

if(get_theme_mod('nc_load_dashicons', false) == true) {
    function nc_load_dashicons_front_end() {
        wp_enqueue_style( 'dashicons' );  
    }
    add_action( 'wp_enqueue_scripts', 'nc_load_dashicons_front_end' );
}

?>