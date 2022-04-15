<?php
function nc_customizer_options_post($wp_customize) {

$wp_customize->add_section('comment_control', array(
  'title' => __('Disable Comments','nc-framework'),
  'description' => __('Enable or disable the comments feature.','nc-framework'),
  // 'panel' => 'layout_panel'
));

// Display Comments on posts   
$wp_customize->add_setting('show_comments_posts', array(
  'default' => true,
  'sanitize_callback' => 'nc_sanitize_checkbox'
 ));
 $wp_customize->add_control('show_comments_posts', array(
  'label' => __('Show comments on posts','nc-framework'),
  'section' => 'comment_control',
  'type' => 'checkbox'
 ));

}
add_action('customize_register', 'nc_customizer_options_post');
?>