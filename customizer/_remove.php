<?php
function nc_customizer_remove($wp_customize){

    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_control('background_color');
}
add_action('customize_register', 'nc_customizer_remove');
?>