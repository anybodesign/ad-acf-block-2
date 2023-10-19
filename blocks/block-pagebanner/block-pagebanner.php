<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_pagebanner_block_init');
function adblocks2_pagebanner_block_init() {

	if( function_exists('acf_register_block') ) {

		// Page Banner
		
		acf_register_block(array(
			'name'				=> 	'pagebanner-2',
			'title'				=> 	__('Page Banner', 'adblocks2'),
			'description'		=> 	__('Add a page banner at the beginning of your page.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="M22.001 17a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h18.001a1 1 0 0 1 1 1v10Zm-11-4.001V8.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V13l1.475-1.475a.5.5 0 0 1 .707 0l.707.707a.5.5 0 0 1 0 .708l-3.536 3.535a.5.5 0 0 1-.706 0l-3.536-3.536a.5.5 0 0 1 0-.707l.707-.707a.5.5 0 0 1 .708 0L11 12.998Z"/></g></svg>',
            'mode'				=>	'auto',
            'supports'			=>	array( 
										'align' => array( 'wide', 'full' ), 
										'mode' => false, 
										'multiple' => false,
										'anchor' => true, 
										'customClassName' => true,
										'color' => false,
										'jsx' => true
									),
            'keywords'			=>	array( 'banner', 'bannière' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-pagebanner/templates/block-pagebanner-template.php',
            'enqueue_assets'	=>	'adb2_pagebanner_assets',	
			'example' 			=>	array(
										'attributes'		=> array(
											'mode'			=> 'preview',
											'data'			=> array(
												'id'			=> 'pagebanner',
												'__is_preview'	=> true,
											),
										)
			),
            
		));
	}	
}

// Load assets
	
function adb2_pagebanner_assets() {

	wp_register_style( 
		'adb2-block-pagebanner', 
		ADB2__PLUGIN_URL . 'blocks/block-pagebanner/css/block-pagebanner.css', 
		array(), 
		null, 
		'screen'
	);
    wp_register_script( 
    	'adb2-block-pagebanner-js', 
    	ADB2__PLUGIN_URL . 'blocks/block-pagebanner/js/block-pagebanner.js',
    	array('jquery'), 
    	null, 
    	true
    );
	wp_register_style( 
		'adb2-slick-css', 
		ADB2__PLUGIN_URL . 'assets/css/slick.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_script( 
    	'adb2-slick', 
    	ADB2__PLUGIN_URL . 'assets/js/slick.min.js',
    	array('jquery'), 
    	null, 
    	true
    );

	wp_enqueue_style( 'adb2-block-pagebanner' );
	
	if ( ! is_admin() ) {
		wp_enqueue_style( 'adb2-slick-css' );
		wp_enqueue_script( 'adb2-slick' );
		wp_enqueue_script( 'adb2-block-pagebanner-js' );
	}
}

// Load ACF fields (PHP)

require_once( ADB2__PLUGIN_PATH . 'blocks/block-pagebanner/block-pagebanner-fields.php' );

