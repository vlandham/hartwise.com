<?php get_header(); ?>

<div id="post-single" class="error-404">
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php _e('Not Found', 'pitch') ?></h1>
			<div class="content">
				<?php echo siteorigin_setting('text_not_found', __('The page you were looking for could not be found.', 'pitch')) ?>
			</div>
		</div>
		
		<?php get_sidebar() ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>