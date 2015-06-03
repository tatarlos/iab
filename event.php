<?php
/*
template Name:Single Event single template
*/ 
$permalink = pods_var('last','url');
//query parameters
//creates pod object and loads data
$eventsPod = pods('events',$permalink);


?>


<?php get_header(); ?>

<main class="wrapper clearfix">
    <h2><?php echo $eventsPod->field('title'); ?></h2>
    <div class="event">
        <?php echo pods_image($eventsPod->field('featured_image'), 'large')?> 
        
        <!-- <?php echo wp_trim_words($eventsPod->field('content'),20); ?> -->
         <?php echo wpautop($eventsPod->field('content')); ?>
    </div>

	<div class="event-details" width="200px" height="200px" background-color="red">
            <?php 

            	echo "Date: ".$eventsPod->display('day')."<br>";
            	echo "Time: ".$eventsPod->display('time')."<br>";
            	$location = $eventsPod->field('place');
            	echo "Name: ".$location['name']."<br>" ;
            	echo "Address: ".$location['no'].", "; 
            	echo $location['address'].", ";
            	
            	echo $eventsPod->display('place.city.name');
            	// var_dump($city);
            	

            	// $city = ($eventsPod->field('cityname'));
            	// // var_dump($city);
            	// echo $city['name'];


  





            ?>
    </div>
</main>
	
<?php get_footer(); ?>
