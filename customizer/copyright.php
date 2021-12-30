<?php
function nc_customizer_footer($wp_customize) {
	$wp_customize->add_section('footer_section', array(
		 'title' => __('Copyright Text','nc-framework'),
		 'panel' => 'layout_panel'
	));

	// Copyright
	$wp_customize->add_setting('add_html_copyright', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('add_html_copyright', array(
		 'label' => __('Copyright Text','nc-framework'),
		 'section' => 'footer_section',
		 'type' => 'textarea',
		 'description' => __('You can overwrite the automated copyright here.','nc-framework')
	));
}
add_action('customize_register', 'nc_customizer_footer');