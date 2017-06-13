<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ALPS
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php echo do_shortcode('[wonderplugin_slider id=1]'); ?>
			<?php include_once('about.php'); ?>
			<section class="container-fluid">
				<?php
					$services_img = get_theme_mod('alps_services_img');
					$services_bg = 'background: url('.$services_img.') no-repeat center; background-size: cover;';
					$services_repeatable = get_theme_mod('alps_about_page_second_repeatable');
					if(!empty($services_repeatable)) :?>
						<div class="row services-section" style="<?php echo $services_bg; ?>">
							<h1 class="services-header text-light">Services
								<hr class="aligncenter custom-hr"/>
							</h1><?php
							$services_repeatable_decoded = json_decode($services_repeatable);
							foreach($services_repeatable_decoded as $item) : ?>
								<div class="col-lg-4 col-md-4 services-black">
									<div class="services-content aligncenter">
										<h2 class="text-light"><?php echo $item->title; ?></h2>
										<h3 class="text-light"><?php echo $item->subtitle; ?></h3>
										<?php echo $item->text; ?>
										<br/><br/>
										<a href="<?php echo $item->link; ?>" class="button button-plain button-border">
											<?php echo $item->shortcode; ?>
										</a>
									</div>
								</div><!-- services-public-course-->
							<?php endforeach; ?>
						</div><!-- services-section-->
					<?php endif; ?>
			</section> <!-- Services -->
			
			<section class="container">
					<?php
					$query = new WP_Query(array (
						'post_type' => 'public-course',
						'meta_query'  => array(
								 array(
									 'key' => 'course_featured',
									 'value' => 'True'
								 )
							 )
					));
					if($query->have_posts()):
					?>
					<div class="featured-container">
						<h2>Featured Public Courses</h2>
						<?php
							while($query->have_posts()) :
								$query->the_post();
								$days = get_post_meta(get_the_ID(), 'course_days', true);
								$level = get_post_meta(get_the_ID(), 'course_level', true);
								$lectures = get_post_meta(get_the_ID(), 'course_lectures', true);
								get_template_part('template-parts/post/content', 'search');
							endwhile; ?>
						<a class="button button-plain button-border button-inverse button-pill alignright ellipsis" href="<?php echo esc_url(home_url( '/public-courses' )); ?>">View all Public Courses</a>
					</div>
				  	<?php endif; ?>
					<?php
					$query = new WP_Query(array (
						'post_type' => 'in-house-training',
						'meta_query'  => array(
								 array(
									 'key' => 'course_featured',
									 'value' => 'True'
								 )
							 )
					));
					if($query->have_posts()):
					?>
					<div class="featured-container">
						<h2>Featured In-House Training</h2>
						<?php
							while($query->have_posts()) :
								$query->the_post();
								$days = get_post_meta(get_the_ID(), 'course_days', true);
								$level = get_post_meta(get_the_ID(), 'course_level', true);
								$lectures = get_post_meta(get_the_ID(), 'course_lectures', true);
								get_template_part('template-parts/post/content', 'search');
								endwhile; ?>
						<a class="button button-plain button-border button-inverse button-pill alignright ellipsis" href="<?php echo esc_url(home_url( '/in-house-training' )); ?>">View all In-House Courses</a>
					</div>
					<?php endif; ?>
			</section> <!-- Featured Courses -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
