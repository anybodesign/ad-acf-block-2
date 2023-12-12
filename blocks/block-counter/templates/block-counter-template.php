<?php if ( !defined('ABSPATH') ) die();
	$anchor = '';
	if( !empty( $block['anchor'] ) ) {
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	}
	$className = 'acf-block--counter';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	$cols = get_field('columns');
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/counter-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); ?>" <?php echo $anchor; ?>>
				<div class="acf-block-container">
					
					<?php if( have_rows('counters') ): ?>
					
					<div class="acf-block-counter-container <?php echo $cols; ?>">
						<?php while( have_rows('counters') ): the_row(); 
								
							$num = get_sub_field('number');
							$sign = get_sub_field('sign');
							$inc = get_sub_field('increment');
							$legend = get_sub_field('legend');
						?>
						
						<div class="counter-item">
							<?php if ( $num ) { ?>
							<span class="counter-item--number">
								<span class="title-data numscroller" data-min="1" data-max="<?php echo $num; ?>" data-delay="5" data-increment="<?php echo $inc; ?>">
									<?php echo $num; ?>
								</span><?php if ($sign) { echo $sign; } ?>
							</span>
							<?php } ?>
							
							<?php if ( $legend ) { ?>
							<span class="counter-item--legend caption">
								<?php echo $legend; ?>
							</span>
							<?php } ?>
							
						</div>
						
						<?php endwhile; ?>
					</div>
					
					<?php endif; ?>
					
				</div>
			</section>
	
<?php } ?>