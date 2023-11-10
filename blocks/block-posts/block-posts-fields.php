<?php defined('ABSPATH') or die(); 

function adblocks2_posts_fields() {
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5dfa2713d3b09',
			'title' => __('Posts Block', 'adblocks2'),
			'fields' => array(
				array(
					'key' => 'field_6548ed7b61977',
					'label' => __('Columns', 'adblocks2'),
					'name' => 'columns',
					'aria-label' => '',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '66',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'1col' => __('1', 'adblocks2'),
						'2cols' => __('2', 'adblocks2'),
						'3cols' => __('3', 'adblocks2'),
						'4cols' => __('4', 'adblocks2'),
						'5cols' => __('5', 'adblocks2'),
						'6cols' => __('6', 'adblocks2'),
					),
					'default_value' => '3cols',
					'return_format' => 'value',
					'allow_null' => 0,
					'layout' => 'horizontal',
				),
				array(
					'key' => 'field_601a7c66d4be8',
					'label' => __('Mode', 'adblocks2'),
					'name' => 'mode',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'manual' => __('Manual', 'adblocks2'),
						'auto' => __('Automatic', 'adblocks2'),
					),
					'allow_null' => 0,
					'default_value' => 'manual',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_601a7caed4be9',
					'label' => __('Number of posts to show', 'adblocks2'),
					'name' => 'auto_nb',
					'type' => 'number',
					'instructions' => __('Leave blank to show all posts', 'adblocks2'),
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_601a7c66d4be8',
								'operator' => '==',
								'value' => 'auto',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 3,
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_601a7d0bd4bea',
					'label' => __('Post type', 'adblocks2'),
					'name' => 'auto_type',
					'type' => 'text',
					'instructions' => __('<em>post</em> for Posts, <em>page</em> for Pages or <em>your_cpt_slug</em> for any custom post type.', 'adblocks2'),
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_601a7c66d4be8',
								'operator' => '==',
								'value' => 'auto',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'post',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5dfa27874faba',
					'label' => __('Select one or many publications', 'adblocks2'),
					'name' => 'posts_select',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_601a7c66d4be8',
								'operator' => '==',
								'value' => 'manual',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => '',
					'taxonomy' => '',
					'filters' => array(
						0 => 'search',
						1 => 'post_type',
					),
					'elements' => array(
						0 => 'featured_image',
					),
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_61de89a0e5046',
					'label' => __('Display featured image', 'adblocks2'),
					'name' => 'display_featured',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5dfa2c4cc8bb0',
					'label' => __('Content to show', 'adblocks2'),
					'name' => 'content_show',
					'type' => 'button_group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'excerpt' => __('Excerpt', 'adblocks2'),
						'content' => __('Full content', 'adblocks2'),
					),
					'allow_null' => 0,
					'default_value' => 'excerpt',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5dfa2bcaa5483',
					'label' => __('Posts title level', 'adblocks2'),
					'name' => 'title_level',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'h2' => __('H2', 'adblocks2'),
						'h3' => __('H3', 'adblocks2'),
						'h4' => __('H4', 'adblocks2'),
						'h5' => __('H5', 'adblocks2'),
						'h6' => __('H6', 'adblocks2'),
						'p' => __('None', 'adblocks2'),
					),
					'default_value' => 'h2',
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5e454fa2b2b02',
					'label' => __('Display post metas', 'adblocks2'),
					'name' => 'metas',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_600031416d176',
					'label' => __('Additional metas', 'adblocks2'),
					'name' => 'your_metas',
					'type' => 'checkbox',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e454fa2b2b02',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'author' => __('Author', 'adblocks2'),
						'cat' => __('Category', 'adblocks2'),
					),
					'allow_custom' => 0,
					'default_value' => array(
					),
					'layout' => 'vertical',
					'toggle' => 0,
					'return_format' => 'value',
					'save_custom' => 0,
				),
				array(
					'key' => 'field_600aa97b3e178',
					'label' => __('Carousel mode', 'adblocks2'),
					'name' => 'slider',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_600afc38d0587',
					'label' => __('Only on mobile', 'adblocks2'),
					'name' => 'slider_mobile',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_600aa97b3e178',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/posts-2',
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
add_action('acf/init', 'adblocks2_posts_fields');