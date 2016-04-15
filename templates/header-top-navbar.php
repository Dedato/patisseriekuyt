<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
	<div class="container">
		<div class="row parents">
			<div class="navbar-header col-md-3">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand text-hide" href="<?php echo home_url(); ?>/">
					<img class="" width="188" height="25" src="/assets/img/patisserie_kuyt_logo.png" alt="<?php bloginfo('name'); ?>" />
				</a>
			</div>
			<nav class="collapse navbar-collapse col-md-9" role="navigation">
				<?php if (has_nav_menu('primary_navigation')) :
					wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_id' => 'menu-hoofdmenu', 'menu_class' => 'nav navbar-nav row'));
				endif; ?>
			</nav>
		</div>
		<?php 
		// Custom Taxonomy Menu	
		if ( is_post_type_archive('base_product') || is_tax('base_product_category') ) {
			product_tax_nav();
    // Custom Submenu	
		} else {
			if ( wp_nav_menu(array('theme_location' => 'primary_navigation', 'sub_menu' => true, 'echo' => 0)) ) : ?>
				<div class="row children">
				  <nav class="collapse navbar-collapse col-md-9 col-md-offset-3" role="navigation">
					  <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_id' => 'menu-submenu', 'menu_class' => 'nav navbar-nav submenu', 'sub_menu' => true)); ?>
				  </nav>
				</div>
			<?php endif;
		} ?>
	</div>	
</header>