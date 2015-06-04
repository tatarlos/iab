<?php
/*
template Name:Single article single template
*/ 
$permalink = pods_v('last','url');

$cat = pods_v(-2,'url');

//query parameters
//creates pod object and loads data
$articlePod = pods($cat,$permalink);
?>


<?php get_header(); ?>



<main class="wrapper clearfix">
    <h2><?php echo $articlePod->field('title'); ?></h2>
    <div class="event">
     
        <?php  foreach(( $articlePod->field('category')) as $category) {?>
        <a href="<?php echo bloginfo('url')."/".$category['slug']?>">
            <?php echo $category['name']."<br>"  ?>
        </a>

        <?php } ?>
        <?php 
            $postId = $articlePod->field('ID');
            $image_id = get_post_thumbnail_id($postId);
            // echo "<br>Categories: ".$eventsPod->display('category')."<br>";          
            // $categories = wp_get_object_terms($postId,'category');


            $image = wp_get_attachment_image_src($image_id,'large');
            $image_url = $image[0];             
        ?>

         <img src="<?php echo $image_url; ?>" alt=""/>
         <?php echo wpautop($articlePod->field('content')); ?>
    </div>

</main> 
	
<?php get_footer(); ?>
