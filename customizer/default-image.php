<?php
function nc_customizer_default_image($wp_customize){

 $wp_customize->add_section('default_image', array(
  'title' => __('Fallback image','nc-framework'),
  'description' => __('Set a default image for featured thumbnails','nc-framework'),
  'panel' => 'layout_panel'
 ));

 // Body layouts
 $wp_customize->add_setting('fallback_image', array(
    'default' => get_theme_file_uri('/img/default-image.png'),
    'sanitize_callback' => 'nc_sanitize_text'
 ));

 $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'logo',
    array(
    'label'      => __('Upload a default image','nc-framework'),
    'section'    => 'default_image',
    'settings'   => 'fallback_image',
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


?>