<?php get_header(); ?> 

<?php 

//query parameters
$params = array(
    // 'orderby' => 't.name DESC',    
    "limit" => -1,
    // "where" => 'featured = true'
    // 'where' => 't.name != "Matt"'
    );



//creates pod object and loads data
$eventsPod = pods('events',$params); 

// var_dump($eventsPod-> total());
?>


        <main class="wrapper clearfix">
            <div class="section-container">
                <h2 class="section-title">Events</h2>

                <?php
                
                     while ($eventsPod->fetch() ):

                 ?>
                <a href="<?php echo $eventsPod->field('permalink')?>">
                    <div class="event">
                        <h2><?php echo $eventsPod->field('title'); ?></h2>
                        <p><?php echo pods_image($eventsPod->field('featured_image'), 'large')?></p> 
                     
                        <?php echo wp_trim_words($eventsPod->field('content'),20); ?> 
                       <!--  <?php echo wpautop($eventsPod->field('content')); ?> -->
                    </div>
                </a>
                <?php 
                    endwhile;
        
                ?>
            </div>
            
            <!-- end of section-container -->
        </main>
        <!-- end of main -->
<?php get_footer(); ?> 

