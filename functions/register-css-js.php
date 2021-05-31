<?php

// Register Theme Scripts and CSS

  // JS
  wp_register_script('splide', get_theme_file_uri('/js/splide/splide.js'), '', '2.3.9', false );
  wp_register_script('standard-scripts', get_theme_file_uri('/js/standard-scripts.js'), array('jquery'), '6', true);
  wp_register_script('magnific', get_theme_file_uri('/js/magnific/jquery.magnific-popup.min.js'), array('jquery'), '1', true );
  wp_register_script('sal-aniview', get_theme_file_uri('/js/aniview/aniview.js'), array( 'jquery' ), '', true);
  wp_register_script('sal-aniview-init', get_theme_file_uri('/js/aniview/aniview-init.js'), array( 'jquery', 'sal-aniview' ), '', true);

  // CSS

  wp_register_style('magnific-styles', get_theme_file_uri('/js/magnific/magnific-popup.css'), '', '', 'screen');
  wp_register_style('splide-styles', get_theme_file_uri('/js/splide/splide.css'), '', '', 'screen' );
  wp_register_style('animate', get_theme_file_uri('/js/aniview/animate.css'), '', '3.7.2', 'screen');
  wp_register_style('nc-editor', get_theme_file_uri('/css/editor.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-vars', get_theme_file_uri('/css/variables.css'), '', '', 'screen');
  wp_register_style('nc-uclasses', get_theme_file_uri('/css/uclasses.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-root', get_theme_file_uri('/css/root.css'), array('nc-vars'), '', 'screen');
  wp_register_style('nc-blocks', get_theme_file_uri('/css/blocks.css'), array('nc-root'), '', 'screen');
  wp_register_style('nc-menus', get_theme_file_uri('/css/menus.css'), array('nc-root'), '', 'screen');
  wp_register_style('nc-content', get_theme_file_uri('/css/content.css'), array('nc-blocks'), '', 'screen');
  wp_register_style('nc-comments', get_theme_file_uri('/css/comments.css'), array( 'nc-root' ), '1', 'screen' );
  wp_register_style('nc-theme', get_theme_file_uri('/css/theme.css'), array('nc-content'), '', 'screen');


// Load Assets on frontend and backend

function nc_load_assets(){
  if( !is_admin() ){
    
    // CSS

    wp_enqueue_style('animate'); 
    wp_enqueue_style('nc-vars');
    wp_enqueue_style('nc-root');
    wp_enqueue_style('nc-uclasses');
    wp_enqueue_style('nc-blocks');
    wp_enqueue_style('nc-menus');
    wp_enqueue_style('nc-content');
    wp_enqueue_style('nc-theme');

    wp_enqueue_style('wp-mediaelement');
    wp_enqueue_style('mediaelement');


    // JS

    wp_enqueue_script('standard-scripts');
    wp_enqueue_script('sal-aniview');
    wp_enqueue_script('sal-aniview-init');
    
  }
}
add_action('wp_enqueue_scripts', 'nc_load_assets');


// Load Editor Styles

add_theme_support('editor-styles');

add_editor_style( array( 
  '/css/editor.css',
  '/css/variables.css',
  '/css/uclasses.css',
  '/css/menus.css',
  '/css/blocks.css',
  '/css/content.css',
  get_theme_mod('google_fonts_url_load'),
) );