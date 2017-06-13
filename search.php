<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ALPS
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<div class="container">
					<h1 class="page-title has-text-dark"><?php printf( esc_html__( 'Search Results for: "%s"', 'alps' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
			</header><!-- .page-header -->
			<?php
			if ( have_posts() ) : ?>
			<div class="container">
				<?php
				$types = array(
					array('type' => 'public-course', 'title' => 'Public Course'),
					array('type' => 'in-house-training', 'title' => 'In-House Training')
				);
				foreach($types as $type):
					/* Start the Loop */
					$post_type = array('post_type' => $type['type'], 'post_status' => 'publish', 'posts_per_page'=>-1, 'order' => 'asc', 'orderby' => 'post-date', 's' => get_search_query() );
					$courses_query = new WP_query($post_type);
					if($courses_query->have_posts()):
					?>
						<h1><?php echo $type['title']; ?></h1>
						<?php 
						while( $courses_query->have_posts()):
							$courses_query->the_post();
							get_template_part( 'template-parts/post/content', 'search' );
						endwhile;
					endif;
				endforeach;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif; ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
