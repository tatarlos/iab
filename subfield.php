<?php
/*
template Name:All SubNav template
*/ 
?>
<?php get_header(); ?> 

<?php 

//query parameters
$params = array( 
    "limit" => -1,
    );
$permalink = pods_v('last','url');
//creates pod object and loads data
$subpod = pods($permalink,$params); 

?>

    <main class="wrapper clearfix">
        <div class="section-container">
            <h2 class="section-title">All Events</h2>

           
           <?php while ($subpod->fetch()): ?>
            <a href="<?php echo $subpod->field('permalink')?>">
                <div class="event">
                    <h2><?php echo $subpod->field('title'); ?></h2>
                    <p><?php $subpod->field('thumbnail'); ?></p>
                    <p>
                        
                    <?php 
                        $postId = $subpod->field('ID');
                        $image_id = get_post_thumbnail_id($postId);
                        $image = wp_get_attachment_image_src($image_id);
                        $image_url = $image[0];             
                    ?>
                    <img src="<?php echo $image_url; ?>" alt=""/>
                    </p>
                 
                    <?php echo wp_trim_words($subpod->field('content'),20); ?> 
         
                </div>
            </a>
            <?php endwhile;?>
        </div>
    </main>
<?php get_footer(); ?> 

