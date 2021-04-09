<?php 
get_header(); 
?>	
<div id="content">
	<div class="qb_content">
		<div class="container">
			<div id="search_page">
				<h2 class="title_search">Kết quả tìm kiếm : <strong><?php the_search_query(); ?></strong></h2>
				<?php 
				$search_resuilt_arg = array(
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$search_resuilt_query = new WP_Query($search_resuilt_arg);
				if($search_resuilt_query->have_posts()) : ?>
					<ul class="list_search_resuilt_general">
						<?php while($search_resuilt_query->have_posts()) : $search_resuilt_query->the_post(); ?>
							<li class="list_search_resuilt_detaild">
								<?php $search_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
								<figure style="background:url('<?php echo $search_image[0]; ?>')"><a href="<?php the_permalink(); ?>"></a></figure>
								<div class="info_post">
									<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
									<div class="excerpt">
										<?php echo excerpt(50); ?>  
									</div>
									<a class="read_more" href="<?php the_permalink(); ?>">Xem thêm</a>
								</div> 
							</li>
						<?php endwhile;
						get_template_part('inc/frontend/pagination/pagination');
						wp_reset_postdata(); ?>
					</ul>
				<?php else : echo 'No data';
			endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
