<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ALPS
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function alps_body_classes( $classes ) {
	$classes[] = 'drawer drawer--left';
	return $classes;
}
add_filter( 'body_class', 'alps_body_classes' );

// function alps_post_classes( $classes ) {
// 	$classes[] = 'col'
// }
// add_filter('post_class','alps_post_classes');
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function alps_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'alps_pingback_header' );
