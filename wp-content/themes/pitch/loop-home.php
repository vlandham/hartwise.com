<?php if($GLOBALS['pitch_loop']['query']->have_posts()) : ?>
	<div class="home-loop">
		<div class="container">
			<?php if($GLOBALS['pitch_loop']['query']->post_count > 4) : ?>
				<div class="nav">
					<?php if(!empty($GLOBALS['pitch_loop']['all_url'])) : ?>
						<a href="<?php echo esc_url($GLOBALS['pitch_loop']['all_url']) ?>" class="all"><?php echo !empty($GLOBALS['pitch_loop']['all_text']) ? $GLOBALS['pitch_loop']['all_text'] : __('All', 'pitch') ?></a>
					<?php endif; ?>
					<a href="#previous" class="prev"><?php _e('previous', 'pitch') ?></a>
					<a href="#next" class="next"><?php _e('next', 'pitch') ?></a>
				</div>
			<?php endif; ?>
			
			<h3><?php echo $GLOBALS['pitch_loop']['title'] ?></h3>
			<div class="post-list-wrapper">
				<ul class="post-list">
					<?php while($GLOBALS['pitch_loop']['query']->have_posts()) : $GLOBALS['pitch_loop']['query']->the_post(); $type = get_post_type_object(get_post_type()) ?>
						<li <?php post_class(array('post')) ?>>
							
							<?php
							if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } 
							elseif($post->post_type == 'client' && get_post_meta($post->ID, 'client_url', true)) { ?><a href="<?php echo esc_url(get_post_meta($post->ID, 'client_url', true)) ?>"><?php }
							?>
								<?php if(has_post_thumbnail()) : ?>
									<?php echo get_the_post_thumbnail(get_the_ID(), 'home-loop') ?>
								<?php else : ?>
									<span class="placeholder"></span>
								<?php endif; ?>
							<?php if($type->public || ($post->post_type == 'client' && get_post_meta($post->ID, 'client_url', true))) echo '</a>' ?>
							
							<?php if($post->post_type != 'client') : ?>
								<?php if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } ?>
								<h4><?php the_title() ?></h4>
								<?php if($type->public) echo '</a>' ?>
							<?php endif ?>
							
							<?php if(!empty($post->post_excerpt)) : ?>
								<p><?php echo $post->post_excerpt ?></p>
							<?php endif; ?>
							
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php if(!empty($GLOBALS['pitch_loop']['all_link_url'])) : ?>
				<div class="more-link">
					<a href="<?php echo esc_url($GLOBALS['pitch_loop']['all_link_url']) ?>"><?php echo !empty($GLOBALS['pitch_loop']['all_link_text']) ? $GLOBALS['pitch_loop']['all_link_url'] : __('All', 'pitch') ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php elseif(siteorigin_setting('general_demo_mode')) : ?>
	<?php
	global $wp_query;
	get_template_part('demo/homeloop', $GLOBALS['pitch_loop']['query']->get('post_type'));
	?>
<?php endif ?>