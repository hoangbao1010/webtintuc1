
        <li class="col-sm-4">
          <div class="list_post_gengeral">
            <div class="wrap_post">
             <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
             <figure style="background:url('<?php echo $image[0]; ?>')"><a href="<?php the_permalink(); ?>"></a></figure>
           </div>
           <div class="title_post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><span>
              <?php 
              $categorys = get_the_category();
              foreach ($categorys as $category) { ?>
                <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->cat_name ; ?></a>
              <?php } ?>
            </span> | <span><?php the_time('M j, Y'); ?></span></p>
          </div>     
          <div class="excerpt">
           <p><?php echo excerpt(50); ?></p>  
         </div>  
         <div class="other_info">
           <p><strong>By</strong><a href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p>
           <p class="Comments"><strong>Comments</strong><a href="<?php the_permalink(); ?>"><?php echo get_comments_number(); ?></a></p>
           <p class="readmore"><a href="<?php the_permalink();?>">Read more</a></p>
         </div>  
       </div>           
     </li>
 