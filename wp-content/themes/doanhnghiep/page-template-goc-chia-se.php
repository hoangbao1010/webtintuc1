<?php 
/* Template Name: page-template-goc-chia-se */
get_header();
?>
<div id="content">
	<div class="qb_content">
		<div id="breadcrumb">
			<h1><?php echo get_the_title(100); ?></h1>
			<?php echo the_breadcrumb(); ?>
		</div>
		<div class="container">
			<div id="share_page">
					<h3 class="title_page">Góc chia sẻ</h3>
					<div class="row">
						<div class="col-sm-8">
							<div class="qb_ct_left">
								<?php $share_arg = array(
									'post_type' => 'share',
									'order' => 'DESC',
									'orderby' => 'date',
									'post_status' => 'publish',
								);
								$wp_query = new WP_Query($share_arg);
								if($wp_query->have_posts()) :
									?>
									<ul class="list_share_post_general">
										<?php while($wp_query->have_posts()) : $wp_query->the_post() ?>
											<li class="list_share_post_detail">
												<?php $share_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
												<figure style="background: url('<?php echo $share_image[0]; ?>');"><a href=" <?php the_permalink(); ?>"></a></figure>
												<div class="info_post">
													<h4><?php the_title(); ?></h4>
													<div class="excerpt_ans">
														<?php the_content(); ?>
													</div>
													<div class="read_more_ans">
														<b></b>
													</div>
												</div>
											</li>
											<?php 
										endwhile;
										?>
									</ul>
									<?php 
										get_template_part('inc/frontend/pagination/pagination');
										wp_reset_postdata();
									else : echo 'No data'; 
									endif; ?>
								</div>
							</div>
							<div class="col-sm-4">
								<?php if(is_active_sidebar('sidebar')) : ?>
									<div class="qb_sidebar_right">
										<?php dynamic_sidebar('sidebar'); ?>
									</div>
								<?php else : echo 'No data';
							endif; ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
<?php 
get_footer();
?>