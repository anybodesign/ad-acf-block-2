<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_carousel_init');
function adblocks2_carousel_init() {

	if( function_exists('acf_register_block') ) {

		// Carousel
		
		acf_register_block(array(
			'name'				=> 	'carousel-2',
			'title'				=> 	__('Carousel', 'adblocks2'),
			'description'		=> 	__('Add a carousel made of posts or custom content.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="M12 18a1.503 1.503 0 1 1-.001 3.006A1.503 1.503 0 0 1 12 18ZM18.009 18a1.503 1.503 0 1 1-.002 3.006A1.503 1.503 0 0 1 18.01 18ZM5.991 18a1.503 1.503 0 1 1-.001 3.006A1.503 1.503 0 0 1 5.99 18ZM22 15a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v10Z"/><path fill="#2D3846" d="M18.402 12.572a.2.2 0 0 1-.341-.142V7.396a.2.2 0 0 1 .341-.141l2.517 2.517a.2.2 0 0 1 0 .283l-2.517 2.517ZM5.598 7.307a.2.2 0 0 1 .341.141v5.065a.2.2 0 0 1-.341.142l-2.532-2.533a.2.2 0 0 1 0-.283l2.532-2.532Z"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 
										'align' => array( 'wide', 'full' ), 
										'mode' => false, 
										'anchor' => true, 
										'customClassName' => true,
										'jsx' => true
									),
            'keywords'			=> 	array( 'carousel', 'slider' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-carousel/templates/block-carousel-template.php',
            'enqueue_assets'	=>	'adb2_carousel_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'carousel',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function adb2_carousel_assets() {

	wp_register_style( 
		'adb2-block-carousel-css', 
		ADB2__PLUGIN_URL . 'blocks/block-carousel/css/block-carousel.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_style( 
		'adb2-slick-css', 
		ADB2__PLUGIN_URL . 'assets/css/slick.css', 
		array(), 
		null, 
		'screen'
	);
	wp_register_style( 
		'adb2-slick-theme', 
		ADB2__PLUGIN_URL . 'assets/css/slick-theme.css', 
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
	wp_register_script( 
		'adb2-slick-init', 
		ADB2__PLUGIN_URL . 'assets/js/slick-init.js',
		array('adb2-slick'), 
		null, 
		true
	);
	
	if ( ! is_admin() ) {
		wp_enqueue_style( 'adb2-slick-css' );
		wp_enqueue_style( 'adb2-slick-theme' );
		wp_enqueue_script( 'adb2-slick' );
		wp_enqueue_script( 'adb2-slick-init' );
	}

	wp_enqueue_style( 'adb2-block-carousel-css' );
   
}