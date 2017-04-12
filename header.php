<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ALPS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alps' ); ?></a>
	<header id="masthead" class="site-header left" role="banner">
        <div class="bottom-header">
        <div class="ed-container">
            <div class="site-branding">
                <div class="site-logo">
                    <a class="custom-logo-link" href="<?php echo get_home_url(); ?>" rel="home">
                        <img class="custom-logo" src="<?php echo get_theme_mod( 'alps_logo' ); ?>" alt="<?php bloginfo( 'title' ); ?>" />
                    </a>
                </div> <!--.site-logo-->
            </div> <!--.site-branding-->

            <div class="wrap-right">
                <div class="header-call-to">
                    <p>
                        <?php echo get_theme_mod( 'alps_contact_number' ); ?>
                    </p>
                    <a href="#">
                        <i class="fa fa-mobile"></i>
                        <?php echo get_theme_mod( 'alps_email_address'); ?>
                    </a>
                </div>
            </div> <!--.contact-block-->
        </div><!--.header-container-->
        <div class="menu-wrap">
            <div class="ed-container">

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-store' ); ?></button>
                    <div class="close"> &times; </div>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->

                <div class="header-search">
                    <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    <div class="search-box">
                        <div class="close"> &times; </div>
                        <?php get_template_part('searchform-header'); ?>
                    </div>
                </div> <!--  search-form-->
            </div><!--.header-container-->
        </div><!--.header-menu_wrap-->
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
