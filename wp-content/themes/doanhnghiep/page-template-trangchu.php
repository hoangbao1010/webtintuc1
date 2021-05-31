<?php 
/* Template Name: page-template-trangchu */
get_header();

?>
<div id="content">
   <div class="qb_content">
      <div class="container">
         <div class="qb_home_page">
            <div class="qb_big_post">
               <div class="row">
                  <div class="col-sm-8">
                     <div class="qb_big_post_left ">
                        <?php $big_post_left_arg = array(
                           'post_type' => 'post',
                           'order' => 'DESC',
                           'orderby' => 'date',
                           'post_status' => 'publish',
                           'posts_per_page' => 1
                        );
                        $big_hot_left_query = new WP_Query($big_post_left_arg);
                        if($big_hot_left_query->have_posts()) : ?>
                           <?php while ($big_hot_left_query->have_posts()) : $big_hot_left_query->the_post(); ?>
                              <div class="wrap_figure">
                                 <?php 
                                 global $post;
                                 $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                 <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                                 <?php $post_id = get_the_ID(); 
                                 $category_object = get_the_category($post_id);
                                 $category_name = $category_object[0]->name;?>
                                 <h2><a href="<?php echo get_category_link($category_object[0]->term_id); ?>"><?php echo $category_name; ?></a></h2>
                              </div>
                              <div class="text_widget">
                                 <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                                 <div class="excerpt">
                                    <?php echo excerpt(20);?>
                                 </div>
                                 <a href="<?php the_permalink(); ?>" target="_blank" class="read_more">Xem thêm</a>
                              </div>
                           <?php endwhile; 
                           wp_reset_postdata();
                           ?>
                           <?php else : echo 'No data'; 
                           endif; ?>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="qb_big_post_right ">
                           <?php $big_post_right_arg = array(
                              'post_type' => 'post',
                              'order' => 'ASC',
                              'orderby' => 'date',
                              'post_status' => 'publish',
                              'posts_per_page' => 5,
                              'offset' => 1
                           );
                           $big_hot_right_query = new WP_Query($big_post_right_arg);
                           if($big_hot_right_query->have_posts()) : ?>
                              <ul>
                                 <?php while ($big_hot_right_query->have_posts()) : $big_hot_right_query->the_post(); ?>
                                    <li>
                                       <div class="wrap_figure">
                                          <?php 
                                          global $post;
                                          $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                          <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                                       </div>
                                       <div class="text_widget">
                                          <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                                          <p><strong class="qb_author"><a href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></strong><span class="qb_date_post"> - <?php the_time('j F, Y'); ?></span></p>
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
                  <div class="ts_hp">
                     <?php $title_hp = get_cat_name(4);?>
                     <h2 class="title_home_page"><?php echo $title_hp; ?></h2>
                     <?php $ts_arg = array(
                        'post_type' => 'post',
                        'order' => 'ASC',
                        'orderby' => 'date',
                        'post_status' => 'publish',
                        'cat' => 4,
                        'posts_per_page' => 6
                     );
                     $ts_query = new WP_Query($ts_arg);
                     if($ts_query->have_posts()) : ?>
                        <ul class="row">
                           <?php while ($ts_query->have_posts()) : $ts_query->the_post(); ?>
                              <li class="col-sm-4">
                                 <div class="wrap_figure">
                                    <?php 
                                    global $post;
                                    $ts_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                    
                                    <figure style="background: url('<?php echo $ts_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
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
                     <div class="td_nn_hp">
                        <div class="row">
                           <div class="col-sm-8">
                              <div class="td_ct">
                                 <?php $title_hp = get_cat_name(4);?>
                                 <h2 class="title_home_page">Tiêu điểm</h2>
                                 <div class="td_big_post">
                                    <?php $td_arg = array(
                                       'order' => 'ASC',
                                       'posts_per_page' => 2,
                                       'meta_key' => 'featured-checkbox',
                                       'meta_value' => 'yes'
                                    );
                                    $td_query = new WP_Query($td_arg);
                                    if($td_query->have_posts()) : ?>
                                       <ul class="row">
                                          <?php while ($td_query->have_posts()) : $td_query->the_post(); ?>
                                             <li class="col-sm-6">
                                                <div class="wrap_figure">
                                                   <?php 
                                                   global $post;
                                                   $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                                   <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                                                </div>
                                       <div class="text_widget">
                                          <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                                          <p><strong class="qb_author"><a href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></strong><span class="qb_date_post"> - <?php the_time('j F, Y'); ?></span></p>
                                       </div>
                                             </li>
                                          <?php endwhile; 
                                          wp_reset_postdata();
                                          ?>
                                       </ul>
                                       <?php else : echo 'No data'; 
                                       endif; ?>
                                    </div>
                                    <div class="td_small_post">
                                       <?php $td_arg = array(
                                          'order' => 'ASC',
                                          'posts_per_page' => 4,
                                          'meta_key' => 'featured-checkbox',
                                          'meta_value' => 'yes',
                                          'offset' => 2
                                       );
                                       $td_query = new WP_Query($td_arg);
                                       if($td_query->have_posts()) : ?>
                                          <ul class="row">
                                             <?php while ($td_query->have_posts()) : $td_query->the_post(); ?>
                                                <li class="col-sm-6">
                                                   <div class="wrap_figure">
                                                      <?php 
                                                      global $post;
                                                      $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                                      <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
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
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="nn_ct">
                                       <h2 class="title_home_page">Đọc nhiều nhất</h2>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="qb_col">
                              <div class="row">
                                 <div class="col-sm-8">
                                    <div class="qb_col_two_general">
                                       <?php  
                                       $all_cat_two = get_categories(array(
                                        'meta_key' => 'show_category_two_col',
                                        'meta_value' => 'yes'
                                     ));
                                     ?>
                                     <?php foreach ($all_cat_two as $item_cat_two) { ?>
                                          <h2 class="title_home_page"><a href="<?php echo get_category_link($item_cat_two->term_id); ?>" target="_blank"><?php echo get_cat_name($item_cat_two->term_id); ?></a></h2>
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <div class="ct_left">
                                                   <?php $two_arg = array(
                                                      'post_type' => 'post',
                                                      'orderby' => 'date',
                                                      'post_status' => 'publish',
                                                      'posts_per_page' => 1,
                                                      'cat' => $item_cat_two->term_id
                                                   );
                                                   $two_query = new WP_Query($two_arg);
                                                   if($two_query->have_posts()) : ?>
                                                      <?php while ($two_query->have_posts()) : $two_query->the_post(); ?>
                                                         <div class="wrap_figure">
                                                            <?php 
                                                            global $post;
                                                            $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                                            <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
                                                            <?php $post_id = get_the_ID(); 
                                                            $category_object = get_the_category($post_id);
                                                            $category_name = $category_object[0]->name;?>
                                                            <h2><a href="<?php echo get_category_link($category_object[0]->term_id); ?>"><?php echo $category_name; ?></a></h2>
                                                         </div>
                                                         <div class="text_widget">
                                                            <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                                                            <div class="excerpt">
                                                               <?php echo excerpt(20);?>
                                                            </div>
                                                         </div>
                                                      <?php endwhile; 
                                                      wp_reset_postdata();
                                                      ?>
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
                                                       'offset' => 1,
                                                       'posts_per_page' => 4,
                                                       'cat' => $item_cat_two->term_id
                                                    );
                                                      $two_offset_query = new WP_Query($two_offset_arg);
                                                      if($two_offset_query->have_posts()) : ?>
                                                         <ul>
                                                            <?php while ($two_offset_query->have_posts()) : $two_offset_query->the_post(); ?>
                                                               <li>
                                                   <div class="wrap_figure">
                                                      <?php 
                                                      global $post;
                                                      $nb_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                                      <figure style="background: url('<?php echo $nb_image[0]; ?>');"><a href="<?php the_permalink(); ?>" target="_blank"></a></figure>
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
                                                   </div>
                                                </div>
                                          <?php } ?>
                                       </div>
                                       <div class="qb_col_three_general">
                                             <?php  
                                             $all_cat_three = get_categories(array(
                                              'meta_key' => 'show_category_three_col',
                                              'meta_value' => 'yes'
                                           ));
                                           ?>
                                           <?php foreach ($all_cat_three as $item_cat_three) { ?>
                                                <h2 class="title_home_page"><a href="<?php echo get_category_link($item_cat_two->term_id); ?>" target="_blank"><?php echo get_cat_name($item_cat_three->term_id); ?></a></h2>
                                                <?php $one_arg = array(
                                                   'post_type' => 'post',
                                                   'orderby' => 'date',
                                                   'post_status' => 'publish',
                                                   'posts_per_page' => 6,
                                                   'cat' => $item_cat_three->term_id
                                                );
                                                $one_query = new WP_Query($one_arg);
                                                if($one_query->have_posts()) : ?>
                                                   <ul class="row">
                                                      <?php while ($one_query->have_posts()) : $one_query->the_post(); ?>
                                                         <li class="col-sm-4">
                                                            <?php 
                                                            global $post;
                                                            $ttdn_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large'); ?>
                                                            <a href="<?php the_permalink(); ?>" target="_blank">
                                                               <figure style="background: url('<?php echo $ttdn_image[0]; ?>');"></figure>
                                                               <h4><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h4>
                                                            </a>
                                                         </li>
                                                      <?php endwhile; 
                                                      wp_reset_postdata();
                                                      ?>
                                                   </ul>
                                                   <?php else : echo 'No data'; 
                                                   endif; ?>
                                             <?php } ?>
                                          </div>
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
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php get_footer(); ?>