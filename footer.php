
<footer class="footer" role="contentinfo">
	  <div class="footer-logo">
	  	<a href="<?php bloginfo('url'); ?>">
	    <img src="<?php bloginfo('template_directory'); ?>/img/iab-logo.png" alt="IAB Logo Image">
	    </a>
	  </div>
	  <div class="footer-links">
	    <ul>
	      <li><h3>Information</h3></li>
	      <li><a href="javascript:void(0)">About IAB</a></li>
	      <li><a href="javascript:void(0)">Contact</a></li>
	      <li><a href="javascript:void(0)">Member Directory</a></li>
	    </ul>
	    <ul>
	      <li><h3>Follow Us</h3></li>
	      <li><a href="javascript:void(0)">Facebook</a></li>
	      <li><a href="javascript:void(0)">Twitter</a></li>
	      <li><a href="javascript:void(0)">YouTube</a></li>
	    </ul>
	    <ul>
	      <li><h3>Legal</h3></li>
	      <li><a href="javascript:void(0)">Terms and Conditions</a></li>
	      <li><a href="javascript:void(0)">Privacy Policy</a></li>
	    </ul>
	  </div>

	  <hr>

	  <p>&copy; 2015 Interactive Advertising Bureau. All rights reserved.</p>
	</footer>

	<script>
            var siteInfo = {'ajaxURL': '<?php echo admin_url() ?>admin-ajax.php'};
    </script>
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.4.min.js"><\/script>')</script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.gridheight.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.parallaxbanner.js"></script>
	<?php if(is_front_page()): ?>
		<script src="<?php bloginfo('template_directory'); ?>/js/loader.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/frontpage.js"></script>
	<?php else: ?>
		<script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<?php endif; ?>	
	
</body>
</html>	
<?php wp_footer(); ?>