<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <div id="shareme" data-url="<?php echo get_permalink(); ?>" data-text="<?php the_title(); echo ' - '; bloginfo('title'); ?>"></div>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>