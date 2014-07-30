<?php
$features = new WP_Query(array(
	'numberposts'     => -1,
	'nopaging'     => true,
	'post_type' => 'feature',
	'orderby' => 'menu_order',
	'order' => 'ASC'
));

?>

<?php if($features->have_posts()) : ?>
	<div id="site-features">
		<div class="container">
			<ul class="feature-list">
				<?php while($features->have_posts()) : $features->the_post(); global $post; ?>
					<?php if($features->current_post % 3 == 0 && $features->current_post != 0) : ?><li class="clear"></li><?php endif; ?>
					<li class="feature <?php if(floor($features->current_post / 3) == floor($features->post_count/3)) echo 'feature-lastrow' ?>">
						<div class="icon">
							<?php $the_icon = get_post_meta(get_the_ID(), 'feature_icon', true); ?>
							<?php if(!empty($the_icon)) : ?>
								<img src="<?php echo esc_url(get_template_directory_uri().'/images/icons/'.$the_icon.'.png') ?>" />
							<?php endif; ?>
						</div>
						<h3>
							<?php $url = get_post_meta(get_the_ID(), 'feature_url', true); if(!empty($url)) : ?><a href="<?php echo esc_url($url) ?>"><?php endif ?>
							<?php the_title() ?>
							<?php if(!empty($url)) : ?></a><?php endif ?>
						</h3>
						<div class="clear"></div>
						<?php the_excerpt() ?>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
<?php elseif(siteorigin_setting('general_demo_mode')) : get_template_part('demo/features') ?>
<?php endif; ?>