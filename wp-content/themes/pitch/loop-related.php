<?php if($GLOBALS['pitch_loop']['query']->have_posts()) : ?>
<div class="home-loop">
	<div class="container">
		<?php if($GLOBALS['pitch_loop']['query']->post_count > 4) : ?>
		<div class="nav">
			<a href="#previous" class="prev"><?php _e('previous', 'pitch') ?></a>
			<a href="#next" class="next"><?php _e('next', 'pitch') ?></a>
		</div>
		<?php endif; ?>
		<h3><?php echo esc_html($GLOBALS['pitch_loop']['title']) ?></h3>
		<div class="post-list-wrapper">
			<ul class="post-list">
				<?php while($GLOBALS['pitch_loop']['query']->have_posts()) : $GLOBALS['pitch_loop']['query']->the_post(); $type = get_post_type_object(get_post_type()) ?>
				<li <?php post_class(array('post')) ?>>

					<?php if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } ?>
					<?php if(has_post_thumbnail()) : ?>
					<?php echo get_the_post_thumbnail(get_the_ID(), 'home-loop') ?>
					<?php else : ?>
					<div class="placeholder"></div>
					<?php endif; ?>
					<?php if($type->public) echo '</a>' ?>

					<?php if(get_post_type() != 'client') : ?>
					<?php if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } ?>
					<h4><?php the_title() ?></h4>
					<?php if($type->public) echo '</a>' ?>
					<?php endif ?>

					<?php if(!empty($GLOBALS['post']->post_excerpt)) : ?>
						<?php the_excerpt() ?>
					<?php endif; ?>

				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); endif; ?>