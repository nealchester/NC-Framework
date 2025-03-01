<?php

if(function_exists('get_field')){ 

    // Helper Functions
    get_template_part('blocks/block-functions');

    // Register / enqueue CSS and JS
    get_template_part('blocks/block-assets');

    // ACF Blocks
 
    get_template_part('blocks/blks/accordion');
    get_template_part('blocks/blks/animate');
    get_template_part('blocks/blks/blank');
    get_template_part('blocks/blks/canvas');
    get_template_part('blocks/blks/css-box');
    get_template_part('blocks/blks/divider');
    get_template_part('blocks/blks/gallery');
    get_template_part('blocks/blks/gradient');
    get_template_part('blocks/blks/hero');
    get_template_part('blocks/blks/lightbox');
    get_template_part('blocks/blks/link');
    get_template_part('blocks/blks/nav');
    get_template_part('blocks/blks/pointer');
    get_template_part('blocks/blks/popup');
    get_template_part('blocks/blks/posts');
    get_template_part('blocks/blks/search');
    get_template_part('blocks/blks/sliders');
    get_template_part('blocks/blks/spacer');
    get_template_part('blocks/blks/text-columns');

    /*
    No longer in use (or needed)

     get_template_part('blocks/blks/columns');
     get_template_part('blocks/blks/hero-slider');
     get_template_part('blocks/blks/hero-split');
     get_template_part('blocks/blks/list');
     get_template_part('blocks/blks/media');
     get_template_part('blocks/blks/slider-image');

    */

}