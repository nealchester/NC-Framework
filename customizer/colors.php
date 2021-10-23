<?php

// Colors for customiizer

function nc_color_control( $wp_customize ) {
    
    // Remove the background color option

    $wp_customize->remove_control('background_color');
    

    $wp_customize->add_section('nc_color_section', array(
        'title' => __('Color Controls','nc-framework'),
        'panel' => 'layout_panel',
        'description' => '',
        'priority' => 50,
   ));

    /* 
    
    Hide these options for now 


	// main color background
	$txtcolors[] = array(
		 'slug'=>'main_bg', 
		 'default' => '#542525',
		 'label' => 'Main background color'
	);
	 
	// main color foreground
	$txtcolors[] = array(
		 'slug'=>'main_fg', 
		 'default' => '#fff',
		 'label' => 'Main foreground color (text)'
	);
	 
	// secondary color background
	$txtcolors[] = array(
		 'slug'=>'sec_bg', 
		 'default' => '#e2d6b5',
		 'label' => 'Secondary background color'
	);
	 
	// secondary color foreground
	$txtcolors[] = array(
		 'slug'=>'sec_fg', 
		 'default' => '#000',
		 'label' => 'Secondary foreground color (text)'
    );
    
    */
	
	// mobile address bar color
	$txtcolors[] = array(
		 'slug'=>'address_bar_color', 
		 'default' => '',
		 'label' => __('Mobile address bar color','nc-framework')
	);	
 
 
	// add the settings and controls for each color
	foreach( $txtcolors as $txtcolor ) {
	 
		 // SETTINGS
		 $wp_customize->add_setting(
			  $txtcolor['slug'], array(
					'default' => $txtcolor['default'],
					'type' => 'option', 
					'capability' => 
					'edit_theme_options',
					'sanitize_callback' => 'nc_sanitize_text'
			  )
		 );
		 // CONTROLS
		 $wp_customize->add_control(
			  new WP_Customize_Color_Control(
					$wp_customize,
					$txtcolor['slug'], 
					array('label' => $txtcolor['label'], 
					'section' => 'nc_color_section',
					'settings' => $txtcolor['slug'])
			  )
		 );
	}	
 
 
}
add_action( 'customize_register', 'nc_color_control' );

// Print the styles to the head

function nc_color_control_css(){
echo'<meta name="theme-color" content="'.get_option('address_bar_color').'" />
';

    /*
    if(get_option('main_bg') || get_option('main_fg') || get_option('sec_bg') || get_option('sec_fg')){
	echo'<style id="color-scheme" media="screen">
		:root {';
			if(get_option('main_bg')){ echo'--main_color:'.get_option('main_bg').';'; }
			if(get_option('main_fg')){ echo'--main_color_fg:'.get_option('main_fg').';'; }
			if(get_option('sec_bg')){ echo'--second_color:'.get_option('sec_bg').';'; }
			if(get_option('sec_fg')){ echo'--second_color_fg:'.get_option('sec_fg').';'; }
        echo'}
        </style>';
	} */
}

add_action( 'wp_head', 'nc_color_control_css', 100 );

?>