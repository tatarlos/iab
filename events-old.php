<?php
/*
template Name:Single Event single template
*/ 
$permalink = pods_var('last','url');
$cat = pods_v(-2,'url');
//query parameters
//creates pod object and loads data
$eventsPod = pods('events',$permalink);
$type = $cat."_type.name";
?>

<?php get_header(); ?>

<main class="wrapper clearfix">
    <h2><?php echo $eventsPod->field('title'); ?></h2>
    <div class="event">
     
<!--         <?php  foreach(( $eventsPod->field('category')) as $category) {?>
        <a href="<?php echo bloginfo('url')."/".$category['slug']?>">
            <?php echo $category['name']."<br>"  ?>
        </a> -->

        <?php } ?>
        <?php 
            $postId = $eventsPod->field('ID');
            $image_id = get_post_thumbnail_id($postId);
            $image = wp_get_attachment_image_src($image_id,'large');
            $image_url = $image[0];

            $cats = $eventsPod->field($type);
            
            if ( is_array($cats) ){
                
                $catLen = sizeof($cats);
                                
                for($i = $catLen-1; $i >= 0; $i--){
                    echo ($cats[$i]."<br>");
                }

            }else{
                echo $cats;
            }            
        ?>

         <img src="<?php echo $image_url; ?>" alt=""/>
         <?php echo wpautop($eventsPod->field('content')); ?>
    </div>

	<div class="event-details">
            <?php
                $cost = ($eventsPod->field('cost') == 0)? "Free" : $eventsPod->display('cost')." + GST";
                echo "Costs: ".$cost."<br>";

                echo "Duration: ".$eventsPod->display('duration')."<br>";
                
                $hasFinishDate = ($eventsPod->field('finish_date') ==="0000-00-00" )?  "":" to ".$eventsPod->display('finish_date');
            	echo "When: ".$eventsPod->display('start_date').$hasFinishDate."<br>";
            	$location = $eventsPod->field('place');
            	echo "Location: ".$location['name'].": " ;
            	echo $location['no'].", "; 
            	echo $location['address'].", ";
            	echo $eventsPod->display('place.suburb.name').", ";
            	echo $eventsPod->display('place.city.name');
            ?>
    </div>
</main>
	
<?php get_footer(); ?>
