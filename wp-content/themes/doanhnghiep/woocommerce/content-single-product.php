<div id="content">
	<div class="qb_content">
		<div id="content_single_pro">
			<div class="main_information">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="wrap_figure">
								<?php $pro_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
								<img src="<?php echo $pro_image[0]; ?>">
							</div>
							<div class="slider_pro">
								<?php
								global $product;
								$gallery_pro = $product->get_gallery_image_ids();
								?>
								<ul class="owl-carousel">
									<?php foreach ($gallery_pro as $gallery_product ) { ?>
										<li>
											<?php  $Original_image_url = wp_get_attachment_url( $gallery_product );
											echo wp_get_attachment_image($gallery_product, 'full');?>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="info_product">
								<h2><?php the_title(); ?></h2>
								<div class="short_description">
									<?php 
									global $product;
									$description_pro = $product->get_short_description(); 
									echo $description_pro;
									?>
								</div>
								<div class="product_price">
									<?php 
									$regular_price_ex =  $product->get_regular_price();
									$sale_price_ex =     $product->get_sale_price();
									?>
									<?php if($sale_price_ex !== ''){ ?> 
										<p class="old_price_sg has_sale_pr"><label>Giá bán:</label> <?php echo number_format($sale_price_ex,'0','','.'); ?><sup>đ</sup> 
											<em><strong><?php echo number_format($regular_price_ex,'0','','.'); ?></strong><sup>đ</sup></em></p> 
										<?php }else {?>
											<p class="old_price_sg"><label>Giá bán:</label> <?php echo number_format($regular_price_ex,'0','','.'); ?><sup>đ</sup></p> 
										<?php }?>
									</div>
									<div class="btn_checkout">
										<?php $id = $product->get_id(); ?>
										<a href="<?php echo get_site_url(); ?>/gio-hang/?add-to-cart=<?php echo $id; ?>">Mua ngay</a>
										<a href="<?php echo get_site_url(); ?>/diem-ban">Điểm bán</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
				if ( ! empty( $product_tabs ) ) : ?>
					<div class="woocommerce-tabs wc-tabs-wrapper">
						<div class="container">
							<div class="other_infomation">
								<ul class="tabs wc-tabs" role="tablist">
									<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
										<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
											<a href="#tab-<?php echo esc_attr( $key ); ?>">
												<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php foreach ( $product_tabs as $key => $product_tab ) : ?>

								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
									<?php
									if ( isset( $product_tab['callback'] ) ) {
										call_user_func( $product_tab['callback'], $key, $product_tab );
									}
									?>
								</div>
							<?php endforeach; ?>
							<?php do_action( 'woocommerce_product_after_tabs' ); ?>	
						</div>
					</div>
				<?php endif; ?>
				<div class="related_post_product">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="related_post">
									<h2>Bài viết liên quan</h2>
									<div class="qb_related_post">
										<?php
										global $post;
										$related_arg = array(
											'posts_per_page' => 2,
											'orderby' => 'date',
											'order' => 'ASC',
											'post_status' => 'publish'
										);
										$related_query = new WP_Query($related_arg);
										?> 
										<ul class="row list_post_related_general">
											<?php 
											while($related_query->have_posts()) : $related_query->the_post(); ?>
												<li class="col-sm-6 list_post_related_detail">
													<?php 

													$related_image = wp_get_attachment_image_src(get_post_thumbnail_ID($post->ID) , $size= 'large'); ?>
													<div class="wrap_figure" >
														<figure style="background:url('<?php echo $related_image[0]; ?>');"><a href="<?php  the_permalink(); ?>"></a></figure>
													</div>
													<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
												</li>
											<?php endwhile; 
											wp_reset_postdata();
											?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="related_product">
									<h2>Sản phẩm liên quan</h2>
									<div class="related_product_ct">
										<?php 
										global $product;
										$product_id = $product->get_id();
										$related_pro_arg = array(
											'post_type' => 'product',
											'post_status' => 'publish',
											'posts_per_page' => -2,
											'post__not_in' => array( $product_id ),
										);
										$related_pro_query = new WP_Query($related_pro_arg);
										if($related_pro_query->have_posts()) :
											?>
											<ul class="row list_related_product_general">
												<?php while($related_pro_query->have_posts()) : $related_pro_query->the_post(); ?>
													<li class="col-sm-6 list_related_product_detaild">
														<?php $related_pro_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
														<figure style="background: url('<?php echo $related_pro_image[0] ?>');"><a href="<?php the_permalink(); ?>"></a></figure>
														<div class="related_pro_info">
															<?php echo the_title(); ?>
														</div>
													</li>
												<?php endwhile; 
												wp_reset_postdata(); ?>
											</ul>
											<?php else : echo 'No data'; 
											endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>