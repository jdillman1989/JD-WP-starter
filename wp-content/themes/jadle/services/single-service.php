<?php
class Single_Service {

	public $data;
	public $post_id;

	public function __construct($data, $post_id="", $extra_data="") {

		$this->data = $data;
		$this->post_id = $post_id;

		$this->load_view();

	}

	public function load_view() {

		$context = Timber::get_context();

		$context['data'] = $this->data;
		$context['images_uri'] = _images_uri;
		$context['blog_url'] = _blog_url;

		// // Example social media share link
		//$context['post'] = get_post($this->post_id);
		//$context['social_url'] = urlencode(get_permalink($context['post']->ID));

		Timber::render( theme_views . '/single.twig', $context);

	}


}
