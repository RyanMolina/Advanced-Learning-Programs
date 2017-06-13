<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ALPS
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row card">
			<a href="<?php the_permalink(); ?>">
				<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				$days = get_post_meta(get_the_ID(), 'course_days', true);
				$level = get_post_meta(get_the_ID(), 'course_level', true);
				$lectures = get_post_meta(get_the_ID(), 'course_lectures', true);
				$fallback_bg = get_theme_mod('alps_color');
				$bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;'; ?>
				<div class="col-lg-3 col-md-4 col-sm-5 card-header-img" style="<?php echo $bg; ?>"></div>
				<div class="col-lg-9 col-md-8 col-sm-7 card-content">
					<?php the_title('<h4 class="word-break ellipsis-two-lines">', '</h4>');?>
					<p class="word-break"><?php echo get_the_excerpt(); ?></p>
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
	</article><!-- #post-## -->
