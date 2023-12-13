<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_gallery_init');
function adblocks2_gallery_init() {

	if( function_exists('acf_register_block') ) {
		
		// Gallery
		
		acf_register_block(array(
			'name'				=> 	'gallery-2',
			'title'				=> 	__('Gallery', 'adblocks2'),
			'description'		=> 	__('Add a gallery', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="M21 8v12a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Z"/><path fill="#FFF" d="M19 6.02H7.02a1 1 0 0 0-1 1V19H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.02Z"/><path fill="#FFF" d="M17 4.02H5.02a1 1 0 0 0-1 1V17H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.02Z"/><path fill="#2D3846" d="M11.5 9a2.501 2.501 0 0 1 0 5 2.501 2.501 0 0 1 0-5ZM18.146 9.854a.5.5 0 0 1 .854.353V18.5a.5.5 0 0 1-.5.5h-8.293a.5.5 0 0 1-.353-.854l8.293-8.293Z"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 
										'align' => array( 'wide', 'full' ), 
										'mode' => false, 
										'anchor' => true, 
										'customClassName' => true,
										'jsx' => true
									),
            'keywords'			=> 	array( 'gallery', 'galerie' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-gallery/templates/block-gallery-template.php',
            'enqueue_assets'	=>	'adb2_gallery_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'gallery',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function adb2_gallery_assets() {
	
	wp_register_style( 
		'adb2-block-gallery-css', 
		ADB2__PLUGIN_URL . 'blocks/block-gallery/css/block-gallery.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_style( 
		'adb2-fancybox-css', 
		ADB2__PLUGIN_URL . 'assets/css/jquery.fancybox.min.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_script( 
		'adb2-fancybox-js', 
		ADB2__PLUGIN_URL . 'assets/js/jquery.fancybox.min.js',
		array('jquery'), 
		null, 
		true
	);
	wp_register_script( 
		'adb2-fancybox-init', 
		ADB2__PLUGIN_URL . 'assets/js/fancybox-init.js',
		array('adb2-fancybox-js'), 
		null, 
		true
	);
	
	wp_enqueue_style( 'adb2-block-gallery-css' );		
   
}