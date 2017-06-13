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
			<section class="text-center">
				<header class="container">
					<?php $logo = get_theme_mod( 'alps_logo' );?>
					<a class="site-link" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?>">
						<img class="site-logo" src="<?php echo $logo; ?>" alt="<?php bloginfo( 'title' ); ?>"/>
					</a>
					<h1 class="page-title"><i class="fa fa-frown-o" aria-hidden="true"></i><?php esc_html_e( ' Oops! That page can&rsquo;t be found.', 'alps' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content container">
					<p>The link you clicked may be broken or the page may have been removed.</p>
					<p>Visit the <a href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?> Homepage">Homepage</a> or <a href="<?php echo esc_url(home_url( '/contact-us' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?> Contact Us Page">Contact Us</a> about the problem.</p>
					<p class="error-404">404</p>
				</div><!-- .page-content -->
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer('404');
