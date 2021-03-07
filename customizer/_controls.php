<?php
// Remove some of WordPress Customizer controls
get_template_part('customizer/_remove');

// Layout Panel
get_template_part('customizer/_layout-panel');

// Sanitize Customizer
get_template_part('customizer/_sanitize');

//  Dev options section
get_template_part('customizer/options-menu');

//  Banner heading section
get_template_part('customizer/banner');

// Logo width
get_template_part('customizer/logo-width');

//  Side header section    
get_template_part('customizer/side-header');

//  Body section
get_template_part('customizer/body-layout');

// Remove some of WordPress Customizer controls
get_template_part('customizer/colors');

//  Default Image
get_template_part('customizer/default-image');

//  Footer section    
get_template_part('customizer/footer');

//  Single post section
get_template_part('customizer/options-post');

// Custom title for front page blog listing
get_template_part('customizer/blog-home-title');

//  Dev options Google Fonts section
get_template_part('customizer/options-dev-fonts');

//  Dev options section
get_template_part('customizer/options-dev');
?>