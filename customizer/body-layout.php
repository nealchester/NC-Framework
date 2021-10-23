<?php
function nc_customizer_body_layout($wp_customize)
{
 $wp_customize->add_section('body_section', array(
  'title' => __('Body Layout','nc-framework'),
  'description' => __('Here you can control how the body content of the default template is displayed.','nc-framework'),
  'panel' => 'layout_panel'
 ));
 // Body layouts
 $wp_customize->add_setting('body_layout', array(
  'default' => 'content-single',
  'sanitize_callback' => 'nc_sanitize_radio'
 ));
 $wp_customize->add_control('body_layout', array(
  'label' => __('Body layout','nc-framework'),
  'section' => 'body_section',
  'type' => 'radio',
  'choices' => array(
   'content-single' => __('Content, no sidebars','nc-framework'),
   'content-left' => __('Content left, right sidebar','nc-framework'),
   'content-right' => __('Content right, left sidebar','nc-framework')
  )
 ));

 // Body Container
 $wp_customize->add_setting('body_contained', array(
    'default' => 'no-body-contain',
    'sanitize_callback' => 'nc_sanitize_radio'
   ));
   $wp_customize->add_control('body_contained', array(
    'label' => __('Contain content and sidebar','nc-framework'),
    'section' => 'body_section',
    'type' => 'radio',
    'choices' => array(
     'no-body-contain' => __('No containing','nc-framework'),
     'body-contain' => __('Contain content and sidebar','nc-framework')
    )
   ));

}
add_action('customize_register', 'nc_customizer_body_layout');
?>