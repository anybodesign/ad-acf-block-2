<?php defined('ABSPATH') or die(); 

// Posts Block

add_action('acf/init', 'adblocks2_posts_init');
function adblocks2_posts_init() {

	if( function_exists('acf_register_block') ) {
		
		// Posts
		
		acf_register_block(array(
			'name'				=> 	'posts-2',
			'title'				=> 	__('Posts', 'adblocks2'),
			'description'		=> 	__('Insert one or many posts or custom posts.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="M21 8v12a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Zm-4.807 5.923c.495-.536 1.171-.608 1.73-.461.179.05.37 0 .502-.13l.427-.428a.513.513 0 0 0-.006-.731L15.8 9.227a.513.513 0 0 0-.72.006c-.135.135-.285.285-.397.418a.498.498 0 0 0-.108.544 1.72 1.72 0 0 1-.4 1.835l-.378.379c-.427.533-1.124.616-1.704.385a.513.513 0 0 0-.558.11l-.404.404c-.2.2-.2.525 0 .725l1.026 1.025-1.64 1.64c-.253.253-1.64 2.02-1.388 2.271.252.253 2.018-1.135 2.27-1.387l1.64-1.64 1.026 1.025c.2.2.525.2.725 0 .137-.137.288-.288.397-.423a.495.495 0 0 0 .112-.528c-.193-.588-.037-1.287.39-1.715l.505-.378Z"/><path fill="#FFF" d="M19 6.02H7.02a1 1 0 0 0-1 1V19H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.02Z"/><path fill="#FFF" d="M17 4.02H5.02a1 1 0 0 0-1 1V17H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.02Z"/></g></svg>',
			'mode'				=> 	'auto',
			'supports'			=> 	array( 'align' => array( 'wide', 'full' ), 'mode' => false),
			'keywords'			=>	array( 'posts', 'publications', 'articles' ),
			'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-posts/templates/block-posts-template.php',
			'enqueue_assets'	=>	'adb2_posts_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'__is_preview'	=> true,
										),
									)
			),
		));
	}
}

// Load assets
	
function adb2_posts_assets() {

	wp_register_style( 
		'adb2-block-posts-css', 
		ADB2__PLUGIN_URL . 'blocks/block-posts/css/block-posts.css', 
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
	
	if ( ! is_admin() ) {
		wp_enqueue_style( 'adb2-slick-css' );
		wp_enqueue_style( 'adb2-slick-theme' );
		wp_enqueue_script( 'adb2-slick' );
	}
	
	wp_enqueue_style( 'adb2-block-posts-css' );
   
}

// Load ACF fields (PHP)

require_once( ADB2__PLUGIN_PATH . 'blocks/block-posts/block-posts-fields.php' );