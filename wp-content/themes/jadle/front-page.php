<?php
// Bring your own comments.
global $post;

add_filter('body_class', function() {

	$classes[] = 'home';
	return $classes;

});

new _Container('Home_Service', $post->ID);
