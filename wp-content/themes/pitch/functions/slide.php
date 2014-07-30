<?php

/**
 * Initialize Pitch's slide post type
 */
function pitch_slide_init(){
	$labels = array(
		'name' => _x('Slides', 'post type general name', 'pitch'),
		'singular_name' => _x('Slide', 'post type singular name', 'pitch'),
		'add_new' => _x('Add New', 'book', 'pitch'),
		'add_new_item' => __('Add New Slide', 'pitch'),
		'edit_item' => __('Edit Slide', 'pitch'),
		'new_item' => __('New Slide', 'pitch'),
		'all_items' => __('All Slide', 'pitch'),
		'view_item' => __('View Slide', 'pitch'),
		'search_items' => __('Search Slides', 'pitch'),
		'not_found' =>  __('No slides found', 'pitch'),
		'not_found_in_trash' => __('No slides found in Trash', 'pitch'),
		'parent_item_colon' => '',
		'menu_name' => __('Slides', 'pitch')
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
		'menu_icon' => get_template_directory_uri() . '/images/post-types/slider-small.png'
	);

	register_post_type('slide', $args);

	add_image_size('slide', 960, siteorigin_setting('slider_height'), true);
}
add_action('init', 'pitch_slide_init');

/**
 * @param $contextual_help
 * @param $screen_id
 * @param $screen
 */
function pitch_slide_help($contextual_help, $screen_id, $screen){
	if($screen->post_type == 'slide'){
		switch($screen->action){
			case 'add':
				$contextual_help = pitch_slide_help_display();
				break;
			default :
				$contextual_help = pitch_slide_help_display();
				break;
		}
	}
	return $contextual_help;
}
add_filter('contextual_help', 'pitch_slide_help', 10, 3);

/**
 * Return the help for overview of the project type.
 * @return string The help
 */
function pitch_slide_help_display(){
	return '<p>'. sprintf(__("Read <a href='%s'>Pitch's documentation</a> for help with adding slides.", 'pitch'), 'http://go.siteorigin.com/pitch-docs') .'</p>';
}

/**
 * Set up the placeholder metaboxes for Pitch's slide
 */
function pitch_add_slide_metabox(){
	add_meta_box(
		'pitch_slide_destination',
		__('Destination', 'pitch'),
		'pitch_slide_destination_metabox',
		'slide',
		'side'
	);
}
add_action('add_meta_boxes', 'pitch_add_slide_metabox');

/**
 * Show a placeholder metabox
 */
function pitch_slide_destination_metabox($post){
	siteorigin_premium_call_function(
		'pitch_premium_slide_destination_metabox',
		array($post),
		array('description' => __('Link this slide to a destination post or URL', 'pitch'))
	);
}