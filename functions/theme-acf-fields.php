<?php

/* 
Fields Groups:
 - Related Content
 - Gallery Image Link
*/

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5951c79598e52',
		'title' => 'Related Content',
		'fields' => array(
				array(
						'key' => 'field_5951c7a4df31f',
						'label' => 'Related Content',
						'name' => 'chose_related_content',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
						),
						'post_type' => array(
								0 => 'all',
						),
						'taxonomy' => '',
						'filters' => array(
								0 => 'search',
								1 => 'post_type',
								2 => 'taxonomy',
						),
						'elements' => '',
						'min' => '',
						'max' => '',
						'return_format' => 'object',
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
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
));
	
acf_add_local_field_group(array(
	'key' => 'group_63e43972e9ddb',
	'title' => 'Gallery Image Link',
	'fields' => array(
		array(
			'key' => 'field_63e439744b211',
			'label' => 'Custom Link',
			'name' => 'custom_link',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'attachment',
				'operator' => '==',
				'value' => 'image',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

	
	endif;
?>