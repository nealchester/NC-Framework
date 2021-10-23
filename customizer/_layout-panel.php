<?php
function nc_customizer_layoutpanel($wp_customize){
	$wp_customize->add_panel('layout_panel', array(
	  'title' => __('Theme Options','nc-framework'),
		'priority' => 10,
		'description' => '',
	));
}
add_action('customize_register', 'nc_customizer_layoutpanel');	

?>