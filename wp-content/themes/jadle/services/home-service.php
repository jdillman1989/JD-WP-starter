<?php
class Home_Service {

	public $data;

	public function __construct($data, $post_id="", $extra_data="") {

		$this->data = $data;

		$this->load_view();

	}

	public function load_view() {

		$context = Timber::get_context();
		$context['data'] = $this->data;
		$context['images_uri'] = _images_uri;

		//// Example post query on homepage
		// $event_data = array();

		// $event_args = array(
		// 	'post_type' => 'news',
		// 	'posts_per_page' => -1,
		// 	'tax_query' => array(
		// 		array(
		// 			'taxonomy' => 'category',
		// 			'field' => 'slug',
		// 			'terms' => 'events'
		// 		)
		// 	),
		// 	'meta_key' => 'start_date',
		// 	'orderby' => 'meta_value_num',
		// 	'order' => 'ASC'
		// );

		// $events = get_posts($event_args);

		// if( $events ) {
		// 	foreach($events as $event) {

		// 		$event_start = get_field('start_date', $event->ID);
		// 		$event_end = get_field('end_date', $event->ID);
		// 		$event_image = get_field('event_image', $event->ID);

		// 		if( !$event_end ) {
		// 		    $event_end = $event_start;
		// 		}

		// 		$today_start = strtotime('today midnight');

		// 		if (strtotime($event_end) > $today_start) {

		// 			$event_description = get_the_excerpt($event->ID);
		// 			$event_location = get_field('event_location', $event->ID);

		// 			$event_data[] = array(
		// 				'title' => $event->post_title,
		// 				'description' => $event_description,
		// 				'location' => $event_location,
		// 				'image' => $event_image,
		// 				'permalink' => get_permalink($event->ID)
		// 			);

		// 			break;
		// 		}
		// 	}
		// }

		// $context['event_data'] = $event_data;

		Timber::render( theme_views . '/home.twig', $context);
	}
}
