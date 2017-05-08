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
		<a class="row card" href="<?php the_permalink(); ?>">
			<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			$bg = 'background: #777 url('.$url.') no-repeat center; background-size: cover; background-blend-mode: multiply;'; ?>
			<div class="col-lg-3 col-md-4 col-sm-5 img-responsive" style="<?php echo $bg; ?>"></div>
			<div class="col-lg-9 col-md-8 col-sm-7 card-content">
				<?php $course_outline = get_post_meta(get_the_ID(), 'course_days_spinner', true);?>
				<?php the_title('<h4 class="card-title title is-3">' . $lorem, '</h4>');?>
				<p class="card-excerpt hidden-xs"><?php echo get_the_content(); ?></p>
				<div class="card-meta-data">
			    	<span class="tag is-warning"><?php echo $course_outline; ?> Session</span>
					<span class="tag is-primary">10 Lesson</span>
					<span class="tag is-light">Intermediate Level</span>
				</div>
			</div>
		</a>
	</article><!-- #post-## -->
