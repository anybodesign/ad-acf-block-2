<?php if ( !defined('ABSPATH') ) die(); 
	
	$location = get_template_directory_uri(). '/img/';
	$location = str_replace("http://", "", $location);
	$location = str_replace("https://", "", $location);
	$location = str_replace($_SERVER['HTTP_HOST'], "", $location);
	$location = $_SERVER['DOCUMENT_ROOT'].$location;
	
	$path1 = $location. 'fallback.png';
	$path2 = $location. 'fallback.jpg';
	$fallback1 = get_template_directory_uri(). '/img/fallback.png';
	$fallback2 = get_template_directory_uri(). '/img/fallback.jpg';
	
	$featured = get_field('featured');
?>
						<div class="acf-block-post-item <?php echo $cpt.'-block'; ?>">
							
						<?php if ( !isset( $featured ) || $featured == true ) { ?>
					        <div class="acf-block-post-figure">
								
								<?php if ($cpt == 'attachment') :
									$src = wp_get_attachment_url( $c->ID );
									$meta = wp_get_attachment_metadata( $c->ID );
									$alt = $meta['alt'];
								?>
									
									<img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>">
								
								<?php elseif ($cpt != 'attachment') : ?>
								
									<?php if ( $show != 'content' ) { ?>
									<a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'adblocks2'); echo get_the_title( $c->ID ); ?>" rel="nofollow">
									<?php } ?>
									<?php 
										if ( has_post_thumbnail( $c->ID ) && $style != 'gallery' ) { 
											echo get_the_post_thumbnail( $c->ID, 'adblocks-medium-hd');
										}
										else if ( has_post_thumbnail( $c->ID ) && $style == 'gallery' ) {
											echo get_the_post_thumbnail( $c->ID, 'adblocks-thumbnail-hd');
										}
										else if ( ! has_post_thumbnail( $c->ID ) && file_exists( $path1 ) ) {
											echo '<img src="' . $fallback1. '" alt="">';  
										}
										else if ( ! has_post_thumbnail( $c->ID ) && file_exists( $path2 ) ) {
											echo '<img src="' . $fallback2. '" alt="">';  
										}
										else if ( ! has_post_thumbnail( $c->ID ) ) {
											echo '<img src="' . ADB2__PLUGIN_URL .'assets/fallback.jpg" alt="">'; 
										}
										
									?>
									<?php if ( $show != 'content' ) { ?>
									</a>
									<?php } ?>
									
								<?php endif; ?>
								
						    </div>	
						<?php } ?>
						    
				    		<div class="acf-block-post-content">
								<header class="acf-block-post-header">
									<<?php echo $h; ?> class="acf-block-post-title">
										<?php if ( $show != 'content' ) { ?>
										<a href="<?php echo get_permalink( $c->ID ); ?>">
										<?php } ?>
											<?php echo get_the_title( $c->ID ); ?>
										<?php if ( $show != 'content' ) { ?>
										</a>
										<?php } ?>
									</<?php echo $h; ?>>
									
									<?php if ( $metas ) { ?>
									<div class="acf-block-post-metas">
										<span class="meta-date">
											<span class="meta-date-text"><?php _e( 'Posted on&nbsp;', 'adblocks2' ); ?></span><span class="meta-date-time"><?php echo '<span class="day">'.get_the_time( ('j'), $c->ID ).'</span> '; echo '<span class="month">'.get_the_time( ('F'), $c->ID ).'</span> '; echo '<span class="year">'.get_the_time( ('Y'), $c->ID ).'</span>'; ?></span>
										</span>
										<?php if( $your_metas && in_array('author', $your_metas) ) { ?>
										<span class="meta-author">
											<span><?php _e( 'by&nbsp;', 'adblocks2' ); ?></span><span><?php echo get_the_author(); ?></span>
										</span>
										<?php } ?>
										<?php if( $your_tax && $cpt != 'post' ) { ?>
										<span class="meta-category">
											<span><?php _e( 'in&nbsp;', 'adblocks2' ); ?></span><?php 
												foreach ( $tax as $t ) { 
													echo '<span class="tax-'.$your_tax.'">'.__($t->name).'</span> '; 
												} ?>
										</span>
										<?php } else if( $your_metas && in_array('cat', $your_metas) && $cpt == 'post' ) { ?>
										<span class="meta-category">
											<span><?php _e( 'in&nbsp;', 'adblocks2' ); ?></span><span><?php echo '<a href="'.esc_url( get_category_link( $cat[0]->term_id) ).'">' . esc_html( $cat[0]->name) . '</a>'; ?></span>
										</span>
										<?php } ?>
									</div>
									<?php } ?>									
								</header>
								
								<?php if ( $style != 'gallery' || $show != 'none' ) { ?>
								<div class="acf-block-post-excerpt">
									<?php 
										if ($show == 'excerpt') {
											
											$my_excerpt = $c->post_excerpt;
											$manual_excerpt = get_the_excerpt( $c->ID );
											$permalink = get_permalink( $c->ID );
											$title = get_the_title( $c->ID );
											
											if ( $my_excerpt != '' ) {												
										        echo '<p>'.$manual_excerpt.' <a class="read-more" href="'.$permalink.'" rel="nofollow">'.esc_html__('Read more', 'adblocks2').' <span class="a11y-hidden"> '.esc_html__('of ', 'adblocks2').$title.'</span></a></p>';
										    } else {
												echo adblocks2_get_excerpt(125, $c->ID);
											}											
										}
										
										if ($show == 'content' ) {
											echo $c->post_content; 
										}	
									?>
								</div>
								<?php } ?>
									
							</div>
					        
				        </div>