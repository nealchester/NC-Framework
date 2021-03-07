<?php
function nc_customizer_options_post($wp_customize) {
$wp_customize->add_section('blog_section_one', array(
 'title' => 'Single Post',
 'description' => 'Here you can hide and show elements on the single blog post template.',
 'panel' => 'layout_panel'
));

// Featured image        
$wp_customize->add_setting('show_featured_image', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_featured_image', array(
 'label' => 'Show featured image',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Author Post Meta        
$wp_customize->add_setting('show_author_avatar', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_author_avatar', array(
 'label' => 'Show author meta (top)',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Author Post Box        
$wp_customize->add_setting('show_author_box', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
   ));
   $wp_customize->add_control('show_author_box', array(
    'label' => 'Show author box (bottom)',
    'section' => 'blog_section_one',
    'type' => 'checkbox'
   ));

// Excerpt        
$wp_customize->add_setting('show_excerpt', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_excerpt', array(
 'label' => 'Show Excerpt',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Categories    
$wp_customize->add_setting('show_categories', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_categories', array(
 'label' => 'Show post categories',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Tags    
$wp_customize->add_setting('show_tags', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_tags', array(
 'label' => 'Show post tags',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Nav Links    
$wp_customize->add_setting('show_nav_links', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_nav_links', array(
 'label' => 'Show < prev/next > links',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Display Comments on posts   
$wp_customize->add_setting('show_comments_posts', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_comments_posts', array(
 'label' => 'Show comments on posts',
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Display Related Pages  
$wp_customize->add_setting('show_related_pages', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
   ));
   $wp_customize->add_control('show_related_pages', array(
    'label' => 'Show related sibling pages',
    'section' => 'blog_section_one',
    'type' => 'checkbox'
   ));

}
add_action('customize_register', 'nc_customizer_options_post');
?>