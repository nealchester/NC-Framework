<?php
// Remove some of WordPress Customizer controls
get_template_part('customizer/_remove');

// Layout Panel
get_template_part('customizer/_layout-panel');

// Sanitize Customizer
get_template_part('customizer/_sanitize');

//  Side header section    
// get_template_part('customizer/side-header');

// Remove some of WordPress Customizer controls
get_template_part('customizer/colors');

//  Default Image
get_template_part('customizer/default-image');

//  Footer section    
get_template_part('customizer/copyright');

// Custom title for front page blog listing
get_template_part('customizer/blog-home-title');

//  Dev options section
get_template_part('customizer/options-dev');
?>