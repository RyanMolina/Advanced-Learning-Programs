<?php
$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$fallback_bg = get_theme_mod('alps_color');
$bg = 'background: '.$fallback_bg.' url('.$url.') no-repeat center; background-size: cover;';
$page = get_page_by_title(get_the_title());
$content = apply_filters('the_content', $page->post_content);
?>
<div class="jumbotron section-header" style="<?php echo $bg; ?>">
	<div class="container">
		<div class="text-light text-shadow section-header-content section-header-content--padding">
			<?php the_title('<h1>', '</h1>'); ?>
			<p><?php echo $content; ?></p>
		</div>
	</div>
</div>
<section class="container all-courses">
	<div class="row">
	<?php
	if(get_the_title() == "Public Courses") {
		$type = 'public-course';
	}
	elseif (get_the_title() == "In-House Training") {
		$type = 'in-house-training';
	}
	$post_type = array('post_type' => $type, 'post_status' => 'publish', 'posts_per_page'=>-1, 'order' => 'asc', 'orderby' => 'post-date');
	$courses_query = new WP_query($post_type);
	while( $courses_query->have_posts()):
		$courses_query->the_post();
		get_template_part( 'template-parts/post/content', 'card');
	endwhile;?>
	</div>
</section>
