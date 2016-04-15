<footer class="content-info" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="social">
					<a href="https://www.facebook.com/pages/Patisserie-Kuyt/202319463139494" target="_blank" class="btn btn-default btn-xs" role="button">
						<i class="fontello-facebook-squared"></i><?php _e('Volg ons op Facebook','kuyt'); ?>
					</a>	
				</div>
			</div>
			<div class="col-md-4">
				<?php dynamic_sidebar('sidebar-footer'); ?>
				<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
			</div>
		</div>
	</div>	
</footer>
<?php wp_footer(); ?>