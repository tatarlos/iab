<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>IAB New Zealand</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>	
	<link href='http://fonts.googleapis.com/css?family=Sanchez:400,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/loaders.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css">

	<?php
		if ( current_user_can( 'manage_options' ) ) {
		    show_admin_bar( true );
		    wp_head();		    
		}else{
			show_admin_bar( false );
		}
 	?>

</head>


	<header class="navigation" role="banner">
	  <div class="navigation-wrapper">
	    <a href="<?php bloginfo('url'); ?>" class="logo">
	      <img src="<?php bloginfo('url'); ?>/wp-content/themes/iab/img/iab-logo.png" alt="IAB Logo Image">
	    </a>
	    <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
	    <nav role="navigation">
	      <ul id="js-navigation-menu" class="navigation-menu show">
	        <li class="nav-link"><a href="javascript:void(0)">Products</a></li>
	        <li class="nav-link"><a href="javascript:void(0)">About Us</a></li>
	        <li class="nav-link"><a href="<?php bloginfo('url')?>/blogs">Blog</a></li>
	        <li class="nav-link"><a href="javascript:void(0)">Contact</a></li>
	        <li class="nav-link more"><a href="javascript:void(0)">More</a>
	          <ul class="submenu">
	            <li><a href="javascript:void(0)">Submenu Item</a></li>
	            <li><a href="javascript:void(0)">Another Item</a></li>
	            <li class="more"><a href="javascript:void(0)">Item with submenu</a>
	              <ul class="submenu">
	                <li><a href="javascript:void(0)">Sub-submenu Item</a></li>
	                <li><a href="javascript:void(0)">Another Item</a></li>
	              </ul>
	            </li>
	            <li class="more"><a href="javascript:void(0)">Another submenu</a>
	              <ul class="submenu">
	                <li><a href="javascript:void(0)">Sub-submenu</a></li>
	                <li><a href="javascript:void(0)">An Item</a></li>
	              </ul>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </nav>
	    <div class="navigation-tools">
	      <div class="search-bar">
	        <form role="search">
	          <input type="search" placeholder="Enter Search" />
	          <button type="submit">
	            <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/search-icon.png" alt="Search Icon">
	          </button>
	        </form>
	      </div>
	    </div>
	  </div>
	</header>