<?php
function nc_customizer_footer($wp_customize) {
	$wp_customize->add_section('footer_section', array(
		 'title' => __('Footer Layout','nc-framework'),
		 'description' => __('Here, you can control how many footer columns you want displayed.', 'nc-framework'),
		 'panel' => 'layout_panel'
	));
	// Footer Count
	$wp_customize->add_setting('footer_count', array(
		 'default' => '0',
		 'sanitize_callback' => 'nc_sanitize_radio'
	));
	$wp_customize->add_control('footer_count', array(
		 'label' => __('Mega footer count','nc-framework'),
		 'section' => __('footer_section','nc-framework'),
		 'type' => 'radio',
		 'choices' => array(
			  '0' => __('No Mega footer','nc-framework'),
			  '1' => __('Single column','nc-framework'),
			  '2' => __('Two columns','nc-framework'),
			  '3' => __('Three columns','nc-framework'),
			  '4' => __('Four columns','nc-framework'),
			  '5' => __('Five columns','nc-framework')
		 )
	));

	// Footer layout
	$wp_customize->add_setting('footer_lay', array(
		'default' => 'ncolumns-flow',
		'sanitize_callback' => 'nc_sanitize_radio',
		'description' => ''
   ));
   $wp_customize->add_control('footer_lay', array(
		'label' => __('Mega footer Layout','nc-framework'),
		'section' => 'footer_section',
		'type' => 'radio',
		'choices' => array(
			 'ncolumns-fixed' => __('Fixed','nc-framework'),
			 'ncolumns-auto' => __('Auto','nc-framework'),
			 'ncolumns-flow' => __('Flow','nc-framework')
		)
   ));
   	
	// Footer style
	$wp_customize->add_setting('footer_style', array(
		 'default' => 'footer-gaps',
		 'sanitize_callback' => 'nc_sanitize_radio'
	));
	$wp_customize->add_control('footer_style', array(
		 'label' => __('Mega footer style','nc-framework'),
		 'section' => 'footer_section',
		 'type' => 'radio',
		 'choices' => array(
			  'footer-gaps' => __('Gaps','nc-framework'),
			  'footer-borders' => __('Borders','nc-framework')
		 )
	));

	// Footer column spacing
	$wp_customize->add_setting('column_spacing', array(
		 'default' => '3em',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('column_spacing', array(
		 'label' => __('Mega footer column spacing','nc-framework'),
		 'section' => 'footer_section',
		 'type' => 'text'
	));

	// Footer min width
	$wp_customize->add_setting('column_minwidth', array(
		'default' => '250px',
		'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('column_minwidth', array(
		'label' => __('Mega footer min width','nc-framework'),
		'section' => 'footer_section',
		'type' => 'text'
	));

	// Footer breakpoint
	$wp_customize->add_setting('footer_break', array(
		 'default' => '860px',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('footer_break', array(
		 'label' => __('Mega footer breakpoint','nc-framework'),
		 'section' => 'footer_section',
		 'type' => 'text'
	));
	// Copyright
	$wp_customize->add_setting('add_html_copyright', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('add_html_copyright', array(
		 'label' => __('Bottom footer copyright','nc-framework'),
		 'section' => 'footer_section',
		 'type' => 'text',
		 'description' => __('You can overwrite the automated copyright here.','nc-framework')
	));
}
add_action('customize_register', 'nc_customizer_footer');

function nc_customizer_footer_css() {?>
<style id="footer-css" media="screen">
	<?php // Footer spacing options

	if(get_theme_mod('footer_count') !=='0' || get_theme_mod('footer_count') !=='1'):?>
		
	#megafooter .ncolumns { 
		--column-gap: <?php echo get_theme_mod('column_spacing', '3em')?>;
		--row-gap: <?php echo get_theme_mod('column_spacing', '3em')?>;
		--count: <?php echo get_theme_mod('footer_count', '0')?>;
		--min-col-width: <?php echo get_theme_mod('column_minwidth', '250px')?>;
	}
	
	#megafooter .ncolumns-borders > *:not(:last-child):after {
    display:block;
    content:'';
    width:1px;
    height:100%;
    background:var(--column-border-color);
    position:absolute;
    right:calc( -1 * var(--column-gap) / 2 );
    top:0;
    opacity:0.5;
  }

	
	<?php if (get_theme_mod('footer_lay', 'ncolumns-flow') == 'ncolumns-fixed'): ?>
	/* The Responsive */
	
	@media (max-width:<?php echo get_theme_mod('footer_break', '860px'); ?>) { 

		#megafooter .ncolumns,
		#megafooter .ncolumns-borders { grid-template-columns:1fr; }

		#megafooter .ncolumns-borders { grid-gap: var(--column-gap); }

		#megafooter .ncolumns-borders > *:not(:last-child):after { width:100%; height:1px; right:auto;	bottom: calc( -1 * var(--column-gap) / 2 ); top:auto;
		}
	
	}
	<?php endif; // end responsive ?>

	<?php endif;?>

</style>

<?php }

add_action('wp_head', 'nc_customizer_footer_css', 9);?>