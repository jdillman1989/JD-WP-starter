<?php
/**
 * Template Name: About
 */
global $post;

add_filter('body_class', function() {

	$classes[] = 'about';
	return $classes;
});

new _Container('About_Service', $post->ID);
