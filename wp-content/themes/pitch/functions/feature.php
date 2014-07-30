<?php

/**
 * Initialize the feature type
 *
 * @action init
 */
function pitch_feature_init(){
	$labels = array(
		'name' => _x('Features', 'post type general name', 'pitch'),
		'singular_name' => _x('Feature', 'post type singular name', 'pitch'),
		'add_new' => _x('Add New', 'feature', 'pitch'),
		'add_new_item' => __('Add New Feature', 'pitch'),
		'edit_item' => __('Edit Feature', 'pitch'),
		'new_item' => __('New Feature', 'pitch'),
		'all_items' => __('All Features', 'pitch'),
		'view_item' => __('View Feature', 'pitch'),
		'search_items' => __('Search Features', 'pitch'),
		'not_found' =>  __('No features found', 'pitch'),
		'not_found_in_trash' => __('No features found in Trash', 'pitch'),
		'parent_item_colon' => '',
		'menu_name' => __('Features', 'pitch')
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'register_meta_box_cb' => 'pitch_feature_metabox_init',
		'supports' => array( 'title', 'excerpt', 'page-attributes'),
	);

	register_post_type('feature', $args);
}
add_action('init', 'pitch_feature_init');

/**
 * Add the metaboxes for the feature post type
 * 
 * @action add_meta_boxes
 */
function pitch_feature_metabox_init(){
	add_meta_box('feature-icon', __('Feature Icon', 'pitch'), 'pitch_feature_metabox_render', 'feature', 'side');
	add_meta_box('feature-url', __('Feature URL Destination', 'pitch'), 'pitch_feature_metabox_url_render', 'feature', 'side');
}

/**
 * Render the metabox
 */
function pitch_feature_metabox_render($post){
	$icons = glob(get_template_directory().'/images/icons/*.png');
	$icons = array_map('basename', $icons);
	$current = get_post_meta($post->ID, 'feature_icon', true);
	if(empty($current)) $current = '';
	
	?><select name="post_feature_icon"><option value="" <?php selected($current, '') ?>><?php _e('None', 'pitch') ?></option><?php
	foreach($icons as $icon){
		$name = substr($icon, 0, strlen($icon) - 4);
		?><option value="<?php echo esc_attr($name) ?>" <?php selected($current, $name) ?>><?php echo ucwords(str_replace('-', ' ', $name)) ?></option><?php
	}
	?></select><?php
	
	wp_nonce_field('save', '_feature_nonce');
}

function pitch_feature_metabox_url_render($post){
	?>
	<p><strong><label><?php _e('Feature URL Destination', 'pitch') ?></label></strong></p>
	<p><input type="text" class="widefat" name="post_feature_url" value="<?php echo esc_attr(get_post_meta($post->ID, 'feature_url', true)) ?>" /> </p>
	<?php
}

/**
 * Update the post feature icon.
 * @param $post_id
 * @action save_post
 */
function pitch_feature_save_post($post_id){
	if(wp_is_post_revision($post_id)) return;
	if(empty($_REQUEST['_feature_nonce']) || !wp_verify_nonce($_REQUEST['_feature_nonce'], 'save')) return;
	
	update_post_meta($post_id, 'feature_icon', $_REQUEST['post_feature_icon']);
	update_post_meta($post_id, 'feature_url', stripslashes($_REQUEST['post_feature_url']));
}
add_action('save_post', 'pitch_feature_save_post');