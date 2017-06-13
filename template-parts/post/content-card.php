<article class="col-md-4 col-sm-6">
	<div class="card">
		<a href="<?php the_permalink(); ?>">
			<?php
			$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			$days = get_post_meta(get_the_ID(), 'course_days', true);
			$level = get_post_meta(get_the_ID(), 'course_level', true);
			$lectures = get_post_meta(get_the_ID(), 'course_lectures', true);
			$fallback_bg = get_theme_mod('alps_color');
			$bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;'; ?>
			<div class="card-header-img" style="<?php echo $bg; ?>"></div>
			<div class="card-content">
				<?php the_title('<h4>', '</h4>'); ?>
				<div class="card-meta-data">
					<?php if(!empty($lectures)): ?>
						<span class="tag is-primary"><?php echo ($lectures .' Lecture'. ($lectures > 1 ? 's' : '')); ?></span>
					<?php endif; ?>
					<?php if(!empty($days)): ?>
						<span class="tag is-warning"><?php echo ($days .' Session'. ($days > 1 ? 's' : '')); ?></span>
					<?php endif; ?>
					<?php if(!empty($level)): ?>
						<span class="tag is-light"><?php echo $level; ?> Level</span>
					<?php endif; ?>
				</div>
			</div>
		</a>
	</div>
</article>
