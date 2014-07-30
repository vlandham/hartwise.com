<?php

function pitch_settings_admin_init(){
	
	// All the sections
	siteorigin_settings_add_section('general', __('General', 'pitch'));
	siteorigin_settings_add_section('front_page', __('Front Page', 'pitch'));
	siteorigin_settings_add_section('slider', __('Slider', 'pitch'));
	siteorigin_settings_add_section('project', __('Projects', 'pitch'));
	siteorigin_settings_add_section('type', __('Post Types', 'pitch'));
	siteorigin_settings_add_section('text', __('Site Text', 'pitch'));

	// General Settings Fields
	
	siteorigin_settings_add_field('general', 'demo_mode', 'checkbox', __('Demo Mode', 'pitch'), array(
		'description' => __("You should disable this after you've installed Pitch.", 'pitch')
	));

	siteorigin_settings_add_field('general', 'search_input', 'checkbox', __('Search Input', 'pitch'), array(
		'description' => __("Show the search field at the top of your site.", 'pitch')
	));

	siteorigin_settings_add_field('general', 'menu_extras', 'checkbox', __('Menu Extras', 'pitch'), array(
		'description' => __("Display blog, home and project links in the menus.", 'pitch')
	));

	siteorigin_settings_add_field('general', 'topbar_menu', 'checkbox', __('Display Top Bar Menu', 'pitch'), array(
		'description' => __("Display the menu bar along the top of Pitch.", 'pitch')
	));

	siteorigin_settings_add_field('general', 'scale_main_menu', 'checkbox', __('Scale Main Menu', 'pitch'), array(
		'description' => __("Scale menu items so they spread across the whole width of the menu.", 'pitch')
	));

	siteorigin_settings_add_teaser('general', 'attribution', __('Attribution Link', 'pitch'), array(
		'description' => __('Hide or display the attribution link in the footer.', 'pitch')
	));

	siteorigin_settings_add_field('general', 'gallery', 'checkbox', __('Use Pitch Gallery', 'pitch'), array(
		'description' => __("Convert [gallery] shortcodes into fancy looking sliders.", 'pitch')
	));

	// Front Page Settings Fields

	siteorigin_settings_add_field('front_page', 'portfolio_home', 'checkbox', __('Portfolio Home Page', 'pitch'), array(
		'description' => __('Disabling this will convert your home page into a blog.', 'pitch')
	));

	siteorigin_settings_add_field('front_page', 'cta', 'checkbox', __('Call To Action', 'pitch'), array(
		'description' => __('Enable or Disable the Call to Action.', 'pitch'),
	));
	
	siteorigin_settings_add_field('front_page', 'cta_text', 'text', __('Call To Action Text', 'pitch'), array(
		'description' => __('Call to action text on your home page.', 'pitch'),
	));

	siteorigin_settings_add_field('front_page', 'cta_button_text', 'text', __('Call To Action Button Text', 'pitch'));

	siteorigin_settings_add_field('front_page', 'cta_button_url', 'text', __('Call To Action Button URL', 'pitch'));

	siteorigin_settings_add_field('front_page', 'home_blog', 'checkbox', __('Display Blog on Home Page', 'pitch'), array(
		'description' => __('Displays blog entries on your home page.', 'pitch')
	));

	// Home page titles

	siteorigin_settings_add_field('front_page', 'home_title_latest_projects', 'text', __('Title: Latest Projects', 'pitch'), array(
		'description' => __('Title of the projects block.', 'pitch')
	));

	siteorigin_settings_add_field('front_page', 'home_title_blog', 'text', __('Title: Blog', 'pitch'), array(
		'description' => __('Title of the blog block.', 'pitch')
	));

	siteorigin_settings_add_field('front_page', 'home_title_clients', 'text', __('Title: Clients', 'pitch'), array(
		'description' => __('Title of the clients block.', 'pitch')
	));

	// Slider Settings

	siteorigin_settings_add_field('slider', 'speed', 'text', __('Slider Speed', 'pitch'), array(
		'description' => __('Number of milliseconds Pitch shows each slide.', 'pitch')
	));

	siteorigin_settings_add_field('slider', 'animation_speed', 'text', __('Slider Transition Animation Speed', 'pitch'), array(
		'description' => __('Number of milliseconds each slide transition takes.', 'pitch')
	));

	siteorigin_settings_add_field('slider', 'max_slides', 'text', __('Maximum Slides', 'pitch'), array(
		'description' => __('The maximum number of slides to display on the home page slider.', 'pitch')
	));

	siteorigin_settings_add_field('slider', 'effect', 'select', __('Transition Effect', 'pitch'), array(
		'description' => __('The maximum number of slides to display on the home page slider.', 'pitch'),
		'options' => array(
			'random' => __('Random', 'pitch'),
			'sliceDown' => __('Slice Down', 'pitch'),
			'sliceDownLeft' => __('Slice Down Left', 'pitch'),
			'sliceUp' => __('Slice Up', 'pitch'),
			'sliceUpLeft' => __('Slice Up Left', 'pitch'),
			'sliceUpDown' => __('Slice Up Down', 'pitch'),
			'sliceUpDownLeft' => __('Slice Up Down Left', 'pitch'),
			'fold' => __('Fold', 'pitch'),
			'fade' => __('Fade', 'pitch'),
			'slideInRight' => __('Slide In Right', 'pitch'),
			'slideInLeft' => __('Slide In Left', 'pitch'),
			'boxRandom' => __('Box Random', 'pitch'),
			'boxRain' => __('Box Rain', 'pitch'),
			'boxRainReverse' => __('Box Rain Reverse', 'pitch'),
			'boxRainGrow' => __('Box Rain Grow', 'pitch'),
			'boxRainGrowReverse' => __('Box Rain Grow Reverse', 'pitch'),
		)
	));

	siteorigin_settings_add_field('slider', 'height', 'text', __('Slider Height', 'pitch'), array(
		'description' => __('The height of the home page slider in pixels. You need to regenerate thumbnails if you change this.', 'pitch')
	));
	
	siteorigin_settings_add_teaser('slider', 'video', __('Home Page Video', 'pitch'), array(
		'description' => __('Overwrites the slider and displays a video on the home page. Enter a oEmbed URL (YouTube, Vimeo, etc).', 'pitch')
	));
	
	// The Project settings

	siteorigin_settings_add_field('project', 'tags', 'checkbox', __('Project Tags', 'pitch'), array(
		'description' => __("Use project skill tags.", 'pitch')
	));

	siteorigin_settings_add_field('project', 'archive_title', 'text', __('Projects Archive Title', 'pitch'), array(
		'description' => __("The title to display on the project archive page.", 'pitch')
	));

	siteorigin_settings_add_field('project', 'view_text', 'text', __('View Project Text', 'pitch'), array(
		'description' => __('The text displayed to view a project.', 'pitch')
	));

	siteorigin_settings_add_field('project', 'url_slug', 'text', __('Project Slug', 'pitch'), array(
		'description' => __("The slug used in a project's URL.", 'pitch')
	));
	
	// Enabled/Disabled Project Types

	siteorigin_settings_add_field('type', 'project', 'checkbox', __('Projects', 'pitch'), array(
		'description' => __("Enable or disable Projects.", 'pitch')
	));

	siteorigin_settings_add_field('type', 'feature', 'checkbox', __('Features', 'pitch'), array(
		'description' => __("Enable or disable Features.", 'pitch')
	));

	siteorigin_settings_add_field('type', 'client', 'checkbox', __('Clients', 'pitch'), array(
		'description' => __("Enable or disable Clients.", 'pitch')
	));

	siteorigin_settings_add_field('type', 'slide', 'checkbox', __('Slides', 'pitch'), array(
		'description' => __("Enable or disable Slides.", 'pitch')
	));
	
	// Site Text

	siteorigin_settings_add_field('text', 'footer_text', 'text', __('Footer Text', 'pitch'));
	siteorigin_settings_add_field('text', 'search_placeholder', 'text', __('Search Placeholder', 'pitch'));
	siteorigin_settings_add_field('text', 'comments_closed', 'text', __('Comments Closed', 'pitch'));
	siteorigin_settings_add_field('text', 'not_found', 'text', __('Page Not Found', 'pitch'));
}
add_action('admin_init', 'pitch_settings_admin_init');

