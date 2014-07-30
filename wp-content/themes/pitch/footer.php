
<div id="footer">
	<div class="pointer"></div>
	<div class="container">
		<ul class="widgets">
			<?php dynamic_sidebar('Footer') ?>
		</ul>
	</div>
</div>

<div id="copyright">
	<div class="container">
		<?php

		print str_replace(
			array('{sitename}'),
			array(get_bloginfo('name')),
			siteorigin_setting('text_footer_text', __('Copyright {sitename}', 'pitch'))
		);
		
		if(siteorigin_setting('general_attribution')){
			printf(
				__(' - Theme By %s', 'pitch'),
				'<a href="http://siteorigin.com">SiteOrigin</a>'
			);
		}
		?>
	</div>
</div>

<?php wp_footer() ?>
</body>
</html>