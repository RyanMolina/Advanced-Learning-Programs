<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ALPS
 * @author Me
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
	<header id="masthead" class="site-header drawer-navbar" role="banner">
        <div class="drawer-container">
            <div class="drawer-navbar-header hidden-print">
                <!-- TODO: Remove this later -->
                <a class="drawer-brand" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?>">ALPrograms</a>
                <button type="button" class="drawer-toggle drawer-hamburger" aria-controls="main-menu" aria-expanded="false">
                    <span class="screen-reader-text"><?php esc_html_e( 'Toggle Navigation', 'alps' ); ?></span>
                    <span class="drawer-hamburger-icon"></span>
                </button>
            </div><!--.drawer-navbar-header-->

            <div class="header-container">
                <div class="site-brand">
                    <?php $logo = get_theme_mod( 'alps_logo' ); ?>
                    <a class="site-link" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?>">
                        <img class="site-logo" src="<?php echo $logo; ?>" alt="<?php bloginfo( 'title' ); ?>"/>
                    </a>
                </div><!--.site-brand-->
                <div class="site-contact-info">
                    <p class="contact-number"><?php echo get_theme_mod('alps_contact_number'); ?></p>
                    <a href="mailto:support@alprograms.com" class="contact-email"><?php echo get_theme_mod('alps_email_address'); ?></a>
                </div><!--.site-contact-info-->
            </div><!--.header-container-->

            <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>

        </div><!--.drawer-container-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
