<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<article <?php post_class('row'); ?>>
		<div class="entry-image col-sm-4">
			<?php
			$productimage 		= get_field('image');
			$productwebsite 	= get_field('website');
			if ($productimage) {
				$alt 			= $productimage['alt'];
				$imgsrcsm 	= $productimage['sizes']['product-thumb'];
				$imgsrcmd 	= $productimage['sizes']['medium'];
				$imgsrclg 	= $productimage['sizes']['large'];
				?>
				<a class="fresco" href="<?php echo $imgsrclg; ?>" data-fresco-group="<?php echo get_post_type(); ?>" data-fresco-group-options="fit:'both', spacing:{both:{horizontal:5, vertical:5}}" title="<?php the_title(); ?>">
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="<?php echo $imgsrcsm; ?>" media="(min-width:768px)">
						<source srcset="<?php echo $imgsrcmd; ?>">
						<!--[if IE 9]></video><![endif]-->
						<img srcset="<?php echo $imgsrcsm; ?>" class="img-responsive" alt="<?php echo $alt; ?>">
					</picture>
				</a>	
			<?php } ?>
		</div>
		<div class="entry-content col-sm-8">
			<header>
				<h3 class="entry-title"><?php the_title(); ?></h3>
			</header>
			<div class="entry-summary">
				<?php the_content(); ?>
				<?php if ($productwebsite) { ?>
					<a href="<?php echo $productwebsite['url']; ?>" title="<?php _e('Bezoek: ', 'kuyt'); pretty_url( $productwebsite['url'] ); ?>" target="_blank"><?php pretty_url( $productwebsite['url'] ); ?></a>
				<?php } ?>
			</div>
		</div>	
	</article>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>