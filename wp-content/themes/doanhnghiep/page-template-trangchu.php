<?php 
   /* Template Name: page-template-trangchu */
   get_header();
   
   ?>
<div id="content">
   <div class="qb_content">
      <div class="container">
         <div class="qb_home_page">
            <div class="qb_hot_new_header">
               <?php 
                  $cat_hot_new = get_cat_name(34);?>
               <h2 class="hot_new_tit"><?php echo $cat_hot_new; ?></h2>
               <?php $hot_arg = array(
                  'post_type' => 'post',
                  'order' => 'ASC',
                  'orderby' => 'date',
                  'post_status' => 'publish',
                  'cat' => 34,
                  'posts_per_page' => 3
                  );
                  $hot_query = new WP_Query($hot_arg);
                  ?>
               <?php if($hot_query->have_posts()) : ?>
               <ul class="owl-carousel">
                  <?php global $post; ?>
                  <?php while ($hot_query->have_posts()) : $hot_query->the_post(); ?>
                  <li>
                     <h4><a href="<?php the_permalink();?>" target="_blank"><?php the_title(); ?></a></h4>
                  </li>
                  <?php endwhile; 
                     wp_reset_postdata();
                     ?>
               </ul>
               <?php else : echo 'No data'; ?>
               <?php endif; ?>
            </div>
            <div class="qb_big_post">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="qb_big_post_left ">
                        <?php $big_post_left_arg = array(
                           'post_type' => 'post',
                           'order' => 'ASC',
                           'orderby' => 'date',
                           'post_status' => 'publish',
                           'posts_per_page' => 2
                           );
                           $big_hot_left_query = new WP_Query($big_post_left_arg);
                           if($big_hot_left_query->have_posts()) : ?>
                        <ul class="owl-carousel">
                           <?php while ($big_hot_left_query->have_posts()) : $big_hot_left_query->the_post(); ?>
                           <li>
                              <div class="wrap_figure">
                                 <?php 
                                    global $post;
                                    $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                 <figure style="background: url('<?php echo $nb_image[0]; ?>');"></figure>
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
                  </div>
                  <div class="col-sm-6">
                     <div class="qb_big_post_right ">
                        <?php $big_post_right_arg = array(
                           'post_type' => 'post',
                           'order' => 'ASC',
                           'orderby' => 'date',
                           'post_status' => 'publish',
                           'posts_per_page' => 4,
                           'offset' => 2
                           );
                           $big_hot_right_query = new WP_Query($big_post_right_arg);
                           if($big_hot_right_query->have_posts()) : ?>
                        <ul class="row">
                           <?php while ($big_hot_right_query->have_posts()) : $big_hot_right_query->the_post(); ?>
                           <li class="col-sm-6">
                              <div class="wrap_figure">
                                 <?php 
                                    global $post;
                                    $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                 <figure style="background: url('<?php echo $nb_image[0]; ?>');"></figure>
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
                  </div>
               </div>
            </div>
            <div class="qb_col_two_general">
               <div class="row">
                  <div class="col-sm-8">
                     <div class="qb_nb_hp ">
                        <?php $title_hp = get_cat_name(74);?>
                        <h2 class="title_home_page"><a href="<?php echo get_category_link(66); ?>" target="_blank"><?php echo $title_hp; ?></a></h2>
                        <?php $nb_arg = array(
                           'post_type' => 'post',
                           'order' => 'ASC',
                           'orderby' => 'date',
                           'post_status' => 'publish',
                           'cat' => 74,
                           'posts_per_page' => 6
                           );
                           $nb_query = new WP_Query($nb_arg);
                           if($nb_query->have_posts()) : ?>
                        <ul class="row">
                           <?php while ($nb_query->have_posts()) : $nb_query->the_post(); ?>
                           <li class="col-sm-4">
                              <div class="wrap_figure">
                                 <?php 
                                    global $post;
                                    $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                 <a href="<?php the_permalink(); ?>" target="_blank">
                                    <figure style="background: url('<?php echo $nb_image[0]; ?>');"></figure>
                                 </a>
                              </div>
                              <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                           </li>
                           <?php endwhile; 
                              wp_reset_postdata();
                              ?>
                        </ul>
                        <?php else : echo 'No data'; 
                           endif; ?>
                     </div>
                     <?php  
                        $all_cat_two = get_categories(array(
                        	'meta_key' => 'show_category_two_col',
                        	'meta_value' => 'yes'
                        ));
                        ?>
                     <?php foreach ($all_cat_two as $item_cat_two) { ?>
                     <div class="qb_post_hp">
                        <h2 class="title_home_page"><a href="<?php echo get_category_link($item_cat_two->term_id); ?>" target="_blank"><?php echo get_cat_name($item_cat_two->term_id); ?></a></h2>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="ct_left">
                                 <?php $two_arg = array(
                                    'post_type' => 'post',
                                    'orderby' => 'date',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 5,
                                    'cat' => $item_cat_two->term_id
                                    );
                                    $two_query = new WP_Query($two_arg);
                                    if($two_query->have_posts()) : ?>
                                 <ul>
                                    <?php while ($two_query->have_posts()) : $two_query->the_post(); ?>
                                    <li>
                                       <?php 
                                          global $post;
                                          $ttdn_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                       <a href="<?php the_permalink(); ?>" target="_blank">
                                          <figure style="background: url('<?php echo $ttdn_image[0]; ?>');"></figure>
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
                           <div class="col-sm-6">
                              <div class="ct_right">
                                 <?php    
                                    $two_offset_arg = array(
                                    	'post_type' => 'post',
                                    	'orderby' => 'date',
                                    	'post_status' => 'publish', 
                                    	'offset' => 5,
                                    	'posts_per_page' => 5,
                                    	'cat' => $item_cat_two->term_id
                                    );
                                    $two_offset_query = new WP_Query($two_offset_arg);
                                    if($two_offset_query->have_posts()) : ?>
                                 <ul>
                                    <?php while ($two_offset_query->have_posts()) : $two_offset_query->the_post(); ?>
                                    <li>
                                       <?php 
                                          global $post;
                                          $ttdn_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                       <a href="<?php the_permalink(); ?>" target="_blank">
                                          <figure style="background: url('<?php echo $ttdn_image[0]; ?>');"></figure>
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
                     </div>
                     <?php } ?>
                  </div>
                  <div class="col-sm-4">
                     <?php if(is_active_sidebar('sidebar_homepage')) : ?>
                     <div class="qb_sidebar_right">
                        <?php dynamic_sidebar('sidebar_homepage'); ?>
                     </div>
                     <?php else : echo 'No data';
                        endif; ?>
                  </div>
               </div>
            </div>
            <div class="qb_col_one_general">
               <div class="row">
                  <?php  
                     $all_cat_one = get_categories(array(
                     	'meta_key' => 'show_category_one_col',
                     	'meta_value' => 'yes'
                     ));
                     ?>
                  <?php foreach ($all_cat_one as $item_cat_one) { ?>
                  <div class="qb_post_hp qb_blue">
                     <div class="col-sm-4">
                        <h2 class="title_home_page"><a href="<?php echo get_category_link($item_cat_two->term_id); ?>" target="_blank"><?php echo get_cat_name($item_cat_one->term_id); ?></a></h2>
                        <?php $one_arg = array(
                           'post_type' => 'post',
                           'orderby' => 'date',
                           'post_status' => 'publish',
                           'posts_per_page' => 5,
                           'cat' => $item_cat_one->term_id
                           );
                           $one_query = new WP_Query($one_arg);
                           if($one_query->have_posts()) : ?>
                        <ul>
                           <?php while ($one_query->have_posts()) : $one_query->the_post(); ?>
                           <li>
                              <?php 
                                 global $post;
                                 $ttdn_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                              <a href="<?php the_permalink(); ?>" target="_blank">
                                 <figure style="background: url('<?php echo $ttdn_image[0]; ?>');"></figure>
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
                  <?php } ?>
               </div>
            </div>
            <div class="qb_multimedia">
               <?php $title_hp = get_cat_name(76);?>
               <h2 class="mul_title"><a href="<?php echo get_category_link(76); ?>" target="_blank"><?php echo $title_hp; ?></a></h2>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="ct_left">
                        <?php 
                           $mul_arg = array(
                           	'post_type' => 'post',
                           	'order' => 'ASC',
                           	'orderby' => 'date',
                           	'post_status' => 'publish',
                           	'cat' => 76,
                           	'posts_per_page' => 1
                           );
                           $mul_query = new WP_Query($mul_arg);
                           if($mul_query->have_posts()) : ?>
                        <ul>
                           <?php while ($mul_query->have_posts()) : $mul_query->the_post(); ?>
                           <li>
                              <?php 
                                 global $post;
                                 $mul_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                              <div class="wrap_figure">
                                 <figure style="background: url('<?php echo $mul_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                              </div>
                              <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                              <div class="video-icon">
                                 <i class="fa fa-play"></i>
                              </div>
                           </li>
                           <?php endwhile; 
                              wp_reset_postdata();
                              ?>
                        </ul>
                        <?php else : echo 'No data'; 
                           endif; ?>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="ct_right">
                        <?php 
                           $mul_arg = array(
                           	'post_type' => 'post',
                           	'order' => 'ASC',
                           	'orderby' => 'date',
                           	'post_status' => 'publish',
                           	'cat' => 76,
                           	'posts_per_page' => 2,
                           	'offset' => 1
                           );
                           $mul_query = new WP_Query($mul_arg);
                           if($mul_query->have_posts()) : ?>
                        <ul>
                           <?php while ($mul_query->have_posts()) : $mul_query->the_post(); ?>
                           <li>
                              <?php 
                                 global $post;
                                 $mul_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                              <div class="wrap_figure">
                                 <figure style="background: url('<?php echo $mul_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                              </div>
                              <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
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
            </div>
            <div class="qb_ttdn_slider ">
               <h2>Thông tin doanh nghiệp</h2>
               <?php 
                  $ttdn_arg = array(
                  	'post_type' => 'partners',
                  	'order' => 'ASC',
                  	'orderby' => 'date',
                  	'post_status' => 'publish',
                  	'posts_per_page' => -1
                  );
                  $hot_ttdn_query = new WP_Query($ttdn_arg);
                  if($hot_ttdn_query->have_posts()) : ?>
               <ul class="owl-carousel">
                  <?php while ($hot_ttdn_query->have_posts()) : $hot_ttdn_query->the_post(); ?>
                  <li>
                     <?php 
                        global $post;
                        $ttdn_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                     <figure><img src="<?php echo $ttdn_image[0]; ?>"></figure>
                     <h4><a href="<?php echo excerpt(20);?>" target="_blank"><?php the_title(); ?></a></h4>
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
   </div>
</div>
<?php get_footer(); ?>