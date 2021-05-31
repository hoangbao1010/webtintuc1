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

// shortcode social single page
function myshortcode_social_single_page()
{
	ob_start(); ?>
	<div class="social_single_page">
		<?php global $post;
		$facebook = get_post_meta($post->ID, '_facebook', true);
		$twitter = get_post_meta($post->ID, '_twitter', true);
		$ggplus = get_post_meta($post->ID, '_ggplus', true);
		$pinterest = get_post_meta($post->ID, '_pinterest', true);
		?>
		<ul>
			<li><a href="<?php echo $facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="<?php echo $twitter ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li><a href="<?php echo $ggplus ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			<li><a href="<?php echo $pinterest ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
		</ul>
		<?php
		return ob_get_clean(); ?>
	</div>
<?php }
add_shortcode('social_single_page', 'myshortcode_social_single_page');

// shortcode canbiet sidebar homepage
function myshortcode_canbiet_sidebar(){ 
	ob_start();?>
	<div class="qb_canbiet_sidebar">
		<?php $title_hp = get_cat_name(10);?>
		<h2 class="title_home_page"><a href="<?php echo get_category_link(10); ?>" target="_blank"><?php echo $title_hp; ?></a></h2>
		<?php $canbiet_arg = array(
			'post_type' => 'post',
			'order' => 'ASC',
			'orderby' => 'date',
			'post_status' => 'publish',
			'cat' => 10,
			'posts_per_page' => 4
		);
		$hot_canbiet_query = new WP_Query($canbiet_arg);
		if($hot_canbiet_query->have_posts()) : ?>
			<ul>
				<?php while ($hot_canbiet_query->have_posts()) : $hot_canbiet_query->the_post(); ?>
					<li>
						<div class="wrap_figure">
							<?php 
							global $post;
							$canbiet_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
							<figure style="background: url('<?php echo $canbiet_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
						</div>
						<div class="text_widget">
							<h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
							<p><span class="qb_date_post"><?php the_time('j F, Y'); ?></span></p>
						</div>
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
	add_shortcode('sc_canbiet_sidebar','myshortcode_canbiet_sidebar');

		// shortcode baivietmoi sidebar singlepage
	function myshortcode_baivietmoi_sidebar(){ 
		ob_start();?>
		<div class="qb_canbiet_sidebar">
			<h2 ><span>Bài viết mới</span></h2>
			<?php $baivietmoi_arg = array(
				'post_type' => 'post',
				'order' => 'ASC',
				'orderby' => 'date',
				'post_status' => 'publish',
				'posts_per_page' => 5
			);
			$hot_baivietmoi_query = new WP_Query($baivietmoi_arg);
			if($hot_baivietmoi_query->have_posts()) : ?>
				<ul>
					<?php while ($hot_baivietmoi_query->have_posts()) : $hot_baivietmoi_query->the_post(); ?>
						<li>
							<div class="text_widget">
								<h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
							</div>
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
		add_shortcode('sc_baivietmoi_sidebar','myshortcode_baivietmoi_sidebar');

