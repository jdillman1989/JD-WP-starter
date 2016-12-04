<?php
class About_Service {

	public $data;

	public function __construct($data, $post_id="", $extra_data="") {

		$this->data = $data;

		$this->load_view();

	}

	public function load_view() {

		$context = Timber::get_context();
		$context['data'] = $this->data;
		$context['images_uri'] = _images_uri;

		// // Reference ACF fields directly in service
		//$context['start_date'] = $this->data['start_date'];

		Timber::render( theme_views . '/about.twig', $context);
	}
}
