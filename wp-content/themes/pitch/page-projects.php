<?php
/*
Template Name: Project Archive
*/

global $wp_query;
query_posts(array(
	'post_type' => 'project',
	'paged' => $wp_query->get('paged'),
));
get_template_part('archive', 'project');