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
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', 'search' );
				endwhile;
			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif; ?>

			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
