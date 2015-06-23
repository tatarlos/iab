<?php 
get_header(); 

if(sset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

$cart = $_SESSION['cart'];

?>
<?php 

foreach ($cart as $item ):
	$event = pods('event', $item['id'] );
echo 'working';
?>


<?php endforeach; ?>
<?php get_footer(); ?>