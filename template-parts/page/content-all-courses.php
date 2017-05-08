<?php
$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$bg = 'background: #777 url('.$url.') no-repeat center; background-size: cover; background-blend-mode: multiply;';
$page = get_page_by_title(get_the_title());
$content = apply_filters('the_content', $page->post_content);
?>
<div class="section-header overlay--dark" style="<?php echo $bg; ?>">
	<div class="container">
		<div class="section-header-content">
			<h1 class="title has-text-white is-1 has-text-shadow"><?php the_title(); ?></h1>
			<h2 class="subtitle has-text-white is-5 has-text-shadow"><?php echo $content; ?></h2>
		</div>
	</div>
</div>
<section class="container">
	<div class="row">
	<?php
	if(get_the_title() == "Public Courses") {
		$type = 'public-course';
	}
	elseif (get_the_title() == "In-House Training") {
		$type = 'in-house-course';
	}
	$post_type = array('post_type' => $type);
	$courses_query = new WP_query($post_type);
	while( $courses_query->have_posts()):
		$courses_query->the_post();
		get_template_part( 'template-parts/post/content', 'card');
	endwhile;?>
	</div>
</section>
