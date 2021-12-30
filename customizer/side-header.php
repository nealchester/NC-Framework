<?php
function nc_customizer_side_header($wp_customize) {
	$wp_customize->add_section('side_header_options', array(
		 'title' => __('Sidebar Heading','nc-framework'),
		 'description' => '',
		 'panel' => 'layout_panel'
	));

	// Side Header
	$wp_customize->add_setting('side_header_controls', array(
		 'default' => 'no-side-header',
		 'sanitize_callback' => 'nc_sanitize_radio'
	));

	$wp_customize->add_control('side_header_controls', array(
		 'label' => __('Sidebar Header','nc-framework'),
		 'section' => 'side_header_options',
		 'type' => 'radio',
		 'choices' => array(
			  'no-side-header' => __('No Side Header','nc-framework'),
			  'header-left' => __('Left Header','nc-framework'),
			  'header-right' => __('Right Header','nc-framework'),
		 )
	));

	// Side header width
	$wp_customize->add_setting('side_header_width', array(
		 'default' => '240px',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('side_header_width', array(
		 'label' => __('Sidebar Width','nc-framework'),
		 'description' => __('Enter the width of the sidebar. It can be in pixels, ems, viewports, or percentages.','nc-framework'),
		 'section' => 'side_header_options',
		 'type' => 'text'
	));

	// Header breakpoint
	$wp_customize->add_setting('side_header_break', array(
		 'default' => '860px',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('side_header_break', array(
		 'label' => __('Sidebar breakpoint (pixels)','nc-framework'),
		 'description' => __('Choose when the side header becomes a top header for mobile.','nc-framework'),
		 'section' => 'side_header_options',
		 'type' => 'text'
	));
}
add_action('customize_register', 'nc_customizer_side_header');

function nc_customizer_side_header_css() {?>
	
	<?php // side header left and mega
	if(get_theme_mod('side_header_controls') == 'header-left'):?>
	
	<style id="side-header-css" media="screen">	

	#wrapper { padding-left:<?php echo get_theme_mod('side_header_width','240px');?>; }
	#header { width:<?php echo get_theme_mod('side_header_width','240px') ?>; position:absolute; left:0; right: auto; top:0; height:100%; } 

	@media screen and (max-width: <?php echo get_theme_mod('side_header_break', '860px');?>) { 
		#wrapper { padding-left:0; } 
		#header { width:100%; position: relative; height:auto; }
	} 
	</style>
	<?php endif;?>
	
	<?php // side header right
	if(get_theme_mod('side_header_controls') == 'header-right'):?>
	
	<style id="side-header-css" media="screen">	
	
	#wrapper { padding-right:<?php echo get_theme_mod('side_header_width','240px');?>; } 
	#header { width:<?php echo get_theme_mod('side_header_width','240px')?>; position:absolute; right:0; left: auto; top:0; height:100%; } 

	@media screen and (max-width: <?php echo get_theme_mod('side_header_break', '860px');?>) { 
		#wrapper { padding-right:0; } 
		#header { width:100%;  position: relative; height:auto; }	
	 } 

	</style>
	<?php endif;?>
	

<?php }

add_action('wp_head', 'nc_customizer_side_header_css', 9);?>