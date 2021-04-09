
<li class="list_search_detaild">
 <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
 <figure style="background:url('<?php echo $image[0]; ?>')"><a href="<?php the_permalink(); ?>"></a></figure>
 <div class="info_post">
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <div class="excerpt">
   <p><?php echo excerpt(50); ?></p>  
 </div>
 <a class="read_more" href="<?php the_permalink(); ?>">Xem thêm</a>
</div>                
</li>
