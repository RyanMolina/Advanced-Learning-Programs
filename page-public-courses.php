<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ALPS
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php
			while(have_posts()): the_post();
				get_template_part( 'template-parts/page/content', 'all-courses');
			endwhile;?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
