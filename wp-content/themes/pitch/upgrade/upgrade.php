<?php

function pitch_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Pitch Premium', 'pitch');
	$content['premium_summary'] = __("If you've enjoyed using Pitch, you'll going to love Pitch Premium. It's a robust upgrade to Pitch that gives you loads of cool features and email support. You name the price, so you can decide what its worth to to get a professional edge..", 'pitch');
	
	$content['buy_url'] = 'http://siteorigin.fetchapp.com/sell/uyeenaiv';
	$content['buy_price'] = '15';
	$content['variable_pricing'] = array(
		array(10, __("If you're creating your site on a budget.", 'pitch')),
		array(15, __("A fair price.", 'pitch')),
		array(25, __("If you really like what we have to offer and want great support.", 'pitch')),
	);
	$content['buy_message_1'] = __("Get awesome features and support the future development of Pitch.", 'pitch');

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __('Sprite Maps', 'pitch'),
		'content' => __("If you're targeting a perfect Google PageSpeed score and all the SEO benefits it brings, then sprite maps are essential. They'll make your site load faster and put less load on your servers - saving you cash.", 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Contact Form 7 Integration', 'pitch'),
		'content' => sprintf(__('Pitch Premium includes CSS and formatting code to make your <a href="%s">Contact Form 7</a> forms fit right in to the look and feel of Pitch.', 'pitch'), 'http://wordpress.org/extend/plugins/contact-form-7/'),
	);

	$content['features'][] = array(
		'heading' => __('Additional Widgets', 'pitch'),
		'content' => __('The social widget lets you list your social profiles in your sidebar or footer. The video widget lets you put a video in your sidebar.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Page Templates', 'pitch'),
		'content' => __('You also get the full width page template, with more templates coming soon.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Video Projects', 'pitch'),
		'content' => __("Need to show off a video as one of your projects? Pitch Premium lets you add the URL for any video sharing site. It automatically fetches the video's embed code and displays it in your project.	", 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Linkable Slider', 'pitch'),
		'content' => __('Pitch Premium lets you choose a destination post, page or project for each of your slider slides. This changes your homepage from something users just look at, into a gateway to the rest of your site.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('CSS Editor', 'pitch'),
		'content' => __('Pitch Premium comes with a built in CSS editing tool. This makes it easy to customize your design in a way that persists across theme updates.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'pitch'),
		'content' => __('Pitch premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Premium Support', 'pitch'),
		'content' => __("Need help setting up Pitch? Upgrading to Pitch Premium gives you email support.", 'pitch'),
	);
	
	$content['featured'] = array(
		get_template_directory_uri().'/upgrade/images/premium.jpg',
		1120, 1045
	);

	$content['testimonials'] = array(
		array(
			'gravatar' => 'ebac068ab617dd997bc701b0129f360c',
			'name' => 'Hosszu',
			'content' => __('I really like your theme, in fact I downloaded the paid version. It was worth it.', 'pitch'),
		),
		array(
			'gravatar' => '16efaafff8368e3c88af7ac8a279fb83',
			'name' => 'Markus',
			'content' => __('Hats off to you Greg, I’m loving the Pitch theme.', 'pitch'),
		),
		array(
			'gravatar' => '1cc1047a3c21a0a0341155e463be0969',
			'name' => 'Sormeh',
			'content' => __('This theme is incredible, cudos!!!', 'pitch'),
		),
		array(
			'gravatar' => 'e0b5df243a1e86e53704244138070560',
			'name' => 'Kate',
			'content' => __('Thank you for this amazing beautiful theme! I’m in love with it ;)', 'pitch'),
		),
		array(
			'gravatar' => 'ffcb9b3d2966afc7dc843e7f2007ca9c',
			'name' => 'Thaïs',
			'content' => __('Thank you for the good work you’re doing! I love your theme, and so far it does what it should, so I’m happy :)', 'pitch'),
		),
		array(
			'gravatar' => '65d7b3d30339c0a62265fc9528490c99',
			'name' => 'Delano Neeleman',
			'content' => __('I want to thank you for this amazing template. I have bought it and really like it.', 'pitch'),
		),
		array(
			'gravatar' => '9dea9cff32e4ffecf674c14f6cf743bf',
			'name' => 'Dave',
			'content' => __('Just wanted to say thanks for the great theme! It was a snap to setup and tweak to my needs. :)', 'pitch'),
		),
	);
	
	return $content;
}
add_filter('siteorigin_premium_content', 'pitch_premium_upgrade_content');

/**
 * Set which posts we want to enqueue the teaser scripts
 */
function pitch_premium_teaser_post_types(){
	siteorigin_premium_teaser_post_types(array('slide', 'project'));
}
add_action('after_setup_theme', 'pitch_premium_teaser_post_types');