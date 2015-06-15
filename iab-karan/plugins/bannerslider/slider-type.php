<php
define('CPT_NAME', "Banner Slides");
define('CPT_SINGLE', "Banner Slide");
define('CPT_TYPE', "banner-slides");
 
add_theme_support('post-thumbnails', array('banner-slides'));

function ibs_register() { 
    $args = array( 
        'label' => __(CPT_NAME), 
        'singular_label' => __(CPT_SINGLE), 
        'public' => true, 
        'show_ui' => true, 
        'capability_type' => 'post', 
        'hierarchical' => false, 
        'rewrite' => true, 
        'supports' => array('title', 'editor', 'thumbnail') 
       ); 
   
    register_post_type(CPT_TYPE , $args ); 
} 
 
add_action('init', 'ibs_register');

?>