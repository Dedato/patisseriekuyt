<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
	 	<div class="entry-image">
			<?php
			$postimage = get_field('image');
			if ($postimage) {
				$alt = $postimage['alt'];
				$imgsrc = $postimage['sizes']['medium']; ?>
				<img src="<?php echo $imgsrc; ?>" class="img-responsive" alt="<?php echo $alt; ?>">	
			<?php } ?>
		</div>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<div id="shareme" data-url="<?php echo get_permalink(); ?>" data-text="<?php the_title(); echo ' - '; bloginfo('title'); ?>"></div>
			<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
		</footer>
	</article>
<?php endwhile; ?>
