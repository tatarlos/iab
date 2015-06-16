<?php 

	add_image_size('featured',400,920,true);
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size(200,200, array( 'center', 'center'));

	add_action('init', 'my_custom_init');
	function my_custom_init() {
		add_post_type_support( 'events', 'excerpt' );
		add_post_type_support( 'events', 'comments');
		add_post_type_support( 'events', 'thumbnail' );
		// add_post_type_support( 'events', 'post-formats' );


		add_post_type_support( 'news', 'excerpt' );
		add_post_type_support( 'news', 'thumbnail' );
		add_post_type_support( 'news', 'comments');
		// add_post_type_support( 'news', 'post-formats' );


		add_post_type_support( 'resources', 'excerpt' );
		add_post_type_support( 'resources', 'thumbnail' );
		add_post_type_support( 'resources', 'comments');
		// add_post_type_support( 'resources', 'post-formats' );
	}

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

?>