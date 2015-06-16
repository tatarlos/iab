<nav >
 <ul class="clearfix">

    <li><a href="<?php echo bloginfo('url')?>/news">NEWS</a></li>
    <li><a href="<?php echo bloginfo('url')?>/events">EVENTS</a></li>
    <li><a href="<?php echo bloginfo('url')?>/resources">RESOURCES</a></li>
    <li><a href="<?php echo bloginfo('url')?>/members">MEMBERS</a></li>
    <li><a href="<?php echo bloginfo('url')?>/about">ABOUT IAB</a></li>
 </ul>
</nav>


<main class="wrapper clearfix">
    <h2><?php echo $eventsPod->field('title'); ?></h2>
    <div class="event">
     
        <?php  foreach(( $eventsPod->field('category')) as $category) {?>
        <a href="<?php echo bloginfo('url')."/".$category['slug']?>">
            <?php echo $category['name']."<br>"  ?>
        </a>

        <?php } ?>
        
        <?php
            $cats = $eventsPod->field($type);
            if ( is_array($cats) ){
                
                $catLen = sizeof($cats);
                
                for($i = $catLen-1; $i >= 0; $i--){
                    echo ($cats[$i]." ");
                }

            }else{
                echo $cats;
            }

            $postId = $eventsPod->field('ID');
            $image_id = get_post_thumbnail_id($postId);
            // echo "<br>Categories: ".$eventsPod->display('category')."<br>";          
            // $categories = wp_get_object_terms($postId,'category');


            $image = wp_get_attachment_image_src($image_id,'large');
            $image_url = $image[0];             
        ?>

         <img src="<?php echo $image_url; ?>" alt=""/>
         <?php echo wpautop($eventsPod->field('content')); ?>
    </div>

</main> 