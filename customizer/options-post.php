<?php
function nc_customizer_options_post($wp_customize) {
$wp_customize->add_section('blog_section_one', array(
 'title' => __('Single Post','nc-framework'),
 'description' => __('Here you can hide and show elements on the single blog post template.','nc-framework'),
 'panel' => 'layout_panel'
));

// Featured image        
$wp_customize->add_setting('show_featured_image', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_featured_image', array(
 'label' => __('Show featured image','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Author Post Meta        
$wp_customize->add_setting('show_author_avatar', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_author_avatar', array(
 'label' => __('Show author meta (top)','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Author Post Box        
$wp_customize->add_setting('show_author_box', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
   ));
   $wp_customize->add_control('show_author_box', array(
    'label' => __('Show author box (bottom)','nc-framework'),
    'section' => 'blog_section_one',
    'type' => 'checkbox'
   ));

// Excerpt        
$wp_customize->add_setting('show_excerpt', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_excerpt', array(
 'label' => __('Show Excerpt','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Categories    
$wp_customize->add_setting('show_categories', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_categories', array(
 'label' => __('Show post categories','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Tags    
$wp_customize->add_setting('show_tags', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_tags', array(
 'label' => __('Show post tags','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Nav Links    
$wp_customize->add_setting('show_nav_links', array(
 'default' => false,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_nav_links', array(
 'label' => __('Show < prev/next > links','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Display Comments on posts   
$wp_customize->add_setting('show_comments_posts', array(
 'default' => true,
 'sanitize_callback' => 'nc_sanitize_checkbox'
));
$wp_customize->add_control('show_comments_posts', array(
 'label' => __('Show comments on posts','nc-framework'),
 'section' => 'blog_section_one',
 'type' => 'checkbox'
));

// Display Related Pages  
$wp_customize->add_setting('show_related_pages', array(
    'default' => false,
    'sanitize_callback' => 'nc_sanitize_checkbox'
   ));
   $wp_customize->add_control('show_related_pages', array(
    'label' => __('Show related sibling pages','nc-framework'),
    'section' => 'blog_section_one',
    'type' => 'checkbox'
   ));

}
add_action('customize_register', 'nc_customizer_options_post');
?>