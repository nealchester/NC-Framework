<?php
function nc_customizer_custom_blog_title($wp_customize){
    /*
    $wp_customize->add_section('blog_title_section', array(
    'title' => 'Front Page Blog Title',
    'panel' => 'layout_panel',
    'priority' => 10,
    ));
    */
    // Add Custom Blog Title
    $wp_customize->add_setting('nc_custom_blog_title', array(
    'default' => get_bloginfo('name'),  
    'sanitize_callback' => 'nc_sanitize_text'
    ));

    $wp_customize->add_control('nc_custom_blog_title', array(
    'label' => 'Custom Blog Title',
    'section' => 'static_front_page',
    'type' => 'text',
    'description' => 'This will modify the blog page title if it is set to display on the front page.'
    ));

}
add_action('customize_register', 'nc_customizer_custom_blog_title');

?>