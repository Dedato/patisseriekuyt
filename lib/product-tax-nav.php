<?php
// Custom Taxonomy Menu
function product_tax_nav() {
	global $wp_query;
	$curterm 	=	$wp_query->queried_object;	
	$cpt 		= 'base_product';
	$tax 		= 'base_product_category';
	$terms 		= get_terms($tax, array(
		'hide_empty'	=> 1,
		'orderby'     	=> 'name', 
		'order'        	=> 'ASC'
	));
	if ($terms) { ?>
  	<div class="row children">
  		<nav class="collapse navbar-collapse col-md-9 col-md-offset-3" role="navigation">
  			<ul id="product-category" class="nav navbar-nav submenu">
  				<?php foreach ($terms as $term) { 
  					$term_link = get_term_link($term, $tax);
  					if( is_wp_error( $term_link ) )
  						continue; ?>
  					<li class="<?php if ($curterm->slug == $term->slug){ echo 'active '; } ?>menu-<?php echo $term->slug; ?>">
  						<a href="<?php echo $term_link; ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
  					</li>	
  				<?php } ?>
  			</ul>
  		</nav>
  	</div>	
	<?php }
}
