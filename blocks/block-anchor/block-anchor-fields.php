<?php defined('ABSPATH') or die(); 

function adblocks2_anchor_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e33d1fa55f25',
	'title' => __('Anchor', 'adblocks2'),
	'fields' => array(
		array(
			'key' => 'field_5e33d20929e72',
			'label' => __('HTML Markup', 'adblocks2'),
			'name' => 'html',
			'type' => 'select',
			'instructions' => __('Choose the anchor markup.', 'adblocks2'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'div' => __('<div>', 'adblocks2'),
				'span' => __('<span>', 'adblocks2'),
				'section' => __('<section>', 'adblocks2'),
			),
			'default_value' => 'div',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5e33d27629e73',
			'label' => __('Anchor ID', 'adblocks2'),
			'name' => 'id',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ed51fa98e660',
			'label' => __('Offset', 'adblocks2'),
			'name' => 'offset',
			'type' => 'number',
			'instructions' => __('Set an offset value for the scroll, useful if you have a sticky header.', 'adblocks2'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5ed629901c93e',
			'label' => __('Speed', 'adblocks2'),
			'name' => 'speed',
			'type' => 'number',
			'instructions' => __('Set the scroll speed in milliseconds. (1000 = 1 sec)', 'adblocks2'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1000,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/anchor-2',
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

endif;

}
add_action('acf/init', 'adblocks2_anchor_fields');