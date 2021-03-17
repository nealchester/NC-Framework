<?php

add_action('init', 'nc_register_nav_menus');
function nc_register_nav_menus()
{
    register_nav_menus(array(
        'top-menu' => 'Top Menu',
        'header-menu' => 'Header Menu',
        'third-menu' => 'Bottom Menu',
        'footer-menu' => 'Footer Menu',
        'mobile-menu' => 'Mobile Menu'
    ));
}

?>