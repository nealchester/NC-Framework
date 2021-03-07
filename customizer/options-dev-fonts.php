<?php

function nc_g_font_url(){
  // For developers: Add your google font url
  $font_url = str_replace( ',', '%2C', 
  '//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap' );
  return $font_url;
}


// Add Customzier Panel to include Google Fonts

function nc_customizer_options_dev_fonts($wp_customize){
    $wp_customize->add_setting('google_fonts_url_load', array(
        'default' => nc_g_font_url(),
        'sanitize_callback' => 'nc_sanitize_text'
    ));
    $wp_customize->add_control('google_fonts_url_load', array(
        'label' => 'Load Google fonts',
        'section' => 'dev_options_section',
        'type' => 'textarea',
        'description' => 'Add a call to your Google fonts here (visit: fonts.google.com). 
        Add just the URL they provide, nothing more.'
    ));
}
add_action('customize_register', 'nc_customizer_options_dev_fonts');

// Register and Enqueue Google Fonts

function nc_load_google_font_files(){
    if(get_theme_mod('google_fonts_url_load')){
      wp_register_style('google-fonts', get_theme_mod('google_fonts_url_load'), '', 1, 'screen');
      wp_enqueue_style('google-fonts');
    }
    else {
      wp_register_style('google-fonts', nc_g_font_url(), '', 1, 'screen');
      wp_enqueue_style('google-fonts');
    }
}
add_action('wp_enqueue_scripts', 'nc_load_google_font_files');


// Load Preconnect

function nc_add_preconnect_link() {
  echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
}
add_action('wp_head', 'nc_add_preconnect_link', 9);