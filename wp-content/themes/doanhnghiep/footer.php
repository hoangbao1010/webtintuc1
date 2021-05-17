	<footer>
		<div class="footer">
			<?php
			$args = array(
				'post_type' => 'page',
                'page_id' => 176 //list of page_ids
      );
			$ft_page_query = new WP_Query( $args );
			if(have_posts() ) :
        //print any general title or any header here//
				while( $ft_page_query->have_posts() ) : $ft_page_query->the_post();
				 the_content();
				endwhile;
				wp_reset_postdata();
			else:
        //optional text here is no pages found//
			endif;
			?>
		</div>
		<div class="scroll_top ">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</div>
	</footer>
	<?php wp_footer(); ?>

	<!-- END  MESSENGER -->
	<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
</body>
</html>
