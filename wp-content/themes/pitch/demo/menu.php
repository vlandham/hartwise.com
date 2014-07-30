<?php // You shouldn't edit this file to change Pitch's menus. Rather use WordPress' custom menu system. ?>

<ul id="<?php echo esc_attr($GLOBALS['menu_args']['menu_id']) ?>">
	<li class="menu-item"><a href="<?php echo esc_url(home_url()) ?>"><?php _e('Home', 'pitch') ?></a></li>
	<?php if(siteorigin_setting('type_project')) : ?>
		<li class="menu-item"><a href="<?php echo esc_url(get_post_type_archive_link('project')) ?>"><?php _e('Projects', 'pitch') ?></a></li>	
	<?php endif ?>
	<li class="menu-item"><a href="<?php echo esc_url(pitch_get_blogurl()) ?>"><?php _e('Blog', 'pitch') ?></a></li>
	<li class="menu-item"><a href="<?php echo esc_url(site_url('?features_page=1')) ?>"><?php _e('Theme Features', 'pitch') ?></a></li>
	
	<div class="clear"></div>
</ul>