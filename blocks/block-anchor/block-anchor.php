<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_anchor_init');
function adblocks2_anchor_init() {

	if( function_exists('acf_register_block') ) {

		// Anchor
		
		acf_register_block(array(
			'name'				=> 	'anchor-2',
			'title'				=> 	__('Anchor', 'adblocks2'),
			'description'		=> 	__('Add an anchor anywhere in your post and slide to it.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2" viewBox="0 0 24 24"><path d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z" style="fill:#2d3846"/><path d="M11.04 10.347a4.22 4.22 0 0 1-3.372-4.131A4.218 4.218 0 0 1 11.884 2a4.218 4.218 0 0 1 4.215 4.216 4.22 4.22 0 0 1-3.372 4.131v8.113a6.755 6.755 0 0 0 5.688-5.007h-.485a.843.843 0 0 1-.641-1.391l1.542-1.802a.843.843 0 0 1 1.281 0l1.542 1.802a.845.845 0 0 1-.641 1.391h-.867a8.451 8.451 0 0 1-6.091 6.462l-1.531 1.79a.843.843 0 0 1-1.281 0l-1.531-1.79a8.451 8.451 0 0 1-6.091-6.462h-.722a.843.843 0 0 1-.641-1.391L3.8 10.26a.843.843 0 0 1 1.281 0l1.541 1.802a.843.843 0 0 1-.64 1.391h-.63a6.755 6.755 0 0 0 5.688 5.007v-8.113Zm.844-6.671a2.54 2.54 0 1 1-2.54 2.54 2.541 2.541 0 0 1 2.54-2.54Z" style="fill:#fff"/></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 'align' => false, 'mode' => false),
            'keywords'			=> 	array( 'anchor', 'ancre' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-anchor/templates/block-anchor-template.php',
            'enqueue_assets'	=>	'adb2_anchor_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'anchor',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function adb2_anchor_assets() {

	wp_register_style( 
		'adb2-block-anchor-css', 
		ADB2__PLUGIN_URL . 'blocks/block-anchor/css/block-anchor.css', 
		array(), 
		null, 
		'screen'
	);
    wp_register_script( 
	    	'adb2-block-anchor-js', 
	    	ADB2__PLUGIN_URL . 'blocks/block-anchor/js/block-anchor.js',
	    	array('jquery'), 
	    	null, 
	    	true
    );

	wp_enqueue_style( 'adb2-block-anchor-css' );
	wp_enqueue_script( 'adb2-block-anchor-js' );
   
}