<?php defined('ABSPATH') or die(); 

function adblocks2_files_fields() {
	if( function_exists('acf_add_local_field_group') ):
		
		acf_add_local_field_group(array(
			'key' => 'group_60e5945264969',
			'title' => __('List Of Files Block', 'adblocks2'),
			'fields' => array(
				array(
					'key' => 'field_60e5949e44098',
					'label' => __('Add files', 'adblocks2'),
					'name' => 'add_files',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => __('Add a file', 'adblocks2'),
					'sub_fields' => array(
						array(
							'key' => 'field_60e594ab44099',
							'label' => __('File', 'adblocks2'),
							'name' => 'file',
							'type' => 'file',
							'instructions' => __('Allowed file type: PDF, ZIP, DOC, JPEG, PNG, MP3 and MP4', 'adblocks2'),
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'library' => 'all',
							'min_size' => '',
							'max_size' => '',
							'mime_types' => 'pdf, zip, jpg, jpeg, png, doc, mp3, mp4',
						),
						array(
							'key' => 'field_61bc308f4ed93',
							'label' => __('Custom title', 'adblocks2'),
							'name' => 'title',
							'type' => 'text',
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
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_65cb3b2f16178',
							'label' => __( 'Thumbnail', 'adblocks2' ),
							'name' => 'thumb',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_65cb452566ddb',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
							'preview_size' => 'thumbnail',
						),
					),
				),
				array(
					'key' => 'field_60e5aa9a3ad63',
					'label' => __('Display file type icon', 'adblocks2'),
					'name' => 'files_icons',
					'type' => 'true_false',
					'instructions' => __( 'Disabled if a picture is set in the file list', 'adblocks2' ),
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_65cb452566ddb',
								'operator' => '!=',
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
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_61430ae0b8d5a',
					'label' => __('Use custom theme icons', 'adblocks2'),
					'name' => 'custom_icons',
					'type' => 'true_false',
					'instructions' => __('Icons path in the theme must be: <em>/img/icons/files/</em><br>
		File names: <em>archive.svg, audio.svg, picture.svg, text.svg, video.svg, blank.svg</em>', 'adblocks2'),
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_60e5aa9a3ad63',
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
				array(
					'key' => 'field_65cb452566ddb',
					'label' => __( 'Use Thumbnails instead of Icons', 'adblocks2' ),
					'name' => 'use_thumbs',
					'aria-label' => '',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui_on_text' => '',
					'ui_off_text' => '',
					'ui' => 1,
				),
				array(
					'key' => 'field_65cb3b2f16221',
					'label' => __( 'Thumbnail size', 'adblocks2' ),
					'name' => 'size',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => __( 'thumbnail, medium, large, full or custom size', 'adblocks2' ),
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_65cb452566ddb',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'medium',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/files-2',
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
add_action('acf/init', 'adblocks2_files_fields');