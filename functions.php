<?php 

	add_image_size('featured',400,920,true);
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size(200,200, array( 'center', 'center'));

	add_action('init', 'my_custom_init');
	function my_custom_init() {
		add_post_type_support( 'events', 'excerpt' );
		add_post_type_support( 'events', 'thumbnail' );
		add_post_type_support( 'events', 'post-formats' );


		add_post_type_support( 'news', 'excerpt' );
		add_post_type_support( 'news', 'thumbnail' );


		add_post_type_support( 'resources', 'excerpt' );
		add_post_type_support( 'resources', 'thumbnail' );
	}

?>