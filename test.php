
<main class="wrapper clearfix">
    <div class="section-container">
        <h2 class="section-title">Events</h2>

        <?php while ($eventsPod->fetch()): ?>
        <a href="<?php echo $eventsPod->field('permalink')?>">
            <div class="event">
                <h2><?php echo $eventsPod->field('title'); ?></h2>
                <p><?php $eventsPod->field('thumbnail'); ?></p>
                <p>
                    
                <?php 
                    $postId = $eventsPod->field('ID');
                    $image_id = get_post_thumbnail_id($postId);
                    $image = wp_get_attachment_image_src($image_id);
                    $image_url = $image[0];             
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>
                </p>
                 
                <?php echo wp_trim_words($eventsPod->field('content'),20); ?> 
            </div>
        </a>
        <?php endwhile;?>

        <h2 class="section-title">News</h2>

        
        <a href="<?php echo $newsPod->field('permalink')?>">
            <div class="event">
                <h2><?php echo $newsPod->field('title'); ?></h2>
                <p><?php $newsPod->field('thumbnail'); ?></p>
                <p>
                    
                <?php 
                    $postId = $newsPod->field('ID');
                    $image_id = get_post_thumbnail_id($postId);
                    $image = wp_get_attachment_image_src(($image_id),'featured');
                    $image_url = $image[0];             
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>
                </p>
   
             
                <?php echo wp_trim_words($newsPod->field('content'),20); ?> 
       
            </div>
        </a>
        

        <h2 class="section-title">Resources</h2>

        <?php while ($resourcesPod->fetch()): ?>
        <a href="<?php echo $resourcesPod->field('permalink')?>">
            <div class="event">
                <h2><?php echo $resourcesPod->field('title'); ?></h2>
                <p><?php $resourcesPod->field('thumbnail'); ?></p>
                <p>
                    
                <?php 
                    $postId = $resourcesPod->field('ID');
                    $image_id = get_post_thumbnail_id($postId);
                    $image = wp_get_attachment_image_src($image_id);
                    $image_url = $image[0];             
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>
                </p>
                <!-- <p><?php echo pods_image($eventsPod->field('featured_image'), 'large')?></p>  -->
             
                <?php echo wp_trim_words($resourcesPod->field('content'),20); ?> 
               <!--  <?php echo wpautop($eventsPod->field('content')); ?> -->
            </div>
        </a>
        <?php endwhile;?>
    </div> 
</main> 