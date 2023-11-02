<?php defined('ABSPATH') or die(); 

// Text Block

add_action('acf/init', 'adblocks2_counter_init');
function adblocks2_counter_init() {

	if( function_exists('acf_register_block') ) {

		// counter
		
		acf_register_block(array(
			'name'				=> 	'counter-2',
			'title'				=> 	__('Counter', 'adblocks2'),
			'description'		=> 	__('Add an animated counter, key numbers.', 'adblocks2'),
			'category'			=> 	'ad-blocks-2',
			'icon'				=> 	'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g fill="none" fill-rule="evenodd"><path fill="#2D3846" d="M24 1.92C24 .86 23.14 0 22.08 0H1.92C.86 0 0 .86 0 1.92v20.16C0 23.14.86 24 1.92 24h20.16c1.06 0 1.92-.86 1.92-1.92V1.92Z"/><path fill="#FFF" d="m3.022 7.555-1.007.293a.276.276 0 0 0-.203.28v1.363c0 .153.089.23.242.23l1.006-.039c.063 0 .102.038.102.102v6.406c0 .153.089.242.242.242h1.91c.153 0 .242-.09.242-.242V7.76c0-.154-.09-.243-.242-.243h-2c-.101 0-.178 0-.292.038ZM10.472 16.585c2.024 0 3.273-1.197 3.273-3.159v-2.903c0-1.923-1.248-3.108-3.273-3.108-2.025 0-3.26 1.185-3.26 3.108v2.903c0 1.962 1.235 3.159 3.26 3.159Zm0-2.05c-.535 0-.866-.37-.866-.981v-3.108c0-.611.33-.98.866-.98.547 0 .878.369.878.98v3.108c0 .611-.33.98-.878.98ZM18.66 16.585c2.025 0 3.273-1.197 3.273-3.159v-2.903c0-1.923-1.248-3.108-3.273-3.108-2.025 0-3.26 1.185-3.26 3.108v2.903c0 1.962 1.235 3.159 3.26 3.159Zm0-2.05c-.535 0-.866-.37-.866-.981v-3.108c0-.611.331-.98.866-.98.548 0 .879.369.879.98v3.108c0 .611-.331.98-.879.98Z"/></g></svg>',
            'mode'				=> 	'auto',
            'supports'			=> 	array( 
										'align' => array( 'wide', 'full' ), 
										'mode' => false, 
										'anchor' => true, 
										'customClassName' => true,
									),
            'keywords'			=> 	array( 'counter', 'compteur', 'key', 'clé', 'numbers', 'chiffres' ),
            'render_template'   =>	ADB2__PLUGIN_PATH . 'blocks/block-counter/templates/block-counter-template.php',
            'enqueue_assets'	=>	'adb2_counter_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'id'			=> 'counter',
											'__is_preview'	=> true,
										),
									)
			),
            
		));
	}	
}

// Load assets
	
function adb2_counter_assets() {

	wp_register_style( 
		'adb2-block-counter-css', 
		ADB2__PLUGIN_URL . 'blocks/block-counter/css/block-counter.css', 
		array(), 
		null, 
		'screen'
	);
    wp_register_script( 
	    	'adb2-block-counter-js', 
	    	ADB2__PLUGIN_URL . 'blocks/block-counter/js/block-counter.js',
	    	array('jquery'), 
	    	null, 
	    	true
    );

	wp_enqueue_style( 'adb2-block-counter-css' );
	wp_enqueue_script( 'adb2-block-counter-js' );
   
}