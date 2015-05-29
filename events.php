<?php 

/*
template Name:Events template
*/ 
$permalink = pods_var('last','url');
//query parameters
//creates pod object and loads data
// $eventsPod = pods('event',$permalink); 


//query parameters
$params = array(

    "where" => "category.permalink = '$permalink' "
    );

//creates pod object and loads data
$eventsPod = pods('event',$params);
// $typePod = pods('types', $permalink ); 

?>


<?php get_header(); ?>

    <div class="content clearfix">
    	<h2>Type</h2>

		<?php while($eventsPod->fetch()): ?>			
		
			<div class="event">
			    <h3>
			    	<a href="<?php bloginfo('url')?>/event/<?php echo $eventsPod->field('permalink')?>">
			    	<?php echo $eventsPod->field('name'); ?></a>
			    </h3>
			    
 			    <span class="meta">
			    </span>
			    
			    <a href="<?php bloginfo('url')?>/event/<?php echo $eventsPod->field('permalink')?>">
			        <figure>
			        	
			        	<?php echo pods_image($eventsPod->field('image'), 'featured')?>
			            <figcaption>
			               <?php echo $eventsPod->field('description'); ?>
			            </figcaption>
			        </figure>
			    </a>
			</div>

		<?php endwhile; ?>

	</div>
	
<?php get_footer(); ?>