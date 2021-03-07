<?php

// Remove that dumb output for recent comments
function nc_remove_recent_comments_style(){
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
} add_action('widgets_init', 'nc_remove_recent_comments_style');

// Remove the gallery styles
add_filter('use_default_gallery_style', '__return_false');

?>