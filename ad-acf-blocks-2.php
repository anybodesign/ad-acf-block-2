<?php defined('ABSPATH') or die(); 
/**
 * Plugin Name: AD ACF Blocks 2
 * Description: A collection of blocks made with ACF for WordPress 
 * Version: 1.7
 * Author: Thomas Villain - Anybodesign
 * Author URI: https://anybodesign.com/
 * Text Domain: adblocks2
 * Domain Path: /languages/ 
 */

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//
// Plugin Basics
//
// ////////////////


// Constants

define( 'ADB2__PLUGIN_VERSION', '1.7' );
define( 'ADB2__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADB2__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ADB2__BASENAME', plugin_basename( __FILE__ ) );


// i18n

load_plugin_textdomain( 'adblocks2', false, basename( dirname( __FILE__ ) ) . '/languages/' );


// Image size

add_image_size( 'adblocks-thumbnail-hd', 500, 500, true );
add_image_size( 'adblocks-medium-hd', 1000, 1000, false );
add_image_size( 'adblocks-large-hd', 2000, 2000, false );


// ACF & ACF Blocks Notice

add_action('after_plugin_row_' . ADB2__BASENAME, 'adblocks2_acf_plugin_row', 5, 3);
function adblocks2_acf_plugin_row($plugin_file, $plugin_data, $status) {
    
	if ( class_exists('ACF') && defined('ACF_PRO') && defined('ACF_VERSION') && version_compare(ACF_VERSION, '5.8', '>=') ) {
        return;
    } ?>
    
    <style>
        .plugins tr[data-plugin='<?php echo ADB2__BASENAME; ?>'] th,
        .plugins tr[data-plugin='<?php echo ADB2__BASENAME; ?>'] td {
            box-shadow: none;
        }
        
        <?php if ( isset($plugin_data['update']) && !empty($plugin_data['update']) ) { ?>
            
            .plugins tr.acfe-plugin-tr td {
                box-shadow: none !important;
            }
            .plugins tr.acfe-plugin-tr .update-message {
                margin-bottom: 0;
            }
            
        <?php } ?>
    </style>
    
    <tr class="plugin-update-tr active acfe-plugin-tr">
        <td colspan="3" class="plugin-update colspanchange">
            <div class="update-message notice inline notice-error notice-alt">
                <p><?php _e('AD ACF Blocks requires Advanced Custom Fields PRO (minimum: 5.8).', 'adblocks2'); ?></p>
            </div>
        </td>
    </tr>
    
    <?php  
}

add_action('after_plugin_row_' . ADB2__BASENAME, 'adblocks2_adblocks_plugin_row', 5, 3);
function adblocks2_adblocks_plugin_row($plugin_file, $plugin_data, $status) {
    
	if ( ! function_exists('adblocks_block_categories') ) {
        return;
    } ?>
    
	<div class="update-message notice inline notice-warning notice-alt" style="margin-top: 15px">
    	<p><?php _e('It’s recommanded to deactivate the previous version of AD ACF Blocks to avoid any conflict.', 'adblocks2'); ?></p>
	</div>
    
    <?php   
}

// Custom excerpt
// https://gist.github.com/samjbmason/4050714

function adblocks2_get_excerpt($count, $post_id){
    $permalink = get_permalink($post_id);
    $title = get_the_title($post_id);
    $excerpt = get_post($post_id);
    $excerpt = $excerpt->post_content;
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    
    $excerpt = '<p>'.$excerpt.'... <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks2').' <span class="a11y-hidden"> '.esc_html__('of ', 'adblocks2').$title.'</span></a></p>';
    return $excerpt;
}


// Block Patterns 

