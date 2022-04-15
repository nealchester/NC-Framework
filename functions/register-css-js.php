<?php

// Register Theme Scripts and CSS

function nc_register_assets(){

  // Javascript

  wp_register_script('splide', get_theme_file_uri('/js/splide/splide.js'), '', '2.3.9', false );
  wp_register_script('standard-scripts', get_theme_file_uri('/js/standard-scripts.js'), array('jquery'), '6', true);
  wp_register_script('magnific', get_theme_file_uri('/js/magnific/jquery.magnific-popup.min.js'), array('jquery'), '1', true );

  wp_register_script('aos', get_theme_file_uri('/js/aos/aos.js'), '', '2.3.1', true);
  wp_register_script('aos-init', get_theme_file_uri('/js/aos/aos-init.js'), array( 'aos' ), '', true);
  wp_register_script('aos-remove', get_theme_file_uri('/js/aos/aos-remove.js'), '', '', false);

  // CSS

  /* NOTE: Fonts are registered in this file: 'functions/register-fonts.php' */

  // Javascript styles
  wp_register_style('magnific-styles', get_theme_file_uri('/js/magnific/magnific-popup.css'), '', '', 'screen');
  wp_register_style('splide-styles', get_theme_file_uri('/js/splide/splide.css'), '', '', 'screen' );
  wp_register_style('aos', get_theme_file_uri('/js/aos/aos.css'), '', '2.3.1', 'screen');

  // Theme styles
  wp_register_style('nc-vars', get_theme_file_uri('/css/variables.css'), '', '', 'screen');
  wp_register_style('nc-uclasses', get_theme_file_uri('/css/uclasses.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-editor', get_theme_file_uri('/css/editor.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-reset', get_theme_file_uri('/css/reset.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-blocks', get_theme_file_uri('/css/blocks.css'), array('nc-reset'), '', 'screen');
  wp_register_style('nc-menus', get_theme_file_uri('/css/menus.css'), array('nc-reset'), '', 'screen');
  wp_register_style('nc-content', get_theme_file_uri('/css/content.css'), array('nc-blocks'), '', 'screen');
  wp_register_style('nc-theme', get_theme_file_uri('/css/theme.css'), array('nc-content'), '', 'screen');

  // Theme template styles
  wp_register_style('nc-archives', get_theme_file_uri('/css/t-archives.css'), array('nc-content'), '', 'screen');
  wp_register_style('nc-author', get_theme_file_uri('/css/t-author.css'), array('nc-content'), '', 'screen');
  wp_register_style('nc-image', get_theme_file_uri('/css/t-image.css'), array('nc-content'), '', 'screen');
  wp_register_style('nc-comments', get_theme_file_uri('/css/t-comments.css'), array( 'nc-reset' ), '', 'screen' );
}

add_action('wp_enqueue_scripts', 'nc_register_assets');




// Load Assets on frontend

function nc_load_assets(){
  if( !is_admin() ){
    
    // CSS

    wp_enqueue_style('aos'); 
    wp_enqueue_style('nc-vars');
    wp_enqueue_style('nc-reset');
    wp_enqueue_style('nc-uclasses');
    wp_enqueue_style('nc-blocks');
    wp_enqueue_style('nc-menus');
    wp_enqueue_style('nc-content');
    wp_enqueue_style('nc-theme');

    wp_enqueue_style('wp-mediaelement');
    wp_enqueue_style('mediaelement');


    // JS

    wp_enqueue_script('standard-scripts');
    wp_enqueue_script('aos-remove');
    wp_enqueue_script('aos');
    wp_enqueue_script('aos-init');
    
  }
}
add_action('wp_enqueue_scripts', 'nc_load_assets');




// Add a "disable" attribute to the "aos" <link> stylesheet. If javascript is enabled, the disabled attribute will be removed.

function nc_add_style_attributes( $html, $handle ) {
  if ( 'aos' === $handle ) {
       return str_replace( "media='screen'", "media='screen' disabled", $html );
   }
   return $html; 
 }
 add_filter( 'style_loader_tag', 'nc_add_style_attributes', 1, 2 ); 


// Load Editor Styles

add_theme_support('editor-styles');

add_editor_style( array( 
  '/css/editor.css',
  '/css/variables.css',
  '/css/uclasses.css',
  '/css/menus.css',
  '/css/blocks.css',
  '/css/content.css',
) );