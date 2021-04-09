<?php 
/*
Template Name: page-template-diemban
*/
get_header(); 
?>	
<div id="content">
	<div class="qb_content">
		<div id="breadcrumb">
			<?php echo the_breadcrumb(); ?>
		</div>
		<div id="sale_point_page">
			<div class="qb_tutorial">
				<div class="container">
					<?php if(have_posts()) : 
						while(have_posts()) : the_post();
							the_content();
						endwhile;
						wp_reset_postdata();
						else : echo 'No data';
						endif;
						?>		
					</div>
				</div>
				<div class="qb_sale_point">
					<div class="container">
						<div class="title_step4">
							<h4><span>Cách 4 : Chọn địa điểm gần nhất</span></h4>	
						</div>
						<div class="sale_point_ct">
							<?php 
							$arg = array(
								'taxonomy' => 'categories_sale_point',
								'parent' => 0
							);
							$parent  = get_categories($arg);
							foreach ($parent as $post_type) {
								$post_type_arg = array(
									'post_type' => 'sale_point',
									'showposts' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'categories_sale_point',
											'terms'     => array($post_type->slug),
											'field'     => 'slug'
										)
									)
								); 
								$post_type_query = new WP_Query($post_type_arg);
								?>
									<div class="info_sale_point">
										<h2 class="title_sale_point"><?php echo $post_type->name;  ?></h2>
										<ul>
											<?php while($post_type_query->have_posts()) : $post_type_query->the_post() ?>
												<li>
													<div class="post_title">
														<h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
													</div>
												</li>
											<?php endwhile; ?>
										</ul>
									</div>
								<?php  } 
								wp_reset_postdata();
								?>
							</div>					
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php get_footer(); ?>