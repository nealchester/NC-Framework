<?php
function nc_customizer_footer($wp_customize) {
	$wp_customize->add_section('footer_section', array(
		 'title' => 'Footer Layout',
		 'description' => 'Here, you can control how many footer columns you want displayed.',
		 'panel' => 'layout_panel'
	));
	// Footer Count
	$wp_customize->add_setting('footer_count', array(
		 'default' => '0',
		 'sanitize_callback' => 'nc_sanitize_radio'
	));
	$wp_customize->add_control('footer_count', array(
		 'label' => 'Mega footer count',
		 'section' => 'footer_section',
		 'type' => 'radio',
		 'choices' => array(
			  '0' => 'No Mega footer',
			  '1' => 'Single column',
			  '2' => 'Two columns',
			  '3' => 'Three columns',
			  '4' => 'Four columns',
			  '5' => 'Five columns'
		 )
	));

	// Footer layout
	$wp_customize->add_setting('footer_lay', array(
		'default' => 'ncolumns-flow',
		'sanitize_callback' => 'nc_sanitize_radio',
		'description' => ''
   ));
   $wp_customize->add_control('footer_lay', array(
		'label' => 'Mega footer Layout',
		'section' => 'footer_section',
		'type' => 'radio',
		'choices' => array(
			 'ncolumns-fixed' => 'Fixed',
			 'ncolumns-auto' => 'Auto',
			 'ncolumns-flow' => 'Flow'
		)
   ));
   	
	// Footer style
	$wp_customize->add_setting('footer_style', array(
		 'default' => 'footer-gaps',
		 'sanitize_callback' => 'nc_sanitize_radio'
	));
	$wp_customize->add_control('footer_style', array(
		 'label' => 'Mega footer style',
		 'section' => 'footer_section',
		 'type' => 'radio',
		 'choices' => array(
			  'footer-gaps' => 'Gaps',
			  'footer-borders' => 'Borders'
		 )
	));

	// Footer column spacing
	$wp_customize->add_setting('column_spacing', array(
		 'default' => '3em',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('column_spacing', array(
		 'label' => 'Mega footer column spacing',
		 'section' => 'footer_section',
		 'type' => 'text'
	));

	// Footer min width
	$wp_customize->add_setting('column_minwidth', array(
		'default' => '250px',
		'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('column_minwidth', array(
		'label' => 'Mega footer min width',
		'section' => 'footer_section',
		'type' => 'text'
	));

	// Footer breakpoint
	$wp_customize->add_setting('footer_break', array(
		 'default' => '860px',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('footer_break', array(
		 'label' => 'Mega footer breakpoint',
		 'section' => 'footer_section',
		 'type' => 'text'
	));
	// Copyright
	$wp_customize->add_setting('add_html_copyright', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text'
	));
	$wp_customize->add_control('add_html_copyright', array(
		 'label' => 'Bottom footer copyright',
		 'section' => 'footer_section',
		 'type' => 'text',
		 'description' => 'You can overwrite the automated copyright here.'
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