<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ALPS
 */
get_header('404'); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section>
				<header class="error-404-header container">
					<?php $logo = get_theme_mod( 'alps_logo' );?>
          <a class="site-link" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?>">
            <img class="site-logo img-centered" src="<?php echo $logo; ?>" alt="<?php bloginfo( 'title' ); ?>"/>
          </a>
					<h1 class="page-title title is-1 has-text-centered"><i class="fa fa-frown-o" aria-hidden="true"></i><?php esc_html_e( ' Oops! That page can&rsquo;t be found.', 'alps' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content container">
					<p class="title is-5 has-text-centered">The link you clicked may be broken or the page may have been removed.</p>
					<p class="subtitle is-6 has-text-centered">Visit the <a href="#">Homepage</a> or <a href="#">Contact Us</a> about the problem.</p>
					<div class="error-404 has-text-centered">404</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer('404');
