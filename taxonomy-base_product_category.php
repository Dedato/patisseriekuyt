<?php
$cpt = get_post_type_object('base_product');
$tax = 'base_product_category';
$term =	$wp_query->queried_object;
$wp_query = new WP_Query(array(
	'post_type'	=> $cpt->name,
	'taxonomy'	=> $tax,
	'term'		=> $term->slug,
	'orderby'	=> 'name',
	'order'		=> 'ASC',
	'nopaging'	=> true
)); ?>
<h1><?php echo $cpt->labels->name ?></h1>
<?php if ($wp_query->have_posts()) { ?>
	<div class="<?php echo $term->slug; ?> products list">
		<h2><?php echo $term->name; ?></h2>
		<p><?php echo $term->description; ?></p>
		<?php get_template_part('templates/loop', 'product'); 
		wp_reset_query(); ?>
	</div>
<?php } else { ?>
	<p><?php _e('Geen producten gevonden voor deze categorie','jmvandelft'); ?></p>
<?php } ?>