function adb2_register_blocks_patterns() {
  
    register_block_pattern(
    'cta',
        array(
            'title'       => __( 'Call to action', 'adblocks2' ),
            //'description' => _x( 'Yolo', 'adblocks2' ),
            'content'     => '<!-- wp:columns {"verticalAlignment":null,"backgroundColor":"white"} -->
            <div class="adb2-cta wp-block-columns has-white-background-color has-background"><!-- wp:column {"verticalAlignment":"top","width":"66.66%"} -->
            <div class="wp-block-column is-vertically-aligned-top" style="flex-basis:66.66%"><!-- wp:paragraph -->
            <p>Lemon drops liquorice cotton candy gummies cotton candy cookie. Macaroon chocolate cake danish shortbread danish cake.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:column -->
            
            <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons"><!-- wp:button -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">A call to action</a></div>
            <!-- /wp:button --></div>
            <!-- /wp:buttons --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns -->',
            'categories'    => array( 'featured' ),
            'keywords'      => array( 'cta', 'call to action' ),
        )
    );
    
    register_block_pattern(
    'card',
        array(
            'title'       => __( 'Card', 'adblocks2' ),
            //'description' => _x( 'Yolo', 'adblocks2' ),
            'content'     => '<!-- wp:group {"backgroundColor":"white","layout":{"type":"constrained"}} -->
            <div class="adb2-card wp-block-group has-white-background-color has-background"><!-- wp:image {"id":27,"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="/wp-content/plugins/ad-acf-blocks-2/assets/fallback.jpg" alt="" class="wp-image-27"/></figure>
            <!-- /wp:image -->
            
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="wp-block-heading has-text-align-center">Card Title</h2>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Card subtitle</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:separator -->
            <hr class="wp-block-separator has-alpha-channel-opacity"/>
            <!-- /wp:separator -->
            
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Cupcake ipsum dolor sit amet carrot cake. Pie icing danish chocolate cake sweet roll macaroon carrot cake chocolate cake cookie. Gingerbread oat cake I love chocolate cake cookie dessert.</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center"><a href="#">Link</a></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->',
            'categories'    => array( 'featured' ),
            'keywords'      => array( 'card', 'carte' ),
        )
    );
}
add_action( 'init', 'adb2_register_blocks_patterns' );


// Block styles

// register_block_style(
//   'core/gallery',
//     array(
//       'name'	=> 'inside',
//       'label'	=> esc_attr__( 'Caption inside', 'adblocks2' ),
//     )
// );
register_block_style(
  'acf/gallery-2',
    array(
      'name'	=> 'masonry',
      'label'	=> esc_attr__( 'Masonry', 'adblocks2' ),
    )
);
register_block_style(
  'acf/gallery-2',
    array(
      'name'	=> 'grid',
      'label'	=> esc_attr__( 'Grid', 'adblocks2' ),
    )
);

//
// ACF Blocks
//
// ////////////////


// Custom Group

if ( version_compare( $GLOBALS['wp_version'], '5.8-alpha-1', '<' ) ) {
    add_filter( 'block_categories', 'adblocks2_block_categories', 10, 2 );
} else {
    add_filter( 'block_categories_all', 'adblocks2_block_categories', 10, 2 );
}
function adblocks2_block_categories( $block_categories, $block_editor_context ) {

    return array_merge(
        $block_categories,
        array(
            array(
                'slug' 	=> 'ad-blocks-2',
                'title' => esc_html__( 'AD ACF Blocks 2', 'adblocks2' ),
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"><path fill="#757575" fill-rule="evenodd" d="M24.01 13.313c-.21-.056-.768-.084-1.144 0-.377.07-.614.056-.865-.014-.279-.07-.92-.377-.753-.615.167-.237.753-.517.125-.81-.264-.167-.53-.335-.46-.726.056-.321.28-.629.516-.754.349-.224.99-.07 1.325-.545.181-.21-.474-.46-.962-.112-.488.336-.683.322-1.088.294-.195-.014-.376-.154-.404-.35-.028-.195.055-.349.265-.446.07-.028.195-.098.223-.252.028-.153-.14-.251-.363-.28-.209-.027-.362.015-.544-.013-.362-.07-.571-.615-.362-.922.279-.433.53-.908 1.464-1.536.934-.629 1.004-1.201.74-1.215-.42-.028-1.005.782-1.451 1.27-.46.49-.85.699-1.2.867-.348.167-.697 0-.739-.377-.014-.112 0-.238-.041-.336-.126-.363-.293-.447-.698-.335-.53.154-.669.07-.822-.237-.21-.405-.126-.74.027-1.131.07-.196.265-.447.07-.657-.181-.195-.474-.07-.558.098-.125.223-.097.475-.14.726-.069.377-.264.67-.64.852a.853.853 0 0 1-1.005-.195c-.725-.797-.725-1.802-.71-2.137.027-.657.348-1.983.097-2.347-.056-.083-.223-.153-.349-.14-.181.015-.279.182-.293.336-.028.545.14 1.97.112 2.598-.028.628-.223 1.215-.516 1.41-.21.154-.46.182-.642.07-.07-.042-.125-.098-.18-.154-.35-.349-.503-.377-.95-.181-.39.181-1.073-.126-1.394-.754-.209-.405-.293-1.187-.474-1.369-.181-.182-.516-.084-.67.154-.153.251-.027.628.196.838.237.21.418.474.655.865.237.378.098.81-.083 1.16-.154.32-.558.125-.865-.056-.293-.168-.572-.098-.697.21-.098.265.056.6-.419.488-.85-.195-1.143-.614-1.743-1.131-.362-.307-.809-.838-1.032-.559-.223.252.251.657.586.866.516.335.865.754 1.046 1.02.181.279.265.544.07.698-.126.098-.377.195-.6.056-.293-.168-.628-.084-.725.056-.112.167.084.447.376.544.321.112.558.461.572.824 0 .126-.014.322-.195.363-.586.14.181.615-.711.713-.433.028-.572-.028-1.06-.266-.488-.237-.809.21-.753.405.083.28.53.322.85.238.405-.112 1.074.321 1.2.544.111.238-.056.56-.307.852-.251.294-.53.35-.85.377-.391.042-.851-.041-1.34-.07-.501-.027-1.7-.446-1.952.057-.153.307.53.516 1.074.53.74.014 1.45-.14 1.91.042.265.098.489.224.67.447.21.251.265 1.187.07 1.453-.168.237-.182.432.14.516.32.098.543.42.431.727-.055.167-.265.293-.418.432-.223.196-.502.224-.78.308-.266.07-.977.642-.154.852.293.056.502-.112.697-.294.376-.349 1.088-.544 1.548-.293.181.098.21.293.056.461-.21.237-.265.517-.098.698.377.377-.78.978-1.185 1.201-.46.252-.907.531-1.214.964-.306.405-.111.796.126.768.293-.028.488-.21.683-.39.405-.35.628-.643 1.283-1.16.656-.517 1.2-.684 1.757-.447.558.223.196.852.53 1.369.084.125.154.293.419.237.279-.056.474-.614.948-.251.6.489-.056 1.676-.265 2.067-.21.39-.6.95-.711 1.215-.112.28-.502 1.061-.028 1.2.39.113.976-1.675 1.185-2.178.21-.517.767-1.243 1.2-1.285.167-.07.264.042.32.182.195.586.363.377.474.125.07-.097.126-.293.21-.474.223-.294.516.042.571.265.14.391.14.545.028 1.075-.097.531.433.713.6.6.25-.153.125-.572 0-.865-.126-.293-.014-.768.181-.936.195-.167.572-.363.795-.349.404.014.642.252.767.53.153.364.377 1.09.446 1.565.084.475.014 1.788.572 1.885.349.07.32-.684.195-1.187-.18-.698-.46-1.299-.46-1.773.014-.615.349-.852.418-.908.265-.224.53.195.851-.042.167-.126.251-.46.349-.642.195-.405.46-.475.906-.42.767-.013 1.213.978 1.395 1.341.125.252.279.531.474.726.92.894.878-.097.864-.25-.055-.336-.25-.587-.488-.81-.237-.224-.571-.462-.934-.867-.363-.405-.544-1.173-.418-1.48.125-.294.307-.447.6-.405.292.028.78-.238.808-.629 0-.153-.028-.307-.028-.46-.028-.713 1.325-.252 1.618-.056.6.405.976.167 1.004-.042.028-.21-.125-.377-.307-.461-.474-.21-1.199-.252-1.562-.615-.195-.195-.279-.363-.32-.656-.042-.307.18-.53.446-.657.153-.07.195-.181.153-.349-.056-.251.098-.53.349-.586.265-.056.488-.056.767 0 .335.042 1.227.21 1.464.21.237 0 .628-.057.697-.168.084-.126-.25-.363-.446-.433Z"/></svg>',
            ),
        )
    );
}

// Load Blocks (Thanks to Thierry Pigot @ wearewp.pro)

$adblocks = array_diff( scandir(ADB2__PLUGIN_PATH . '/blocks'), array('..', '.', '.DS_Store') );

foreach( $adblocks as $adblock ) {
	include_once ADB2__PLUGIN_PATH . 'blocks/'. $adblock .'/'. $adblock .'.php';
	include_once ADB2__PLUGIN_PATH . 'blocks/'. $adblock .'/'. $adblock .'-fields.php';
}	


// Translate Fields

function adblocks2_custom_acf_settings_localization($localization){
  return true;
}
add_filter('acf/settings/l10n', 'adblocks2_custom_acf_settings_localization');

function adblocks2_custom_acf_settings_textdomain($domain){
  return 'adblocks2';
}
add_filter('acf/settings/l10n_textdomain', 'adblocks2_custom_acf_settings_textdomain');


// Common styles

function adblocks2_common_css() {
	wp_enqueue_style( 
		'adblocks2-common', 
		ADB2__PLUGIN_URL . 'assets/css/adblocks.css',
		array(), 
		ADB2__PLUGIN_VERSION, 
		'screen' 
	);
}
add_action( 'wp_enqueue_scripts', 'adblocks2_common_css' );


// Admin styles

add_action( 'admin_init', 'adblocks2_common_css' ); 

function adblocks2_admin_css() {
	wp_enqueue_style( 
		'adblocks2-admin', 
		ADB2__PLUGIN_URL . 'assets/css/adblocks-admin.css',
		array(), 
		ADB2__PLUGIN_VERSION, 
		'screen' 
	);
}
add_action( 'admin_init', 'adblocks2_admin_css' ); 


//
// Auto-Updater
//
// ////////////////


require 'assets/plugin-update-checker-5.0/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://lab.anybodesign.com/plugins/ad-acf-blocks-2/ad-acf-blocks-2.json',
	__FILE__,
	'ad-acf-blocks-2'
);