<?php 
/* Template Name: page-template-sanpham */
get_header();
?>

<div id="content">
	<div class="qb_content">
		<div id="breadcrumb">
			<?php echo the_breadcrumb(); ?>
		</div>
		<div class="container">
			<div id="product_page">
				<?php  
				$pro_arg = array(
					'post_type' => 'product',
					'orderby' => 'date',
					'posts_per_page' => 3
				);
				$pro_query = new WP_Query($pro_arg);
				if($pro_query->have_posts()) : ?>
									<pre><?php print_r($pro_query); ?></pre>
					<ul>
						<?php while($pro_query->have_posts()) : $pro_query->the_post(); ?>
							<li>
								<div class="row">
									<div class="col-sm-6">
										<div class="wrap_figure">
											<?php $pro_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
											<figure style="background: url('<?php echo $pro_image[0]; ?>');"><a href="<?php the_permalink(); ?>"></a></figure>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="productduct_meta">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="info_pro">
												<?php the_content(); ?>
											</div>
										</div>
										<div class="read_buy">
											<?php global $post; ?>
											<a href="<?php the_permalink(); ?>" target="_blank">Xem thêm</a>
											<a href="<?php echo get_site_url(); ?>/gio-hang/?add-to-cart=<?php echo $pro_query->post->ID;?>" target="_blank" >Mua ngay</a>
										</div>
									</div>
								</div>
							</li>
							<?php 
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
					<?php else : echo 'No data'; 
					endif; ?>
				</div>
			</div>

		</div>
	</div>
	<?php get_footer(); ?>