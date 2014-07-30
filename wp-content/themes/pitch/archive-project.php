<?php get_header() ?>

<div class="container">
	<h1 id="archive-title">
		<?php echo siteorigin_setting( 'project_archive_title', wp_title( null, false ) ); ?>
	</h1>
	
	<?php get_template_part('loop', 'projects') ?>
	<div class="clear"></div>
</div>

<?php get_footer() ?>