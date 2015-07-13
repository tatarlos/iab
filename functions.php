<?php
add_filter( 'login_redirect', create_function( '$url,$query,$user', 'return home_url();' ), 10, 3 );
//[blog url]
function bloginfo_short(){
	$info = get_bloginfo('url');
	return $info;
}
add_shortcode( 'infoURL', 'bloginfo_short' );

add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items.get_search_form();

    return $items;
}

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
	

	add_action('wp_ajax_getFilteredPosts', 'getFilteredPosts');
	add_action('wp_ajax_nopriv_getFilteredPosts', 'getFilteredPosts');

	 add_action('wp_ajax_addToCart', 'addToCart');
	 add_action('wp_ajax_nopriv_addToCart', 'addToCart');
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
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function getFilteredPosts(){
	$postType = $_POST['post'];
	$taxonomy = $_POST['tax'];
	$term = $_POST['term'];
	$id = $_POST['id'];
	$sub = $_POST['sub'];
	
	if($term === "all"){
		$args = array('post_type' => $postType, );
	}else{
		$args = array(
		  'post_type' => $postType,
		  'tax_query' => array(
		    array(
		      'taxonomy' => $taxonomy,
		      'field'    => 'slug',
		      'terms'    => $term,
		    ),
		  ),
		);
	}
	$loop = new WP_Query( $args );
?>
<?php
if($sub === "0"):
	if ($postType ==="resources" ) :  
		$subset = get_terms($taxonomy, array('orderby' => 'name', 'hide_empty' => 0, 'child_of'=>$id ));

?>
<?php if ($term === "all"): ?>
	<select id ="selection" style ="display:none">
<?php else: ?>
	<select id ="selection" style ="display:show">
<?php endif ?>
	<option value="<?php echo $term->slug ?>">All Results</option>
	<?php
	    foreach ( $subset as $term ) : ?>  
		    <option value="<?php echo $term->slug ?>" class ="options">
		    <a href="#" data-term="<?php echo $term->slug ?> "data-taxonomy="<?php echo $taxonomy ?>" data-post-type="<?php echo $permalink ?>" class="filtering-links"><?php echo $term->name; ?></a>
		    </option>
	   	<?php endforeach;?> 

	</select>
<?php endif; ?>

 <div class="grid-items-lines">
<?php endif; ?>
<?php

	if($loop->have_posts()):

	while ( $loop->have_posts() ) : $loop->the_post();
?>
	<a href="<?php echo the_permalink();?>" class="grid-item-big">
	    <?php 
	        $postId = get_the_ID();
	        $image_id = get_post_thumbnail_id($postId);
	        $image = wp_get_attachment_image_src($image_id);
	        $image_url = $image[0];             
	    ?>
	    <img src="<?php echo $image_url; ?>" alt="">

	    <h2>
	    <?php echo wp_trim_words(get_the_title(), 2); ?>
	    </h2>
	    <p><?php echo wp_trim_words(get_the_content(),10); ?></p>
	    <div class="meta">
	      <p>
	        <?php 
	              $time =strtotime(get_the_date()) ;
	              echo(gmdate('D, d M Y', $time));
	          ?>
	      </p>
	      <p>Resources > Case Studies</p>
	    </div>
	</a>
<?php
	endwhile;
?>
            <div class="right-cover"></div>
            <div class="bottom-cover"></div>
        </div>
 <?php 
	endif;
	exit;
}

function addToCart(){
	$id = $_POST['id'];
	$cost = $_POST['cost'];
	$date = $_POST['date'];
	$cartItem = array('id'=>$id , 'cost'=> $cost, 'date' => $date);

	
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	$_SESSION['cart'][] = $cartItem;

	exit;
}


?>