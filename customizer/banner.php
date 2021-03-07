<?php
function nc_customizer_section_banner($wp_customize){

    $wp_customize->add_section('header_image', array(
    'title' => 'Banner Heading',
    'description' => '',
    'panel' => 'layout_panel'
    ));

    // Use featured image if available
    $wp_customize->add_setting('banner_featured', array(
    'default' => true,
    'sanitize_callback' => 'nc_sanitize_checkbox'
    ));
    $wp_customize->add_control('banner_featured', array(
    'label' => 'Use featured image as background',
    'section' => 'header_image',
    'type' => 'checkbox'
    ));

    // Main Heading Layout
    $wp_customize->add_setting('main_title_format', array(
    'default' => 'plain-text',
    'sanitize_callback' => 'nc_sanitize_radio'
    ));
    $wp_customize->add_control('main_title_format', array(
    'label' => 'Main Heading Layout',
    'section' => 'header_image',
    'type' => 'radio',
        'choices' => array(
        'plain-text' => 'Plain Text',
        'hero-text' => 'Hero',
        'split-text' => 'Split Screen')
    ));
}
add_action('customize_register', 'nc_customizer_section_banner');
?>