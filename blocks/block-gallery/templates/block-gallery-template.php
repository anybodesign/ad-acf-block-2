<?php if ( !defined('ABSPATH') ) die();
	$anchor = '';
	if( !empty( $block['anchor'] ) ) {
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	}
	$className = 'acf-block--gallery';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	// $placeholder = array(
	// 	array( 'core/paragraph', array(
	// 		'placeholder' => __('Add some pictures here', 'adblocks2'),
	// 	)),
	// );
	
	$cols = get_field('cols');
	$slider = get_field('slider');
	
	$auto = get_field('autoplay');
	$fade = get_field('fade');
	$speed = get_field('speed');
	$autospeed = get_field('autospeed');
	$arrows = get_field('arrows');
	$dots = get_field('dots');
	
	if ($cols == 'col-1') { $slide = 1; }
	if ($cols == 'col-2') { $slide = 2; }
	if ($cols == 'col-3') { $slide = 3; }
	if ($cols == 'col-4') { $slide = 4; }
	if ($cols == 'col-5') { $slide = 5; }
	if ($cols == 'col-6') { $slide = 6; }
	if ($cols == 'col-7') { $slide = 7; }
	if ($cols == 'col-8') { $slide = 8; }
	
	if ($auto == true) {
		$autoplay = 'true';
	} else {
		$autoplay = 'false';
	}
	if ($arrows) { $arr = 'true'; } else { $arr = 'false'; }
	if ($dots) { $do = 'true'; } else { $do = 'false'; }
	
	$images = get_field('pictures');
	$size = get_field('size');
	$enlarge = get_field('enlarge');
	$inside = get_field('inside');
	
	$i = rand();
	$slider_id = 'adb_slider_'.$i;
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/gallery-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); ?>" <?php echo $anchor; ?>>
				<div class="acf-block-container">
					
					<?php if( $images ): ?>
					
					<?php if ($slider) { ?>
					<div class="the-adb-carousel acf-gallery-container<?php echo ' is-'.$cols; if ($enlarge) { echo ' is-fancy'; } if ($inside) { echo ' is-caption-hidden'; } ?>" id="<?php echo $slider_id; ?>">
					<?php } else { ?>	
					<div class="acf-gallery-container<?php echo ' is-'.$cols; if ($enlarge) { echo ' is-fancy'; } if ($inside) { echo ' is-caption-hidden'; } ?>">
					<?php } ?>
					
						<?php foreach( $images as $image ): ?>
						<div class="acf-block-gallery-item">
							
							<?php								
								if ($size == 'medium') {
									$the_size = $image['sizes']['adblocks-medium-hd'];
								}
								else if ($size == 'large') {
									$the_size = $image['sizes']['adblocks-large-hd'];
								}
								else {
									$the_size = $image['sizes']['adblocks-thumbnail-hd'];
								}								
							?>
							
							<?php if ($enlarge) : ?>
							<a href="<?php echo esc_url( $image['url'] ); ?>" title="<?php esc_attr_e('Enlarge picture', 'adblocks2'); ?>" data-fancybox="gallery-<?php echo $i; ?>">
							<?php endif; ?>	
							   
							<figure class="acf-block-gallery-figure"<?php if ( $image['caption'] ) { echo ' role="group"'; } ?>>
									<img src="<?php echo $the_size; ?>" alt="<?php echo $image['alt']; ?>">
									<?php if ( $image['caption'] ) { ?>
									<figcaption class="acf-block-gallery-caption">
										<span class="acf-block-gallery-caption-title"><?php echo $image['caption']; ?></span>
									</figcaption>
									<?php } ?>
							</figure>
							
							<?php if( $enlarge ): ?>
							</a>
							<?php endif; ?>	
							
						</div>
						<?php endforeach; ?>
						
					</div>
					<?php endif; ?>
					
					<?php 
						if ($slider) { 
							wp_enqueue_style( 'adb2-slick-css' );
							wp_enqueue_style( 'adb2-slick-theme' );
							wp_enqueue_script( 'adb2-slick' );
							wp_enqueue_script( 'adb2-slick-init' );
					?>
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
									nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="Panneau suivant"> › </button>',
									prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="Panneau précédent"> ‹ </button>',
									mobileFirst: true,
									responsive: [
										{
										  breakpoint: 720,
										  settings: {
											slidesToShow: <?php if ($cols != 'col-1') { echo '2'; } else { echo '1'; } ?>,
											slidesToScroll: <?php if ($cols != 'col-1') { echo '2'; } else { echo '1'; } ?>
										  }
										},
										{
										  breakpoint: 960,
										  settings: {
											slidesToShow: <?php if ($cols != 'col-1') { echo $slide; } else { echo '1'; } ?>,
											slidesToScroll: <?php if ($cols != 'col-1') { echo $slide; } else { echo '1'; } ?>
										  }
										},
									]
								});
							});
						</script>
					<?php } ?>
					
					
					<?php 
						if ($enlarge) {
							wp_enqueue_style( 'adb2-fancybox-css' );
							wp_enqueue_script( 'adb2-fancybox-js' );
							wp_enqueue_script( 'adb2-fancybox-init' );
						}
					?>
					
				</div>
			</section>
	
<?php } ?>