function pitch_settings_default($defaults){
	// First, lets check if we have old settings stored
	$original = (array) get_option('pitch_theme_settings', array());
	if(isset($original['search_input'])){ // Search input value was only set in the old version of the settings
		// We're using old settings, we'll convert these into the new settings
		
		// General
		if(isset($original['demo_mode'])) $defaults['general_demo_mode'] = $original['demo_mode'];
		if(isset($original['search_input'])) $defaults['general_search_input'] = $original['search_input'];
		if(isset($original['attribution'])) $defaults['general_attribution'] = $original['attribution'];
		if(isset($original['menu_extras'])) $defaults['general_menu_extras'] = $original['menu_extras'];
		if(isset($original['topbar_menu'])) $defaults['general_topbar_menu'] = $original['topbar_menu'];
		if(isset($original['scale_main_menu'])) $defaults['general_scale_main_menu'] = $original['scale_main_menu'];
		
		// Home Page
		if(isset($original['portfolio_home'])) $defaults['front_page_portfolio_home'] = $original['portfolio_home'];
		if(isset($original['cta_text'])) $defaults['front_page_cta_text'] = $original['cta_text'];
		if(isset($original['cta_button_text'])) $defaults['front_page_cta_button_text'] = $original['cta_button_text'];
		if(isset($original['cta_button_url'])) $defaults['front_page_cta_button_url'] = $original['cta_button_url'];
		if(isset($original['home_blog'])) $defaults['front_page_home_blog'] = $original['home_blog'];

		// Front page titles
		if(isset($original['home_title_latest_projects'])) $defaults['front_page_home_title_latest_projects'] = $original['home_title_latest_projects'];
		if(isset($original['home_title_blog'])) $defaults['front_page_home_title_blog'] = $original['home_title_blog'];
		if(isset($original['home_title_clients'])) $defaults['front_page_home_title_clients'] = $original['home_title_clients'];

		// Slider stuff
		if(isset($original['slider_speed'])) $defaults['slider_speed'] = $original['slider_speed'];
		if(isset($original['slider_animation_speed'])) $defaults['slider_animation_speed'] = $original['slider_animation_speed'];
		if(isset($original['slider_max_slides'])) $defaults['slider_max_slides'] = $original['slider_max_slides'];
		if(isset($original['slider_effect'])) $defaults['slider_effect'] = $original['slider_effect'];
		if(isset($original['slider_height'])) $defaults['slider_height'] = $original['slider_height'];

		// Project
		if(isset($original['project_tags'])) $defaults['project_tags'] = $original['project_tags'];
		if(isset($original['project_archive_title'])) $defaults['project_archive_title'] = $original['project_archive_title'];
		if(isset($original['project_view_text'])) $defaults['project_view_text'] = $original['project_view_text'];
		if(isset($original['project_url_slug'])) $defaults['project_url_slug'] = $original['project_url_slug'];

		// Post Types
		if(isset($original['type_project'])) $defaults['type_project'] = $original['type_project'];
		if(isset($original['type_feature'])) $defaults['type_feature'] = $original['type_feature'];
		if(isset($original['type_client'])) $defaults['type_client'] = $original['type_client'];
		if(isset($original['type_slide'])) $defaults['type_slide'] = $original['type_slide'];

		// Site Text
		if(isset($original['footer_text'])) $defaults['text_footer_text'] = $original['footer_text'];
		if(isset($original['search_placeholder'])) $defaults['text_search_placeholder'] = $original['search_placeholder'];
		if(isset($original['comments_closed_text'])) $defaults['text_comments_closed'] = $original['comments_closed_text'];
		if(isset($original['not_found_text'])) $defaults['text_not_found'] = $original['not_found_text'];
	}
	
	$defaults = array_merge($defaults, array(
		// General
		'general_demo_mode' => true,
		'general_search_input' => true,
		'general_attribution' => true,
		'general_menu_extras' => true,
		'general_topbar_menu' => true,
		'general_scale_main_menu' => false,
		'general_gallery' => true,

		// Home Page
		'front_page_portfolio_home' => true,
		'front_page_cta' => !empty($defaults['front_page_cta_text']),
		'front_page_cta_text' => '',
		'front_page_cta_button_text' => '',
		'front_page_cta_button_url' => site_url(),
		'front_page_home_blog' => true,

		// Front page titles
		'front_page_home_title_latest_projects' => '',
		'front_page_home_title_blog' => '',
		'front_page_home_title_clients' => '',

		// Slider stuff
		'slider_speed' => 8000,
		'slider_animation_speed' => 500,
		'slider_max_slides' => 4,
		'slider_effect' => 'random',
		'slider_height' => 360,
		'slider_video' => '',

		// Project
		'project_tags' => true,
		'project_url_slug' => 'project',
		'project_archive_title' => '',
		'project_view_text' => '',

		// Post Types
		'type_project' => true,
		'type_feature' => true,
		'type_client' => true,
		'type_slide' => true,

		// Site Text
		'text_footer_text' => '',
		'text_search_placeholder' => '',
		'text_comments_closed' => '',
		'text_not_found' => '',
	));
	
	return $defaults;
	
}
add_filter('siteorigin_theme_default_settings', 'pitch_settings_default');