<?php
function nc_customizer_default_image($wp_customize){

 $wp_customize->add_section('default_image', array(
  'title' => 'Fallback Image',
  'description' => 'Set a default image for featured thumbnails',
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
    'label'      => 'Upload a default image',
    'section'    => 'default_image',
    'settings'   => 'fallback_image',
)));

}
add_action('customize_register', 'nc_customizer_default_image');

/* Created a global function */

function nc_fallbackimage() {
    if( get_theme_mod('fallback_image')) {
        echo get_theme_mod('fallback_image');
    } else {
        echo get_theme_file_uri('/img/default-image.png');
    }
}


?>