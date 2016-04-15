<h1><?php echo roots_title(); ?></h1>
<?php
$tax = 'base_product_category';
$terms = get_terms($tax, array(
	'orderby'      => 'name', 
   'order'        => 'ASC',
   'hide_empty'   => true
));
if ($terms) { ?>
	<div class="terms row">
		<?php foreach ($terms as $term) {
			$termlink = get_term_link($term, $tax);
			$termid = $term->taxonomy .'_'. $term->term_id;
			$termimage = get_field('term_image', $termid);
			if($i == 2): $i = 0; /* Close row after 2 terms and start new one */ ?>
				</div>
				<div class="terms row">
			<?php endif; ?>
			<article <?php post_class('col-xs-6'); ?>>
				<h3><?php echo $term->name; ?></h3>
				<?php if($termimage) {
					$alt = $termimage['alt'];
					$imgsrc = $termimage['sizes']['term-thumb']; ?>
					<div class="entry-image">
						<a href="<?php echo $termlink; ?>" title="<?php echo $term->name; ?>">
							<img src="<?php echo $imgsrc; ?>" class="img-responsive" alt="<?php echo $alt; ?>">
						</a>
					</div>	
				<?php } ?>
			</article>
		<?php $i++;
		} ?>
	</div>
<?php } ?>