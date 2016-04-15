<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
	<div id="wrap" data-role="page">		
		<!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->
	  	<?php
		do_action('get_header');
		// Use Bootstrap's navbar if enabled in config.php
		if (current_theme_supports('bootstrap-top-navbar')) {
			get_template_part('templates/header-top-navbar');
		} else {
			get_template_part('templates/header');
		} ?>
		<div class="wrap container" role="document">
			<div class="content row">
				<aside class="col-sm-4" role="complementary">
					<div class="logo">
						<img class="img-responsive" src="/assets/img/patisserie_kuyt_icon.png" width="306" height="300" alt="<?php bloginfo('name'); ?>" />
					</div>	
				</aside>
				<div class="main col-sm-8" role="main">
					<div class="box">
						<?php include roots_template_path(); ?>
					</div>	
				</div><!-- /.main -->
			</div><!-- /.content -->
		</div><!-- /.wrap -->
		<div id="push"></div>
	</div>
	<?php get_template_part('templates/footer'); ?>
</body>
</html>
