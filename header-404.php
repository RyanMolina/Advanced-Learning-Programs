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
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msapplication-tap-highlight" content="no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alps' ); ?></a>
    <div id="content" class="site-content">
