<?php
/*
template Name:cart page template
*/ 
get_header(); 

if(isset($_SESSION['cart'])){
	$numOfItems = count($_SESSION['cart']);

	if(isset($_GET['delete'])){
		$delete = $_GET['delete'];
		unset($_SESSION['cart'][$delete]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);
	}
}else{
	$numOfItems = 0;
}


$cart = $_SESSION['cart'];
$total = 0;
$id = 0;
$subtotal = 0;

if($numOfItems === 0):
?>
nothing here!
<?php else: ?>
	<div class="shopping-cart outercontainer">
			<h2>Cart</h2>
			<hr>
<table class="cart-form">
<?php 

foreach ($cart as $item ):
	$event = pods('events', $item['id']);
	$eventCost = $item['cost'];
	$date = $item['date'];
	$location = $event->field('place');
	$cost =  $eventCost;
?>
	<tr>
		<td class="event-image">
		<?php 
	        $postId = $event->field('ID');
	        $image_id = get_post_thumbnail_id($postId);
	        $image = wp_get_attachment_image_src($image_id);
	        $image_url = $image[0];             
        ?>
        <img src="<?php echo $image_url; ?>" alt="">
        </td>
		<td class="event-discrption">
			<h2 class="event-name"><?php echo $event->field('title'); ?></h2>
			<p class="event-details"><?php echo $date; ?></p>
			<p class="event-details">
				<?php 
		            echo $location['name'].": ";
		            echo $location['no'].", "; 
		            echo $location['address'].", ";
		            echo $event->display('place.suburb.name').", ";
		            echo $event->display('place.city.name');
	            ?>
            </p>
		</td>
		<td class="event-price">
		
		<?php if($cost === null || $cost ==="0.00"): ?>
			Free
		<?php else: ?>
		$<?php echo $cost ?> NZD + GST
		<?php endif; ?>

		</td>
		<td class="event-quantity"><form><input type="number" name="quantity" value="1" min ="1" max ="50"></form></td>
		<td class="event-item-price">
			<?php 
			$subtotal=$cost;
			echo $subtotal;
			$total += $subtotal;
		 	?> + GST</td>
		<td class="event-remove"><a href="<?php echo bloginfo('url')?>/cart?delete=<?php echo $id ?>"><i class="fa fa-times-circle-o fa-2x"></a></i></td>
	</tr>
	<?php $id++; ?>
<?php endforeach; ?>

</table>
<div class="cover-bottom"></div>
</div>
<div class="payment outercontainer">
			<h2>Total: $ <?php echo $total; ?> NZD</h2>
			<button>Pay Now</button>
</div>
<p></p>
<?php endif; ?>

<?php get_footer(); ?>