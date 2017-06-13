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
<meta name="google-site-verification" content="9uumEKNWkcmzDMT4l-N4dHiaqwnKBZWPCxTOEoAPME8" />
<meta name="msvalidate.01" content="BEFA2FA2FCE4AFA1F89931A1827CBDA8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msapplication-tap-highlight" content="no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alps' ); ?></a>
	<header id="masthead" class="site-header drawer-navbar " role="banner">
        <div class="drawer-container">
            <div class="drawer-navbar-header ">
                <?php $nav_logo = get_theme_mod('alps_nav_logo');
                if(!empty($nav_logo)) :
                    $drawer_brand = '<img src="'.$nav_logo.'" alt="'.get_bloginfo('title').'" class="drawer-brand-img">';
                else :
                    $drawer_brand = '<h1 class="title is-6">'. get_bloginfo('title'). '</h1>';
                endif;?>
                <a class="drawer-brand" href="<?php echo esc_url(home_url( '/' )); ?>" rel="home" title="<?php bloginfo( 'title' ); ?>"><?php echo $drawer_brand; ?></a>
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
                    <?php
                    $phone = get_theme_mod('alps_phone_number');
                    $mobile = get_theme_mod('alps_mobile_number');
                    $email = get_theme_mod('alps_email_address');
                    if(!empty($phone)): ?>
                        <p class="contact-number"><i class="fa fa-phone" style="padding-right: 5px"></i><?php echo $phone; ?></p>
                        <?php 
                    endif;
                    if(!empty($mobile)): ?>
                        <p class="contact-number"><i class="fa fa-mobile" style="padding-right: 5px"></i><?php echo $mobile ?></p>
                    <?php
                    endif;
                    if(!empty($email)): ?>
                        <a href="mailto:<? echo $email; ?>" class="contact-email"><i class="fa fa-envelope" style="padding-right: 5px"></i><?php echo $email; ?></a>
                    <?php
                    endif;?>
                </div><!--.site-contact-info-->
            </div><!--.header-container-->
            <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
        </div><!--.drawer-container-->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
