<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_files_init');
function adblocks2_files_init() {

	if( function_exists('acf_register_block') ) {

		// Anchor
		
		acf_register_block(array(
			'name'				=> 	'files-2',
			'title'				=> 	__('List Of Files', 'adblocks2'),
			'description'		=> 	__('Add a downloadable file list.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="m17.415 14.88 3.646 3.645a.5.5 0 0 1 0 .707l-.707.707a.5.5 0 0 1-.708 0L16 16.293v2.086a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2.085ZM6 14.378a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1ZM6 18.378a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1ZM12 14.378a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1ZM12 18.378a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1ZM18 10.378a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1ZM6 6.378a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1ZM6 10.378a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1ZM18 6.378a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1Z"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> 	array( 'files', 'fichiers', 'liste', 'list' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-files/templates/block-files-template.php',
            'enqueue_assets'	=>	'adb2_files_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'files',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function adb2_files_assets() {

	wp_register_style( 
		'block-files-css', 
		ADB2__PLUGIN_URL . 'blocks/block-files/css/block-files.css', 
		array(), 
		null, 
		'screen'
	);

	wp_enqueue_style( 'block-files-css' );		    
}

// Load ACF fields (PHP)

require_once( ADB2__PLUGIN_PATH . 'blocks/block-files/block-files-fields.php' );

