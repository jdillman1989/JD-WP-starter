<?php
class Archive_Service {

	public $data;

	public function __construct($data, $post_id="", $extra_data="") {

		$this->data = $data;

		$this->load_view();

	}

	public function load_view() {

		$context = Timber::get_context();
		$context['posts'] = Timber::get_posts();

		$context['images_uri'] = _images_uri;

		$context['options_title'] = get_field('archive_options_title', 'option');
		$context['options_description'] = get_field('archive_options_description', 'option');

		foreach($context['posts'] as $post) {

			$post_title = get_field('title', $post->ID);
			$post_image = get_field('image', $post->ID);
			$post_excerpt = get_field('excerpt', $post->ID);

			$post_data[] = array(
				'title' => $post_title,
				'excerpt' => $post_excerpt,
				'image' => $post_image,
				'permalink' => get_permalink($post->ID)
			);
		}

		$context['post_data'] = $post_data;

		Timber::render( theme_views . '/archive.twig', $context);
	}
}
