<?php

$slides = new WP_Query(array(
	'numberposts' => siteorigin_setting('slider_max_slides'),
	'nopaging'     => true,
	'post_type' => 'slide',
	'orderby' => 'menu_order',
	'order' => 'ASC'
));

if($slides->have_posts()){
	?>
	<div id="slider">
		<div class="container">
			<div class="slides nivoSlider">
				<?php while ($slides->have_posts()) : $slides->the_post(); if(has_post_thumbnail()) :  ?>
				
					<?php if(get_post_meta(get_the_ID(), 'slide_destination', true)) : $destination = get_post_meta(get_the_ID(), 'slide_destination', true) ?>
						<?php echo '<a href="'.esc_url(get_permalink($destination)).'" title="'.esc_attr(get_the_title($destination)).'">' ?>
					<?php elseif(get_post_meta(get_the_ID(), 'slide_destination_url', true)) : $destination = get_post_meta(get_the_ID(), 'slide_destination_url', true) ?>
						<?php echo '<a href="'.esc_url($destination).'">' ?>
					<?php endif; ?>
					<?php echo get_the_post_thumbnail(get_the_ID(), 'slide') ?>
					<?php if(!empty($destination)) echo '</a>' ?>
				<?php endif; endwhile; ?>
			</div>
			
			<?php $slides->rewind_posts(); ?>
		
			<div class="indicators-wrapper">
				<ul class="indicators">
					<?php while ($slides->have_posts()) : $slides->the_post(); if(has_post_thumbnail()) :  ?>
					<li class="indicator <?php if($slides->current_post == 0) echo 'active' ?> indicator-group-<?php echo $slides->post_count ?>">
						<div class="indicator-container">
							<div class="pointer"></div>
							<h4><?php the_title() ?></h4>
							<?php the_excerpt() ?>
						</div>
					</li>
					<?php endif; endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php
	wp_reset_postdata();
}
else{
	get_template_part('demo/slider');
}