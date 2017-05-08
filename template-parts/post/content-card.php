<article class="col-md-4 col-sm-6">
	<a class="card" href="<?php the_permalink(); ?>">
		<?php
		$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		$days = get_post_meta(get_the_ID(), 'course_days', true);
		$level = get_post_meta(get_the_ID(), 'course_level', true);
		$lectures = get_post_meta(get_the_ID(), 'course_lectures', true);
		$bg = 'background: #777 url('.$url.') no-repeat center; background-size: cover;'; ?>
		<div class="img-responsive" style="<?php echo $bg; ?>"></div>
		<div class="card-content">
			<?php the_title('<h4 class="title is-4 card-title">', '</h4>'); ?>
			<div class="card-meta-data">
				<span class="tag is-primary"><?php echo $lectures; ?> Lecture</span>
				<span class="tag is-warning"><?php echo $days; ?> Session</span>
				<span class="tag is-light"><?php echo $level; ?> Level</span>
			</div>
		</div>
	</a>
</article>
