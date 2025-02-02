<?php
function nc_customizer_default_image($wp_customize){

 $wp_customize->add_section('default_image', array(
  'title' => __('Fallback images','nc-framework'),
  'description' => __('Set a default image for archive listings and the banner (if active).','nc-framework'),
  'panel' => 'layout_panel'
 ));

 // Archive Listings
 $wp_customize->add_setting('fallback_image', array(
    'default' => get_theme_file_uri('/img/default-image.png'),
    'sanitize_callback' => 'nc_sanitize_text'
 ));

 $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'logo',
    array(
    'label'      => __('Upload a default thumbnail image','nc-framework'),
    'section'    => 'default_image',
    'settings'   => 'fallback_image',
)));

 // Banner Heading
 $wp_customize->add_setting('default_banner_image', array(
    'default' => get_theme_file_uri('/img/default-banner.jpg'),
    'sanitize_callback' => 'nc_sanitize_text'
 ));

 $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'logo2',
    array(
    'label'      => __('Upload a default banner image','nc-framework'),
    'section'    => 'default_image',
    'settings'   => 'default_banner_image',
)));

}
add_action('customize_register', 'nc_customizer_default_image');

/* Created a global function */

function nc_fallbackimage() {
    if( get_theme_mod('fallback_image')) {
        return get_theme_mod('fallback_image');
    } else {
        return get_theme_file_uri('/img/default-image.png');
    }
}

function nc_fallback_banner_image() {
    if( get_theme_mod('default_banner_image')) {
        return get_theme_mod('default_banner_image');
    } else {
        return get_theme_file_uri('/img/default-banner.jpg');
    }
}


?>