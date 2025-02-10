<?php
// Remove some of WordPress Customizer controls
get_template_part('customizer/_remove');

// Layout Panel
get_template_part('customizer/_layout-panel');

// Sanitize Customizer
get_template_part('customizer/_sanitize');

// ---------------------------------------------------- //

// Social Icons
get_template_part('customizer/social-icons');

// Disable Comments
get_template_part('customizer/comments');

// Preload
get_template_part('customizer/preload');

// Remove some Customizer controls
get_template_part('customizer/colors');

//  Default Images
get_template_part('customizer/default-image');

// Custom title for front page blog listing
get_template_part('customizer/blog-home-title');

//  Dev options section
get_template_part('customizer/options-dev');
?>