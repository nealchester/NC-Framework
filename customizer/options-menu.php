<?php
function nc_customizer_menu_options($wp_customize) {
	$wp_customize->add_section('menu_op_section', array(
		'title' => __('Main Menu Options','nc-framework'),
		'description' => __('Select what happens to the main menu when the screen gets narrower.','nc-framework'),
		'panel' => 'layout_panel'
	));

	// Menu options
	$wp_customize->add_setting('menu_layout', array(
		'default' => '0',
		'sanitize_callback' => 'nc_sanitize_radio'
	));
	$wp_customize->add_control('menu_layout', array(
		'label' => '',
		'section' => 'menu_op_section',
		'type' => 'radio',
		'choices' => array(
		'0' => __('Do nothing','nc-framework'),
		'1' => __('Scroll horizontal','nc-framework'),
		'2' => __('Show a toggle button','nc-framework'),
		)
	));

	// Menu breakpoint
	$wp_customize->add_setting('menu_breakpoint', array(
		'default' => '860px',
		'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('menu_breakpoint', array(
		'label' => __('Menu breakpoint','nc-framework'),
		'section' => 'menu_op_section',
		'type' => 'text'
	));
}
add_action('customize_register', 'nc_customizer_menu_options');

function nc_customizer_menu_options_css() {?>
<?php if(get_theme_mod('menu_layout', '0') =='1'):?>
<style id="menu-options-css" media="screen">
	@media (max-width:<?php echo get_theme_mod('menu_breakpoint', '860px'); ?>) { 
		#header .ncontain { width:100%; max-width:100%; }
		#header .nclogo { --logo-margin: 0 var(--gap);	}
		#header_menu { flex-wrap:nowrap; overflow-x:auto; width: 100%; border-top: solid 1px #eee; --item-padding: 0.7rem 1rem; }
		#header_menu > li:first-child a { padding-left:var(--gap);}
		#header_menu > li:last-child a{ padding-right:var(--gap);}
		#header_menu > li > a { white-space: nowrap; }

		#header_menu .sub-menu,
		#header_menu .menu-item-has-children > a:after { display: none;}
	}
</style>
<?php endif;?>

<?php if(get_theme_mod('menu_layout', '0') =='2'):?>
<style id="menu-options-css" media="screen">
	@media (max-width:<?php echo get_theme_mod('menu_breakpoint', '860px'); ?>) { 
		.mpanel_button,
		#header .ncsearchtrigger { display:flex; }

		#header_menu { display:none; }
		#header .nclogo { --logo-margin: 0 auto; }
	}
</style>
<?php endif;?>
<?php }

add_action('wp_head', 'nc_customizer_menu_options_css', 9);?>