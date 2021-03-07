<?php

/* 
Fields Groups:
 - Featured Image Focus
 - Add the next one here
*/

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5bd1e47e25653',
		'title' => 'Featured Image Focus',
		'fields' => array(
			array(
				'key' => 'field_5bd1e49050d5c',
				'label' => 'Featured Image Focus',
				'name' => 'featured_image_focus',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'left top' => 'Left Top',
					'left center' => 'Left Middle',
					'left bottom' => 'Left Bottom',
					'center top' => 'Center Top',
					'center center' => 'Center Middle',
					'center bottom' => 'Center Bottom',
					'right top' => 'Right Top',
					'right center' => 'Right Middle',
					'right bottom' => 'Right Bottom',
				),
				'default_value' => array(
					0 => 'center center',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),			
			array(
				array(
					'param' => 'attachment',
					'operator' => '==',
					'value' => 'image',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'modified' => 1565621426,
	));
	
	
	endif;
?>