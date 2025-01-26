<?php
function nc_customizer_preload_images($wp_customize){
  
  $wp_customize->add_section('preload_section', array(
    'title' => __('Preload Image(s)','nc-framework'),
    'description' => __('Add up to 3 images that you want to preload.','nc-framework'),
    'panel' => 'layout_panel'
  ));

// Image 1
  $wp_customize->add_setting('preload_image1', array(
    'default' => '',
  ));
  $wp_customize->add_control(
    new WP_Customize_Upload_Control(
    $wp_customize,
    'upload_preload_image1',
      array(
        'label' => __('Select preload image 1','nc-framework'),
        'section' => 'preload_section',
        'settings' => 'preload_image1',
      )
    ));

// Image 2
$wp_customize->add_setting('preload_image2', array(
  'default' => '',
));
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
  'upload_preload_image2',
    array(
      'label' => __('Select preload image 2','nc-framework'),
      'section' => 'preload_section',
      'settings' => 'preload_image2', 
    )
  ));

// Image 3
$wp_customize->add_setting('preload_image3', array(
  'default' => '',
));
$wp_customize->add_control(
  new WP_Customize_Upload_Control(
  $wp_customize,
  'upload_preload_image3',
    array(
      'label' => __('Select preload image 3','nc-framework'),
      'section' => 'preload_section',
      'settings' => 'preload_image3',
      'multiple'   => true, 
    )
  ));

}
add_action('customize_register', 'nc_customizer_preload_images');

// Enqueue Preload Links in <head>
function enqueue_preload_links() {
$preload_image1 = get_theme_mod( 'preload_image1' );
$preload_image2 = get_theme_mod( 'preload_image2' );
$preload_image3 = get_theme_mod( 'preload_image3' );

if ( ! empty( $preload_image1 ) ) {
echo '
<link rel="preload" href="' . esc_url( $preload_image1 ) . '" as="image" />'; 
}
if ( ! empty( $preload_image2 ) ) {
echo '
<link rel="preload" href="' . esc_url( $preload_image2 ) . '" as="image" />'; 
}
if ( ! empty( $preload_image3 ) ) {
echo '
<link rel="preload" href="' . esc_url( $preload_image3 ) . '" as="image" />
'; 
}
echo '

';
}
add_action( 'wp_head', 'enqueue_preload_links' );
?>