<?php // You shouldn't edit this file to change Pitch's menus. Rather use WordPress' custom menu system. ?>

<ul id="<?php echo esc_attr($GLOBALS['menu_args']['menu_id']) ?>">
	<?php if(siteorigin_setting('general_menu_extras')) : ?>
		<li class="menu-item"><a href="<?php echo esc_url(home_url()) ?>"><?php _e('Home', 'pitch') ?></a></li>
		<?php if(siteorigin_setting('type_project')) : ?>
			<li class="menu-item"><a href="<?php echo esc_url(get_post_type_archive_link('project')) ?>"><?php _e('Projects', 'pitch') ?></a></li>
		<?php endif ?>
		<li class="menu-item"><a href="<?php echo esc_url(pitch_get_blogurl()) ?>"><?php _e('Blog', 'pitch') ?></a></li>
	<?php endif; ?>
	
	<?php
		wp_list_pages(array(
			'title_li' => null,
			'depth' => 2,
			'walker' => new Pitch_Walker_Page,
		));
	?>
	
	<div class="clear"></div>
</ul>