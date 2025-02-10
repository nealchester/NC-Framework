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



// Disable FullScreen Editor at installation
/* It will work again once you enable it, but it won't be enabled by default */

function ghub_disable_editor_fullscreen_mode() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'ghub_disable_editor_fullscreen_mode' );

?>