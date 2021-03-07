<?php
function nc_customizer_remove($wp_customize){
    $wp_customize->remove_section('background_image');
}
add_action('customize_register', 'nc_customizer_remove');
?>