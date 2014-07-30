<?php get_header(); the_post(); global $post; ?>

<div id="post-single" <?php post_class() ?>>
	<div class="container">
		<?php get_template_part('project', 'images') ?>

		<div id="project-info">
			<div class="separator first"></div>
			<h1><?php the_title() ?></h1>
			<div class="separator"></div>

			<?php if(!empty($post->post_excerpt)) : ?>
				<p class="excerpt"><?php the_excerpt() ?></p>
				<div class="separator light"></div>
			<?php endif; ?>

			<?php if(siteorigin_setting('project_tags')) : $terms = wp_get_post_terms($post->ID, 'skill'); if(!empty($terms)) :  ?>
			<div class="skills">
				<strong><?php _e('Skills', 'pitch') ?>: </strong>
				<?php foreach($terms as $i => $term) : if($i == 0) $main_skill = $term; ?>
				<a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo $term->name ?></a><?php if($i != count($terms) - 1) echo ', ' ?>
				<?php endforeach ?>
			</div>
			<div class="separator light"></div>
			<?php endif; endif; ?>

			<?php if(!empty($post->post_content)) : ?>
			<div class="content entry-content"><?php the_content() ?></div>
			<div class="separator light"></div>
			<?php endif; ?>

		</div>

		<div class="clear"></div>

		<?php if(!empty($main_skill)) : ?>
		<div id="related-projects">
			<?php
			pitch_display_loop(
				siteorigin_setting('project_related_title', __('Related Projects', 'pitch')),
				array(
					'posts_per_page' => 10,
					'post_type' => 'project',
					'post__not_in' => array($post->ID),
					'skill' => $main_skill->slug
				),
				'related'
			);
			?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>