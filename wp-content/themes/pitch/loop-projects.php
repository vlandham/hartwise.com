<?php if(have_posts()) :  ?>
	<div id="projects" class="loop-projects">
		<?php while(have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
				<div class="wrapper">
					<a href="<?php the_permalink() ?>" class="image">
						<?php echo get_the_post_thumbnail(null, 'portfolio', array('class' => 'preload')); ?>
					</a>
					<div class="overlay">
						
					</div>
					<a href="<?php the_permalink() ?>" class="info">
						<h3><?php the_title() ?></h3>
						<p><?php echo siteorigin_setting('project_view_text', __('View Project', 'pitch')) ?></p>
					</a>
				</div>
			</div>
		<?php endwhile ?>
		<div class="clear"></div>
	</div>
<?php elseif (siteorigin_setting('general_demo_mode')) : get_template_part('demo/loop', 'projects') ?>
<?php endif; ?>