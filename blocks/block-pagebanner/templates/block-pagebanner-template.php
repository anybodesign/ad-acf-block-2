<?php if ( !defined('ABSPATH') ) die();

	$type = get_field('bg_type');
	
	$bg = get_field('bg_img');
	$video = get_field('bg_video');
	$poster = get_field('poster');
	$loop = get_field('loop');
	$mute = get_field('muted');
	$auto = get_field('autoplay');
	
	$slideshow = get_field('slideshow');
	$s_speed = get_field('slideshow_speed');
	$s_autospeed = get_field('slideshow_autospeed');
	$s_loop = get_field('slideshow_loop');
	if ($s_loop == false) {
		$infinite = 'false';
	} else {
		$infinite = 'true';
	}

	$scroll = get_field('scroll');
	$scroll_btn = get_field('scroll_btn');
	$scroll_show = get_field('scroll_show');
	$scroll_label = get_field('scroll_label');
	
	if ( $type == 'video' ) {
		$the_type = ' has-video';
	} elseif ( $type == 'slideshow' ) {
		$the_type = ' has-slideshow';
	} else {
		$the_type = ' has-picture';
	}
	
	if ($scroll_btn) {
		$btn = '<img src="'.$scroll_btn.'" alt="">';
	} else {
		$btn = '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="29" viewBox="0 0 26 29"><path fill="#333" fill-rule="evenodd" d="M39.609375,31.3116023 L31.875,39.0459773 L31.875,19.1826923 C31.875,18.6748748 31.6894575,18.2354273 31.3183575,17.8643348 C30.947265,17.4932348 30.5078175,17.3076923 30,17.3076923 C29.4921825,17.3076923 29.052735,17.4932348 28.6816425,17.8643348 C28.3105425,18.2354273 28.125,18.6748748 28.125,19.1826923 L28.125,39.0459773 L20.390625,31.3116023 C20.0390625,30.9209723 19.599615,30.7256573 19.0722675,30.7256573 C18.54492,30.7256573 18.1054725,30.9209723 17.75391,31.3116023 C17.36328,31.6631648 17.167965,32.1026123 17.167965,32.6299598 C17.167965,33.1573073 17.36328,33.5967548 17.75391,33.9483173 L28.359375,44.5537823 C28.59375,44.7881648 28.85742,44.9444123 29.1503925,45.0225323 C29.4433575,45.1006598 29.7265575,45.1006598 30,45.0225323 C30.2734425,45.1006598 30.5566425,45.1006598 30.8496075,45.0225323 C31.14258,44.9444123 31.40625,44.7881648 31.640625,44.5537823 L42.24609,33.9483173 C42.63672,33.5967548 42.832035,33.1573073 42.832035,32.6299598 C42.832035,32.1026123 42.63672,31.6631648 42.24609,31.3116023 C41.8945275,30.9209723 41.45508,30.7256573 40.9277325,30.7256573 C40.400385,30.7256573 39.9609375,30.9209723 39.609375,31.3116023 Z" transform="translate(-17 -17)"/></svg>';
	}
	
	$anchor = '';
	if( !empty( $block['anchor'] ) ) {
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	}
	$className = 'acf-block--pagebanner';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	$placeholder = array(
		array( 'core/paragraph', array(
			'placeholder' => __('Add some text here', 'adblocks2'),
		)),
	);	
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/pagebanner-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); echo esc_attr($the_type); ?>" <?php echo $anchor; ?>>
				<div class="acf-block-container">
					
					<?php if ( $type == 'video' && $video ) { ?>
					<video id="banner_video" class="banner-video"<?php if ( $loop ) { echo ' loop'; } if ( $mute ) { echo ' muted'; } if ( $auto ) { echo ' autoplay'; } if ( $poster ) { echo ' poster="'.$poster.'"'; } ?>>
						<source type="video/mp4" src="<?php echo $video; ?>">
					</video>
					<button id="banner_stop"<?php if ( ! $auto ) { echo ' style="display:none"'; } ?>>
						<img src="<?php echo ADB2__PLUGIN_URL .'/blocks/block-pagebanner/assets/stop.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Stop video playback', 'adblocks2'); ?>">
					</button>
					<button id="banner_play"<?php if ( ! $auto ) { echo ' style="display:block"'; } ?>>
						<img src="<?php echo ADB2__PLUGIN_URL .'/blocks/block-pagebanner/assets/play.svg'; ?>" class="banner-btn" alt="<?php esc_html_e('Play video', 'adblocks2'); ?>">
					</button>
					
					<?php } else if ( $type == 'slideshow' && $slideshow ) { ?>
					
					<div class="banner-slideshow">
				    <?php foreach( $slideshow as $slide ): ?>
			            <div class="slick-item">
							<img src="<?php echo esc_url($slide['sizes']['adblocks-large-hd']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
			            </div>
			        <?php endforeach; ?>				
					</div>
					<?php if (!is_admin()) { ?>
					<script>
						jQuery(document).ready(function($) {
							var item_length = $('.banner-slideshow > div').length - 1;
							var slideshow = $('.banner-slideshow').slick({
								autoplay: true,
								speed: <?php echo $s_speed; ?>,
								autoplaySpeed: <?php echo $s_autospeed; ?>,
								infinite: <?php echo $infinite; ?>,
						    	slidesToShow: 1,
								slidesToScroll: 1,
								fade: true,
								arrows: false,
								dots: false,
								draggable: false,
								swipe: false,
								touchMove: false
						    });
							<?php if ($s_loop == false) { ?>
							// On before slide change
							slideshow.on('afterChange', function(event, slick, currentSlide, nextSlide){
							  if( item_length === slideshow.slick('slickCurrentSlide') ){
							    slideshow.slickPause();
							    //slideshow.slickSetOption("autoplay",false,false)
							  };
							});
							<?php } ?>
						});
					</script>
					<?php } ?>
					
					<?php } else { 
						echo '<img src="'.$bg.'" class="banner-bg" alt="">';	
					} ?>
					
					
					<div class="acf-block-banner-text">
						<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $placeholder ) ); ?>" />
						
						<?php if ($scroll) { ?>
						<button class="scroll-down">
							<?php echo $btn; ?>
							<?php if (!$scroll_show) { ?><span class="a11y-hidden"><?php } ?>
								<?php 
									if ($scroll_label) {
										echo esc_html($scroll_label);
									} else {
										esc_html_e('Scroll Down','adblocks2');
									}
								?>
							<?php if (!$scroll_show) { ?></span><?php } ?>
						</button>
						<?php } ?>						
					</div>
					
				</div>
			</section>
			
			<?php if ($scroll) { ?>
			<div id="banner_after"></div>
			<?php } ?>
				
			<?php } ?>