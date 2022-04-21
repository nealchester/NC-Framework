<?php

/* Register CSS and JS */

function nc_blocks_register_assets(){
  
  /* Register and equeue Scroll Animation */
  wp_register_style('nc-blocks-animate', get_theme_file_uri('/blocks/js/animate/aos.css'), '','', 'screen');
  wp_enqueue_style('nc-blocks-animate');

  wp_register_script('nc-blocks-animate', get_theme_file_uri('/blocks/js/animate/aos.js'), '', '', true);
  wp_enqueue_script('nc-blocks-animate');

  wp_register_script('nc-blocks-animate-init', get_theme_file_uri('/blocks/js/animate/aos-init.js'), array('nc-blocks-animate'), '', true);
  wp_enqueue_script('nc-blocks-animate-init');

  wp_register_script('nc-blocks-animate-remove', get_theme_file_uri('/blocks/js/animate/aos-remove.js'), '', '', false );
  wp_enqueue_script('nc-blocks-animate-remove');

  /* Register each block's CSS */
  wp_register_style('nc-blocks-accordion', get_theme_file_uri('/blocks/css/accordion.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-columns', get_theme_file_uri('/blocks/css/columns.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-divider', get_theme_file_uri('/blocks/css/divider.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-gallery', get_theme_file_uri('/blocks/css/gallery.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-hero-split', get_theme_file_uri('/blocks/css/hero-split.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-hero', get_theme_file_uri('/blocks/css/hero.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-list', get_theme_file_uri('/blocks/css/list.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-magnify', get_theme_file_uri('/blocks/js/popup/magnific.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-media', get_theme_file_uri('/blocks/css/media.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-parallax', get_theme_file_uri('/blocks/js/parallax/jarallax.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-posts', get_theme_file_uri('/blocks/css/posts.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-rich-text', get_theme_file_uri('/blocks/css/rich-text.css'), array('nc-uclasses'));
  wp_register_style('nc-blocks-slider', get_theme_file_uri('/blocks/js/slider/splide.css'));

  /* Register each block's Javascript */
  wp_register_script('nc-blocks-accordion', get_theme_file_uri('/blocks/js/accordion/accordion.js'));
  wp_register_script('nc-blocks-parallax', get_theme_file_uri('/blocks/js/parallax/jarallax.js'), array('jquery'));
  wp_register_script('nc-blocks-magnify', get_theme_file_uri('/blocks/js/popup/magnific.js'), array('jquery'));
  wp_register_script('nc-blocks-popup', get_theme_file_uri('/blocks/js/popup/popup-once.js'), array('jquery'));
  wp_register_script('nc-blocks-slider', get_theme_file_uri('/blocks/js/slider/splide.js'));

}
add_action('wp_enqueue_scripts', 'nc_blocks_register_assets');



/* Add a "disable" attribute to the "nc-blocks-animate" <link> stylesheet. 
If javascript is enabled, the disabled attribute will be removed. */

function nc_blocks_change_style_attributes( $html, $handle ) {
  if ('nc-blocks-animate' === $handle) {
    return str_replace( "media='screen'", "media='screen' disabled", $html );
  } return $html; 
}
add_filter('style_loader_tag', 'nc_blocks_change_style_attributes', 1, 2); 



/* Load CSS styles for each block for the block editor. */
// add_theme_support('editor-styles');
 
function nc_load_blocks_css_for_editor(){
  add_editor_style(
    array( 
      '/blocks/css/accordion.css',
      '/blocks/css/columns.css',
      '/blocks/css/divider.css',
      '/blocks/css/gallery.css',
      '/blocks/css/hero-split.css',
      '/blocks/css/hero.css',
      '/blocks/css/list.css',
      '/blocks/css/media.css',
      '/blocks/css/posts.css',
      '/blocks/css/rich-text.css',
    )
  );
}
add_action('admin_init', 'nc_load_blocks_css_for_editor');