<?php 

	add_image_size('featured',400,920,true);

	add_action('init', 'my_custom_init');
	function my_custom_init() {
		add_post_type_support( 'events', 'excerpt' );
		add_post_type_support( 'news', 'excerpt' );
		add_post_type_support( 'resources', 'excerpt' );
	}

	// An array of IDs of categories we want this post to have.
	$cat_ids = array( 1, 2 );

	/*
	 * If this was coming from the database or another source, we would need to make sure
	 * these where integers:

	$cat_ids = array_map( 'intval', $cat_ids );
	$cat_ids = array_unique( $cat_ids );

	 */

	$term_taxonomy_ids = wp_set_object_terms( 2, $cat_ids, 'category' );

	if ( is_wp_error( $term_taxonomy_ids ) ) {
		// There was an error somewhere and the terms couldn't be set.
	} else {
		// Success! The post's categories were set.
	}

?>