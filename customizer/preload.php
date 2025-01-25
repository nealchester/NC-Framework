<?php
function nc_customizer_preload_images($wp_customize){
  
  $wp_customize->add_section('preload_section', array(
    'title' => __('Preload Image(s)','nc-framework'),
    'description' => __('Add images that should be preloaded here.','nc-framework'),
    'panel' => 'layout_panel'
  ));
  $wp_customize->add_setting('upload_preload_images', array(
    'default' => ''
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'logo',
      array(
        'label' => __('Select preload image(s)','nc-framework'),
        'section' => 'preload_section',
        'settings' => 'upload_preload_images',
      )
  ));
}
add_action('customize_register', 'nc_customizer_preload_images');

/*
// Enqueue Preload Links in <head>
function enqueue_preload_links() {
    $preload_images = get_theme_mod( 'preload_images' );

    if ( ! empty( $preload_images ) ) {
        foreach ( $preload_images as $image ) {
            echo '<link rel="preload" href="' . esc_url( $image ) . '" as="image" />'; 
        }
    }
}
add_action( 'wp_head', 'enqueue_preload_links' );
*/
?>