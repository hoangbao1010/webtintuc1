<?php 
// shortcode social footer
function myshortcode_footer()
{
	ob_start();
	if (get_option('footer_fb') || get_option('footer_google') || get_option('footer_twitter') || get_option('footer_pinterest'))
	{
		?>
		<ul>
			
			<?php if (get_option('footer_fb'))
			{ ?>
				<li><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<?php
			} ?>
			<?php if (get_option('footer_google'))
			{ ?>
				<li><a href="<?php echo get_option('footer_google'); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<?php
			} ?>
			<?php if (get_option('footer_pinterest'))
			{ ?>
				<li><a href="<?php echo get_option('footer_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
				<?php
			} ?>
			<?php if (get_option('footer_twitter'))
			{ ?>
				<li><a href="<?php echo get_option('footer_twitter'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<?php
			} ?>
		</ul>
		<?php
	}
	return ob_get_clean();
}
add_shortcode('social_footer', 'myshortcode_footer');

// shortcode cptpp sidebar homepage
function myshortcode_cptpp_sidebar(){ 
	ob_start();?>
	<div class="qb_cptpp_sidebar qb_post_hp">
		<?php $title_hp = get_cat_name(75);?>
		<h2 class="title_home_page"><a href="<?php echo get_category_link(75); ?>" target="_blank"><?php echo $title_hp; ?></a></h2>
		<?php $cptpp_arg = array(
			'post_type' => 'post',
			'order' => 'ASC',
			'orderby' => 'date',
			'post_status' => 'publish',
			'cat' => 75,
			'posts_per_page' => 3
		);
		$hot_cptpp_query = new WP_Query($cptpp_arg);
		if($hot_cptpp_query->have_posts()) : ?>
			<ul>
				<?php while ($hot_cptpp_query->have_posts()) : $hot_cptpp_query->the_post(); ?>
					<li>
						<?php 
						global $post;
						$cptpp_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
						<a href="<?php the_permalink(); ?>" target="_blank">
							<figure style="background: url('<?php echo $cptpp_image[0]; ?>');"></figure>
							<h4><?php the_title(); ?></h4>
						</a>
					</li>
				<?php endwhile; 
				wp_reset_postdata();
				?>
			</ul>
			<?php else : echo 'No data'; 
			endif; ?>

		</div>
		<?php 
		return ob_get_clean();
	}
	add_shortcode('sc_cptpp_sidebar','myshortcode_cptpp_sidebar');

	// shortcode sk sidebar homepage
	function myshortcode_sk_sidebar(){ 
		ob_start();?>
		<div class="qb_sk_sidebar container">
			<?php $title_hp = get_cat_name(2);?>
			<h2 class="title_home_page"><a href="<?php echo get_category_link(2); ?>" target="_blank">Sự kiện</a></h2>
			<?php $sk_arg = array(
				'post_type' => 'post',
				'order' => 'ASC',
				'orderby' => 'date',
				'post_status' => 'publish',
				'cat' => 2,
				'posts_per_page' => 4
			);
			$hot_sk_query = new WP_Query($sk_arg);
			if($hot_sk_query->have_posts()) : ?>
				<ul>
					<?php while ($hot_sk_query->have_posts()) : $hot_sk_query->the_post(); ?>
						<li>
							<?php 
							global $post;
							$sk_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
							<a href="<?php the_permalink(); ?>" target="_blank">
								<figure style="background: url('<?php echo $sk_image[0]; ?>');"></figure>
								<h4><?php the_title(); ?></h4>
							</a>
						</li>
					<?php endwhile; 
					wp_reset_postdata();
					?>
				</ul>
				<?php else : echo 'No data'; 
				endif; ?>

			</div>
			<?php 
			return ob_get_clean();
		}
		add_shortcode('sc_sk_sidebar','myshortcode_sk_sidebar');

	// shortcode featured post sidebar homepage
		function myshortcode_featured_checkbox(){ 
			ob_start();?>
			<div class="td_dn_sidebar">
				<div class="list_title">
					<ul>
						<li data-tab="tab-1" class="current">Tiêu điểm</li>
						<li data-tab="tab-2">Đọc nhiều</li>
					</ul>
				</div>
				<div class="list_by_category">
					<div id="tab-1" class="list_post tab-content current">
						<?php  $ft_args = array(
							'order' => 'ASC',
							'posts_per_page' => 10,
							'meta_key' => 'featured-checkbox',
							'meta_value' => 'yes'
						);
						$ft_query = new WP_Query($ft_args);
						if($ft_query->have_posts()) : ?>
							<ul>
								<?php while ($ft_query->have_posts()) : $ft_query->the_post(); ?>
									<li>
										<?php 
										global $post;
										$sk_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
										<a href="<?php the_permalink(); ?>" target="_blank">
											<figure style="background: url('<?php echo $sk_image[0]; ?>');"></figure>
											<h4><?php the_title(); ?></h4>
										</a>
									</li>
								<?php endwhile; 
								wp_reset_postdata();
								?>
							</ul>
							<?php else : echo 'No data'; 
							endif; ?>
						</div>
						<div id="tab-2" class="list_post tab-content">
							<?php  $ft_args = array(
								'order' => 'ASC',
								'posts_per_page' => 10,
								'offset' => 10,
								'meta_key' => 'featured-checkbox',
								'meta_value' => 'yes'
							);
							$ft_query = new WP_Query($ft_args);
							if($ft_query->have_posts()) : ?>
								<ul>
									<?php while ($ft_query->have_posts()) : $ft_query->the_post(); ?>
										<li>
											<?php 
											global $post;
											$sk_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<figure style="background: url('<?php echo $sk_image[0]; ?>');"></figure>
												<h4><?php the_title(); ?></h4>
											</a>
										</li>
									<?php endwhile; 
									wp_reset_postdata();
									?>
								</ul>
								<?php else : echo 'No data'; 
								endif; ?>
							</div>
						</div>
					</div>
					<?php 
					return ob_get_clean();
				}
				add_shortcode('sc_ft_check','myshortcode_featured_checkbox');

	// shortcode featured post sidebar homepage
				function myshortcode_featured_checkbox_archive(){ 
					ob_start();?>
					<div class="qb_ft_archive qb_post_hp">
						<h2 class="title_home_page"><span>Tin tiêu điểm</span></h2>
						<div class="list_by_category">
							<div id="tab-1" class="list_post tab-content current">
								<?php  $ft_args = array(
									'order' => 'ASC',
									'posts_per_page' => 5,
									'meta_key' => 'featured-checkbox',
									'meta_value' => 'yes'
								);
								$ft_query = new WP_Query($ft_args);
								if($ft_query->have_posts()) : ?>
									<ul>
										<?php while ($ft_query->have_posts()) : $ft_query->the_post(); ?>
											<li>
												<?php 
												global $post;
												$sk_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
												<figure style="background: url('<?php echo $sk_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
												<div class="info_post">
													<h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
													<span class="time_post"><?php the_time('d/m/Y H:i'); ?></span>
												</div>
											</li>
										<?php endwhile; 
										wp_reset_postdata();
										?>
									</ul>
									<?php else : echo 'No data'; 
									endif; ?>
								</div>
								<div id="tab-2" class="list_post tab-content">
									<?php  $ft_args = array(
										'order' => 'ASC',
										'posts_per_page' => 10,
										'offset' => 10,
										'meta_key' => 'featured-checkbox',
										'meta_value' => 'yes'
									);
									$ft_query = new WP_Query($ft_args);
									if($ft_query->have_posts()) : ?>
										<ul>
											<?php while ($ft_query->have_posts()) : $ft_query->the_post(); ?>
												<li>
													<?php 
													global $post;
													$sk_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
													<a href="<?php the_permalink(); ?>" target="_blank">
														<figure style="background: url('<?php echo $sk_image[0]; ?>');"></figure>
														<h4><?php the_title(); ?></h4>
													</a>
												</li>
											<?php endwhile; 
											wp_reset_postdata();
											?>
										</ul>
										<?php else : echo 'No data'; 
										endif; ?>
									</div>
								</div>
							</div>
							<?php 
							return ob_get_clean();
						}
						add_shortcode('sc_ft_check_archive','myshortcode_featured_checkbox_archive');
