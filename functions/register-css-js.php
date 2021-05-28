<?php

// Register Theme Scripts and CSS

function nc_register_assets(){

  // JS

  wp_register_script('standard-scripts', get_theme_file_uri('/js/standard-scripts.js'), array('jquery'), '1', true);
  
  wp_register_script('sal-aniview', get_theme_file_uri('/js/aniview/aniview.js'), array( 'jquery' ), null, true);
  wp_register_script('sal-aniview-init', get_theme_file_uri('/js/aniview/aniview-init.js'), array( 'sal-aniview' ), null, true);

  // CSS

  wp_register_style('animate-css', get_theme_file_uri('/js/aniview/animate.css'), null, '3.7.2', 'screen');
  wp_register_style('nc-editor', get_theme_file_uri('/css/editor.css'), array('nc-vars'), null, 'screen');
  wp_register_style('nc-vars', get_theme_file_uri('/css/variables.css'), null, null, 'screen');
  wp_register_style('nc-uclasses', get_theme_file_uri('/css/uclasses.css'), array('nc-vars'), null, 'screen');
  wp_register_style('nc-root', get_theme_file_uri('/css/root.css'), array('nc-vars'), null, 'screen');
  wp_register_style('nc-blocks', get_theme_file_uri('/css/blocks.css'), array('nc-root'), null, 'screen');
  wp_register_style('nc-menus', get_theme_file_uri('/css/menus.css'), array('nc-root'), null, 'screen');
  wp_register_style('nc-content', get_theme_file_uri('/css/content.css'), array('nc-blocks'), null, 'screen');
  wp_register_style('nc-comments', get_theme_file_uri('/css/comments.css'), array( 'nc-root' ), '1', 'screen' );
  wp_register_style('nc-theme', get_theme_file_uri('/css/theme.css'), array('nc-content'), null, 'screen');

}
add_action('wp_enqueue_scripts', 'nc_register_assets');

// Load Assets on frontend and backend

function nc_load_assets(){
  if( !is_admin() ){
    
    // CSS

    wp_enqueue_style('animate-css'); 
    wp_enqueue_style('nc-vars');
    wp_enqueue_style('nc-root');
    wp_enqueue_style('nc-uclasses');
    wp_enqueue_style('nc-blocks');
    wp_enqueue_style('nc-menus');
    wp_enqueue_style('nc-content');
    wp_enqueue_style('nc-theme');

    wp_enqueue_style('wp-mediaelement', false);
    wp_enqueue_style('mediaelement', false);


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
  '/css/blocks.css',
  '/css/content.css',
  get_theme_mod('google_fonts_url_load'),
) );