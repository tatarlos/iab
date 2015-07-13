<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>IAB New Zealand</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sanchez:400,400italic' rel='stylesheet' type='text/css'>
	<?php if(is_front_page()) :?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/loaders.min.css">
	<?php endif; ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css">


	<?php
		if ( current_user_can( 'manage_options' ) ) {
		    show_admin_bar( true );
		    wp_head();
		    		    
		}else{
			wp_head();
			show_admin_bar( false );
		}
 	?>
</head>

<header>
<?php if (function_exists('ubermenu') && !wp_is_mobile()): ?>

	<?php ubermenu( 'main' , array( 'menu' => 64 ) ); ?>

<?php endif ?>
</header>
