<!DOCTYPE html>
	
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

<?php if(siteorigin_setting('general_topbar_menu')) : ?>
	<div id="topbar">
		<div class="container">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'topbar',
					'menu_id' => 'topbar-menu',
					'depth' => 2,
					'fallback_cb' => 'pitch_fallback_nav',
					'walker' => new Pitch_Walker_Nav_Menu,
				));
			?>
			<div class="clear"></div>
		</div>
	</div>
<?php endif; ?>
	
<div id="logo">
	<div class="container">
		<a href="<?php echo esc_url(home_url()) ?>" title="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')); ?>" id="logo-link">
			<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>" alt="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
			<?php else : ?>
				<h1><?php echo esc_html(get_bloginfo('name')) ?></h1>
			<?php endif; ?>
		</a>
		
		<?php if(siteorigin_setting('general_search_input')) get_search_form() ?>
	</div>
</div>

<div id="mainmenu" class="<?php echo siteorigin_setting('general_scale_main_menu') ? 'scaled' : '' ?>">
	<div class="container">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main',
			'menu_id' => 'mainmenu-menu',
			'fallback_cb' => 'pitch_fallback_nav',
		));
		?>
	</div>
</div>