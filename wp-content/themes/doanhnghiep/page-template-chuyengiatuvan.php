<?php 
/* Template Name: page-template-chuyengiatuvan */
get_header();
?>

<div id="content">
	<div class="qb_content">
		<div id="breadcrumb">
						<h1><?php echo get_the_title(20); ?></h1>
			<?php echo the_breadcrumb(); ?>
		</div>
		<div class="container">
			<div id="consultants_page">
				<div class="banner">
					<?php if(have_posts()) : ?>
						<?php 
						while(have_posts()): the_post();
							the_content();
						endwhile;
						wp_reset_postdata();	
						?>
						<?php else: echo 'No data'; endif; ?>
					</div>
					<h3 class="title_page">Chuyên gia tư vấn</h3>
					<div class="row">
						<div class="col-sm-8">
							<div class="qb_ct_left">
								<?php 
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$consultants_arg = array(
									'post_type' => 'partners',
									'order' => 'DESC',
									'orderby' => 'date',
									'post_status' => 'publish',
									  'paged'          => $paged
								);
								$wp_query = new WP_Query($consultants_arg);
								if($wp_query->have_posts()) :
									?>
									<ul class="list_consultants_post_general">
										<?php $i=1; ?>
										<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
											<li class="list_consultants_post_detail">
												<div class="info_post">
													<h4><?php the_title(); ?></h4>
													<div class="date_question">
														<i> Ngày gửi: <?php echo the_date('d/m/Y'); ?></i>
														
													</div>
													<div class="excerpt_ans">
														<strong>Câu trả lời:</strong>
														<?php the_content(); ?>
													</div>
													<div class="read_more_ans">
														<b></b>
													</div>
												</div>
												<strong class="stt"><?php echo $i++; ?></strong>
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
		<?php get_footer(); ?>