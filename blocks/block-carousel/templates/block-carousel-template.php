<?php if ( !defined('ABSPATH') ) die();
	$anchor = '';
	if( !empty( $block['anchor'] ) ) {
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	}
	$className = 'acf-block--carousel';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	$placeholder = array(
		array( 'core/paragraph', array(
			'placeholder' => __('Add content here', 'adblocks2'),
		)),
	);
	
	
	$type = get_field('type');
	$elems = get_field('elems');
	$scroll = get_field('slides_scroll');
	
	$auto = get_field('autoplay');
	$fade = get_field('fade');
	$speed = get_field('speed');
	$autospeed = get_field('autospeed');
	$arrows = get_field('arrows');
	$dots = get_field('dots');
	
	$the_posts = get_field('the_posts');
	
	if ($elems == 'one') { $slide = 1; }
	if ($elems == 'two') { $slide = 2; }
	if ($elems == 'three') { $slide = 3; }
	if ($elems == 'four') { $slide = 4; }
	if ($elems == 'five') { $slide = 5; }
	if ($elems == 'six') { $slide = 6; }
	
	if ($scroll == null) { $slide_scroll = $slide; } // Default
	if ($scroll == 'one') { $slide_scroll = 1; }
	if ($scroll == 'two') { $slide_scroll = 2; }
	if ($scroll == 'three') { $slide_scroll = 3; }
	if ($scroll == 'four') { $slide_scroll = 4; }
	if ($scroll == 'five') { $slide_scroll = 5; }
	if ($scroll == 'six') { $slide_scroll = 6; }
	
	if ($auto == true) {
		$autoplay = 'true';
	} else {
		$autoplay = 'false';
	}
	if ($arrows) { $arr = 'true'; } else { $arr = 'false'; }
	if ($dots) { $do = 'true'; } else { $do = 'false'; }
	
	$i = rand();
	$slider_id = 'adb_carousel_'.$i;
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/carousel-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); ?>" <?php echo esc_attr($anchor); ?>>
				<div class="acf-block-container">
					
					<div class="the-adb-carousel  type-<?php echo esc_attr($type); ?> <?php echo esc_attr($elems); ?>" id="<?php echo $slider_id; ?>">
						<?php if ( $the_posts && $type == 'posts' ) : ?>
							
							<?php 
							foreach( $the_posts as $p ) : 
								
								$cat = get_the_category($p->ID);
								$cpt = get_post_type($p->ID);
								
								include ADB2__PLUGIN_PATH . '/blocks/block-carousel/templates/block-carousel-content.php';
							endforeach;							
							?>
							
						<?php else: ?>
						<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $placeholder ) ); ?>" />
						<?php endif; ?>
					</div>
					
					<?php if (!is_admin()) { ?>
					<script>
						jQuery(document).ready(function($) {
							var slideshow = $('#<?php echo $slider_id; ?>').slick({
								autoplay: <?php echo $autoplay; ?>,
								speed: <?php echo $speed; ?>,
								autoplaySpeed: <?php echo $autospeed; ?>,
								slidesToShow: 1,
								slidesToScroll: 1,
								arrows: <?php echo $arr; ?>,
								dots: <?php echo $do; ?>,
								pauseOnHover: true,
								<?php if ($fade) {
									echo 'fade: true,';
								} ?>
								//variableWidth: true,
								nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="<?php echo esc_html_e('Next panel','adblocks2'); ?>"> › </button>',
								prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="<?php echo esc_html_e('Previous panel','adblocks2'); ?>"> ‹ </button>',
								mobileFirst: true,
								responsive: [
									{
								  	breakpoint: 720,
								  	settings: {
										slidesToShow: <?php if ($elems != 'one') { echo '2'; } else { echo '1'; } ?>,
										slidesToScroll: <?php if ($elems != 'one') { echo '2'; } else { echo '1'; } ?>
								  	}
									},
									{
								  	breakpoint: 960,
								  	settings: {
										slidesToShow: <?php if ($elems != 'one') { echo $slide; } else { echo '1'; } ?>,
										slidesToScroll: <?php if ($elems != 'one') { echo $slide_scroll; } else { echo '1'; } ?>
								  	}
									},
								]
							});
						});
					</script>
					<?php } ?>
					
				</div>
			</section>
	
<?php } ?>