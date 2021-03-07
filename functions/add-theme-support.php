<?php 
add_theme_support('title-tag');
add_theme_support('post-thumbnails'); // Post Thumbnails
add_theme_support('automatic-feed-links'); // RSS feed links for Posts/Comments
add_theme_support('html5', array('gallery','caption'));
add_theme_support("custom-background");
// add_theme_support('post-formats', array('audio', 'quote', 'video', 'aside', 'gallery', 'link', 'image', 'status', 'chat'));

add_theme_support('align-wide');
add_theme_support('responsive-embeds');


// Other theme supports are located in editor-styles.php

// add_theme_support('wp-block-styles'); // use default blocks styles on front-end


add_theme_support('custom-logo', array(
    'flex-height' => true,
    'flex-width' => true,
    'height'      => '',
    'width'       => '',
    'header-text' => array(
        'site-name',
        'site-description'
    )
));

add_theme_support('custom-header', array(
    'default-image' => '',
    'random-default' => true,
    'width' => '1900px',
    'height' => '',
    'flex-height' => true,
    'flex-width' => true,
    'default-text-color' => '',
    'header-text' => false,
    'uploads' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
));
?>