<?php 
get_header();
setPostViews(get_the_ID());
?>
<div id="content">
	<div class="qb_content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<?php if(!is_singular('sale_point')) { ?>
						<div class="qb_ct_left">
							<div class="info_single_post">
								<h2 class="title_single_post"><?php the_title(); ?></h2>
								<div class="content_single_post">
									<?php 
									while(have_posts()) : the_post();
										the_content();
									endwhile;		
									?>
								</div>
							</div>
							<?php echo do_shortcode('[shortcode_related_post]'); ?>
						</div>
						<?php 
					} else { ?>
						<?php if(have_posts()) : 
							while(have_posts()) : the_post();
								the_content();
							endwhile;
							wp_reset_postdata();
							else : echo 'No data'; endif;
							?>
						<?php } ?>
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
<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = gmdate('m/d/Y h:i:s T', time());
echo $date;
?>
				</div>
			</div>
		</div>

		<?php 
		get_footer();
		?>