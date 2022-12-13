<?php

// Register Theme Scripts and CSS

function nc_register_assets(){

  /* Javascript */

  wp_register_script('wp-menu-support', get_theme_file_uri('/js/menus.js'), array('jquery'), null, true);
  wp_enqueue_script('wp-menu-support');

  /* CSS */

  wp_register_style('nc-vars', get_theme_file_uri('/css/variables.css'));
  wp_enqueue_style('nc-vars');

  wp_register_style('nc-icons', get_theme_file_uri('/icons/style.css'));
  wp_enqueue_style('nc-icons');
  
  wp_register_style('nc-uclasses', get_theme_file_uri('/css/uclasses.css'), array('nc-vars'));
  wp_enqueue_style('nc-uclasses');

  wp_register_style('nc-reset', get_theme_file_uri('/css/reset.css'), array('nc-vars'));
  wp_enqueue_style('nc-reset');

  wp_register_style('nc-blocks', get_theme_file_uri('/css/blocks.css'), array('nc-reset'));
  wp_enqueue_style('nc-blocks');

  wp_register_style('nc-menus', get_theme_file_uri('/css/menus.css'), array('nc-reset'));
  wp_enqueue_style('nc-menus');

  wp_register_style('nc-content', get_theme_file_uri('/css/content.css'), array('nc-blocks'));
  wp_enqueue_style('nc-content');

  wp_register_style('nc-theme', get_theme_file_uri('/css/theme.css'), array('nc-content'));
  wp_enqueue_style('nc-theme');

  /* 
  Theme template styles 
  These will only load when the actual template is displayed 
  */

  wp_register_style('nc-editor', get_theme_file_uri('/css/editor.css'), array('nc-vars'));
  wp_register_style('nc-archives', get_theme_file_uri('/css/t-archives.css'), array('nc-content'));
  wp_register_style('nc-author', get_theme_file_uri('/css/t-author.css'), array('nc-content'));
  wp_register_style('nc-image', get_theme_file_uri('/css/t-image.css'), array('nc-content'));
  wp_register_style('nc-comments', get_theme_file_uri('/css/t-comments.css'), array('nc-reset'));
}

add_action('wp_enqueue_scripts', 'nc_register_assets');



// Load Editor Styles

add_theme_support('editor-styles');

add_editor_style( 
  array( 
    '/css/editor.css',
    '/css/variables.css',
    '/css/uclasses.css',
    '/css/blocks.css',
    '/css/content.css',
    '/icons/style.css'
  ) 
);