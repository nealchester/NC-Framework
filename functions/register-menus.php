<?php

add_action('init', 'nc_register_nav_menus');
function nc_register_nav_menus()
{
    register_nav_menus(array(
        'top-menu' => __('Top Menu','nc-framework'),
        'header-menu' => __('Main Menu','nc-framework'),
        'third-menu' => __('Bottom Menu','nc-framework'),
        'footer-menu' => __('Footer Menu','nc-framework'),
        'mobile-menu' => __('Mobile Menu','nc-framework'),
    ));
}

?>