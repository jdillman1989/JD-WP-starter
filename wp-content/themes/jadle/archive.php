<?php
add_filter('body_class', function() {

	$classes[] = 'category-landing';

	return $classes;

});

new _Container('Archive_Service');
