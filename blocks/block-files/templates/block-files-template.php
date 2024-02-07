<?php if ( !defined('ABSPATH') ) die();

	$anchor = '';
	if( !empty( $block['anchor'] ) ) {
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	}
	$className = 'acf-block--files';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
	}
	
	$icons = get_field('files_icons');
	$custom = get_field('custom_icons');
	

?>

			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
			    <img src="<?php echo ADB2__PLUGIN_URL; ?>assets/previews/files-preview.png" alt="" class="adblock-preview">
				
			<?php } else { ?>			
			
			<section class="<?php echo esc_attr($className); ?>" <?php echo esc_attr($anchor); ?>>
				<div class="acf-block-container">
				
					<?php if( have_rows('add_files') ): ?>
					<ul class="acf-block-file-items<?php if ($icons != false) { echo ' has-icons'; } ?>">
						
				        <?php while( have_rows('add_files') ): the_row();
							
							$file = get_sub_field('file');   
							
							$title = $file['title'];
							$url = $file['url'];
							$type = $file['subtype'];
							$icon = $file['icon'];
							$desc = $file['description'];
							
							$customtitle = get_sub_field('title');
							
							$filesize = $file['filesize'];
							$size_mo = $filesize / 1000000;
							$size = number_format($size_mo, 2); 
							
							//echo var_dump($file);
				        ?>
				        <li class="file-item">					        
							<a href="<?php echo esc_url($url); ?>" title="<?php esc_attr_e('Download '.$title.'', 'adblocks2'); ?>" download="<?php echo esc_attr($title); ?>">
								<?php if ($icons != false || $custom == true) { ?>
								<div class="file-icon">
									<?php if ($custom != true) { ?>
									<img class="file-item-icon" src="<?php echo esc_url($icon); ?>" alt="">
									<?php } else { ?>
										<?php if ($type == 'mpeg') { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/audio.svg" alt="">
										<?php } else if ($type == 'jpeg' || $type == 'png' ) { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/picture.svg" alt="">
										<?php } else if ($type == 'mp4') { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/video.svg" alt="">
										<?php } else if ($type == 'pdf' || $type == 'msword') { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/text.svg" alt="">
										<?php } else if ($type == 'zip') { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/archive.svg" alt="">
										<?php } else { ?>
										<img class="file-item-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/files/blank.svg" alt="">
										<?php } ?>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="file-infos">
									<span class="file-item-name">
										<?php if ( $customtitle ) { echo esc_html($customtitle); } else { echo esc_html($title); } ?>
									</span>&nbsp;
									<span class="file-item-type-size">
										(<span class="file-item-type"><?php echo esc_html($type); ?></span>
										&nbsp;–&nbsp;
										<span class="file-item-size"><?php echo esc_html($size); ?> Mb</span>)
									</span>
									&nbsp;
									<?php if ($desc) { ?>
									<span class="file-item-desc"><?php echo esc_html($desc); ?></span>
									<?php } ?>
								</div>									
							</a>
				        </li>
				        
				        <?php endwhile; ?>
				        
					</ul>
					<?php endif; ?>

				
				</div>
			</section>
			
			<?php } ?>