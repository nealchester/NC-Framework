<?php
function nc_customizer_body_layout($wp_customize)
{
 $wp_customize->add_section('body_section', array(
  'title' => 'Body Layout',
  'description' => 'Here you can control how the body content of the default template is displayed.',
  'panel' => 'layout_panel'
 ));
 // Body layouts
 $wp_customize->add_setting('body_layout', array(
  'default' => 'content-single',
  'sanitize_callback' => 'nc_sanitize_radio'
 ));
 $wp_customize->add_control('body_layout', array(
  'label' => 'Body layout',
  'section' => 'body_section',
  'type' => 'radio',
  'choices' => array(
   'content-single' => 'Content, no sidebars',
   'content-left' => 'Content left, right sidebar',
   'content-right' => 'Content right, left sidebar'
  )
 ));

 // Body Container
 $wp_customize->add_setting('body_contained', array(
    'default' => 'no-body-contain',
    'sanitize_callback' => 'nc_sanitize_radio'
   ));
   $wp_customize->add_control('body_contained', array(
    'label' => 'Contain content and sidebar',
    'section' => 'body_section',
    'type' => 'radio',
    'choices' => array(
     'no-body-contain' => 'No containing',
     'body-contain' => 'Contain content and sidebar'
    )
   ));

}
add_action('customize_register', 'nc_customizer_body_layout');
?>