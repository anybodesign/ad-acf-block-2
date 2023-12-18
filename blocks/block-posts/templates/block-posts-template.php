<?php if ( !defined('ABSPATH') ) die();

	$cols = get_field('columns');
	
	$mode = get_field('mode');
	$style = get_field('style');
	
	$content = get_field('posts_select');
	$h = get_field('title_level');
	$show = get_field('content_show');
	$metas = get_field('metas');
	$your_metas = get_field('your_metas');
	$your_tax = get_field('your_tax');
	
	$slider = get_field('slider');
	$mob = get_field('slider_mobile');

	$className = 'acf-block--posts';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	//global $id;
	$id = 'slider-' . $block['id'];						
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/posts-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>

			<section class="<?php echo esc_attr($className); ?>">
				<div class="acf-block-container">
					
					<?php if( ( $content && $mode != 'auto' ) || ( $mode == 'auto' ) ) : ?>
					<?php if( $slider ) { ?>
					<div class="acf-block-post-content--<?php echo $cols; echo ' style-'.$style; ?> acf-block-post-slider" id="<?php echo esc_attr($id); ?>">
					<?php } else { ?>
					<div class="acf-block-post-content--<?php echo $cols; echo ' style-'.$style; ?>">
					<?php } ?>
						
						<?php 
							// MANUAL 
							
							if( $content && $mode != 'auto' ) {
							foreach( $content as $c ) : 
								
								$cat = get_the_category($c->ID);
								$tax = get_the_terms($c->ID, $your_tax);
								$cpt = get_post_type($c->ID);
								
								include ADB2__PLUGIN_PATH . '/blocks/block-posts/templates/block-posts-content.php';
							endforeach;
							}
							
							// AUTO
							
							if( $mode == 'auto' ) {
								
								$num = get_field('auto_nb');
								$type = get_field('auto_type');
								
								if ($num) {
									$number = $num;
								} else {
									$number = '-1';
								}
								
								$args = array(
									'numberposts' 	=> $number,
									'post_type' 	=> $type,
									'order'			=> 'DESC'
								);
								$autocontent = get_posts($args);
								
								foreach ($autocontent as $c) :
									
									$cat = get_the_category($c->ID);
									$tax = get_the_terms($c->ID, $your_tax);
									$cpt = get_post_type($c->ID);
									
									include ADB2S__PLUGIN_PATH . '/blocks/block-posts/templates/block-posts-content.php';
									
								endforeach;
								wp_reset_postdata();
							}
						?>
						
					</div>
					<?php endif; ?>
					
				</div>
			</section>
			
			
			<?php 
				if ($slider && $mob) { 
				
				echo "
					<script>
						jQuery(document).ready(function($) {
						
							var slick_slider;
							var settings;
							
							slick_slider = $('#".$id."');
							settings = {
								speed: 1000,
						    	slidesToShow: 1,
								slidesToScroll: 1,
								arrows: true,
								dots: true,
								infinite: false,
								pauseOnHover: true,
								nextArrow: '<button type=\'button\' class=\'slick-next slick-arrow\' aria-label=\'".__('Next Pannel','adblocks2')."\'> › </button>',
								prevArrow: '<button type=\'button\' class=\'slick-prev slick-arrow\' aria-label=\'".__('Previous Pannel','adblocks2')."\'> ‹ </button>',
								mobileFirst: true,
								responsive: [
								    {
								      breakpoint: 480,
								      settings: {
								        slidesToShow: 2,
								        slidesToScroll: 2,
								      }
								    },
									{
								      breakpoint: 720,
								      settings: {
								        slidesToShow: 3,
								        slidesToScroll: 3,
								      }
								    },
								    {
								      breakpoint: 960,
								      settings: 'unslick'
								    }
								]
							};
							slick_slider.slick(settings);
							
							$(window).on('resize',function() {
								if ($(window).width() > 960) {
									if (slick_slider.hasClass('slick-initialized')) {
										slick_slider.slick('unslick');
										$('.acf-block-post-item').removeAttr('tabindex');
									}
									return;
								}
								if (!slick_slider.hasClass('slick-initialized')) {
									return slick_slider.slick(settings);
								}
								return;
							});
							
							$('.slick-slide, .slick-slide a').removeAttr('tabindex');
							
							$(window).on('load',function() {
								$('.slick-slide').removeAttr('tabindex');
							});
							
							$(window).on('resize',function() {
								if ($(window).width() > 720) {
									$('.slick-slide').removeAttr('tabindex');
								}
							});	
							
							$('.slick-dots li button').prepend('".__('Pannel','adblocks2')." ');
						});
					</script>
					";
				
				}
				else if ($slider && !$mob) {
				// RWD
				
				if ($cols == '1col') {
					$n_small = 1;
					$n_med = 1;
					$n_large = 1;
				}
				else if ($cols == '2cols') {
					$nb = 2;
					$n_small = 2;
					$n_med = 2;
					$n_large = 2;
				}
				else if ($cols == '3cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 3;
				}
				else if ($cols == '4cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 4;
				}
				else if ($cols == '5cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 5;
				}
				else if ($cols == '6cols') {
					$n_small = 2;
					$n_med = 3;
					$n_large = 6;
				}				
				echo "
					<script>
						jQuery(document).ready(function($) {
						
							var slick_slider;
							var settings;
							
							slick_slider = $('#".$id."');
							settings = {
								speed: 1000,
						    	slidesToShow: 1,
								slidesToScroll: 1,
								arrows: true,
								dots: true,
								infinite: false,
								pauseOnHover: true,
								nextArrow: '<button type=\'button\' class=\'slick-next slick-arrow\' aria-label=\'".__('Next Pannel','adblocks2')."\'> › </button>',
								prevArrow: '<button type=\'button\' class=\'slick-prev slick-arrow\' aria-label=\'".__('Previous Pannel','adblocks2')."\'> ‹ </button>',
								mobileFirst: true,
								responsive: [
								    {
								      breakpoint: 480,
								      settings: {
								        slidesToShow: ".$n_small.",
								        slidesToScroll: ".$n_small.",
								      }
								    },
									{
								      breakpoint: 720,
								      settings: {
								        slidesToShow: ".$n_med.",
								        slidesToScroll: ".$n_med.",
								      }
								    },
								    {
								      breakpoint: 960,
								      settings: {
								        slidesToShow: ".$n_large.",
								        slidesToScroll: ".$n_large.",
								      }
								    }
								]
							};
							slick_slider.slick(settings);
							
							$('.slick-slide, .slick-slide a').removeAttr('tabindex');
							
							
							$(window).on('load',function() {
								$('.slick-slide').removeAttr('tabindex');
							});
							
							$(window).on('resize',function() {
								if ($(window).width() > 720) {
									$('.slick-slide').removeAttr('tabindex');
								}
							});	
							
							$('.slick-dots li button').prepend('".__('Pannel','adblocks2')." ');
						});
					</script>
					";
			} ?>		
			
			<?php } ?>