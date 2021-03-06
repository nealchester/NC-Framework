<?php
if(function_exists('get_field')) { 

    // If theme is child or parent do this:
    $currentTheme = wp_get_theme();
    if ($currentTheme->parent() == false) {
        // Load editable JSON fields for parent theme
        get_template_part('functions/acf_json');
    } else {
        // Just load background fields for child theme
        get_template_part('blocks/fields');
    }

    // Block Includes
    get_template_part('blocks/block-split');
    get_template_part('blocks/block-accordion');
    get_template_part('blocks/block-slider');
    get_template_part('blocks/block-imgslider');
    get_template_part('blocks/block-text');
    get_template_part('blocks/block-blank');
    get_template_part('blocks/block-media');
    get_template_part('blocks/block-hero');
    get_template_part('blocks/block-list');
    get_template_part('blocks/block-links');
    get_template_part('blocks/block-popup');
    get_template_part('blocks/block-singlelink');
    get_template_part('blocks/block-gallery');
    get_template_part('blocks/block-columns');
    get_template_part('blocks/block-posts');
    get_template_part('blocks/block-left');
    get_template_part('blocks/block-divider');
    get_template_part('blocks/block-callout');
    get_template_part('blocks/block-nav');
    get_template_part('blocks/block-cssbox');
    get_template_part('blocks/block-pointer');
    
    // Block Helper Functions
    get_template_part('blocks/functions');

}
?>