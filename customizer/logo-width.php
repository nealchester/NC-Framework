<?php

function nc_customizer_logo_width($wp_customize){
    
    $wp_customize->add_setting('nc_logo_width', array(
        'default' => '',
        'sanitize_callback' => 'nc_sanitize_text'
    ));
    $wp_customize->add_control('nc_logo_width', array(
        'label' => __('Logo Width','nc-framework'),
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 500, 'step'  => 5, 'placeholder' => '250' ),
        'priority'   => 8,
        'description' => __('The number will be expressed in pixels.','nc-framework')
    ));
    
}
add_action('customize_register', 'nc_customizer_logo_width');

function nc_customizer_logo_width_css() {?>

    <?php if(get_theme_mod('nc_logo_width') && get_theme_mod( 'custom_logo' )):?>
    <style id="nc-logo-width-css" media="screen">
       .nclogo { 
           --logo-img-width: <?php echo get_theme_mod('nc_logo_width').'px;';?> 
           width:<?php echo get_theme_mod('nc_logo_width').'px;';?> 
           max-width:100%;
        }
    </style>
    <?php endif;?>
    <?php }
    
add_action('wp_head', 'nc_customizer_logo_width_css', 9);
    
?>