<?php if ( !defined('ABSPATH') ) die(); ?>

			<div class="acf-carousel-post-item <?php echo $cpt.'-block'; ?>">
				<div class="acf-block-post-figure">
					<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php _e('Read ', 'adblocks2'); echo get_the_title( $p->ID ); ?>" rel="nofollow">
					<?php 
						if ( has_post_thumbnail( $p->ID ) ) { 
							echo get_the_post_thumbnail( $p->ID, 'adblocks-medium-hd');
						}
						else {
							echo '<img src="' . ADB2__PLUGIN_URL .'assets/fallback.jpg" alt="">'; 
						}
					?>
					</a>
				</div>
				
				<div class="acf-block-post-content">
					
					<header class="acf-block-post-header">
						
						<p class="acf-block-post-title">
							<a href="<?php echo get_permalink( $p->ID ); ?>">
								<?php echo get_the_title( $p->ID ); ?>
							</a>
						</p>
						
					</header>
					
					<div class="acf-block-post-excerpt">
						<?php
							$my_excerpt = $p->post_excerpt; 
							$manual_excerpt = get_the_excerpt( $p->ID );
							$permalink = get_permalink( $p->ID );
							$title = get_the_title( $p->ID );
							
							if ( $my_excerpt != '' ) {												
								echo '<p>'.$manual_excerpt.' <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks2').' <span class="a11y-hidden"> '.esc_html__('of ', 'adblocks2').$title.'</span></a></p>';
							} else {
								echo adblocks2_get_excerpt(125, $p->ID);
							}			
						?>
					</div>
				</div>
				
			</div>