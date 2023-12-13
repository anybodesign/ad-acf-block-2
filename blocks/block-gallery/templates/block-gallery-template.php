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
	$images = get_field('pictures');
	$size = get_field('size');
	$enlarge = get_field('enlarge');
	$inside = get_field('inside');
	
	$i = rand();
?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/gallery-preview.png" alt="" class="adblock-preview">
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); ?>" <?php echo $anchor; ?>>
				<div class="acf-block-container">
					
					<?php if( $images ): ?>
					<div class="acf-gallery-container<?php echo ' is-'.$cols; if ($enlarge) { echo ' is-fancy'; } if ($inside) { echo ' is-caption-hidden'; } ?>">
						
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
							<a href="<?php echo esc_url( $image['url'] ); ?>" title="<?php esc_attr_e('Enlarge picture', 'adblocks'); ?>" data-fancybox="gallery-<?php echo $i; ?>">
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
						if ($enlarge) {
							wp_enqueue_style( 'adb2-fancybox-css' );
							wp_enqueue_script( 'adb2-fancybox-js' );
							wp_enqueue_script( 'adb2-fancybox-init' );
						}
						/*
						<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $placeholder ) ); ?>" />
						*/ 
					?>
					
				</div>
			</section>
	
<?php } ?>