<?php 
/*
template Name:register page template
*/
$params = array( 
    "limit" => -1,
);
$registerSelection = pods('registerselection', $params);
$levelsPod = pods('membershiplevel', $params);
get_header(); ?>

<div class="outercontainer">
	<?php// echo do_shortcode('[contact-form-7 id="218" title="register form"]'); ?>
	<form action="" name ="intial-details">
	<h2>Applicant details</h2>
		<p>First Name: <input type="text" name = "first-name"></p>
		<p>Last Name: <input type="text" name = "last-name"></p>
		<p>Job title: <input type="text" name = "job-title"></p>
		<p>Email: <input type="text" name = "email"></p>
		<p>Best Contact Number: <input type="text" name = "contact-no"></p>
	<h2>Company Details</h2>
		<p>Company name: <input type="text" name = "company-name"></p>
		<p>Main Business Contact Number: <input type="text" name = "business-contact-no"></p>
		<p>Business Email: <input type="text" name = "business-email"></p>
		<p>Twitter: <input type="text" name = "twitter"></p>
		<p>Suburb/City: <input type="text" name = "suburb-city"></p>
		<p><input type="submit" value="submit" name="intial-details-submit"></fieldset></p>
	</form>
	
	<form action="" name="type-of-work">
	<h2>What services do you provide? (please select all that apply)</h2>
		 <?php while ($registerSelection->fetch()): ?>  
		<div><?php echo $registerSelection->field('name') ?> <input type="checkbox" value ="<?php echo $registerSelection->field('name') ?>"></div>
	<?php endwhile; ?>
	<p></p>
	<p>Description <span class="textarea"><textarea name="textarea" cols="40" rows="10"  aria-invalid="false" placeholder="Please include a short description about your company. This will be posted in the Directory and a logo of your company"></textarea></span></p>

	<p>Upload<span class="file-logo"><input type="file" name="file-logo" value="1" size="40" aria-invalid="false" /></span></p>
	<p><input type="submit" value="submit" name="type-of-work-submit"></fieldset></p>
	</form>

	<form action="" name="membership-levels">
	<h2>Full & Associate Fees (ex GST)</h2>
		 <?php while ($levelsPod->fetch()): ?>  
		<p><?php echo $levelsPod->field('name');  ?> <?php echo $levelsPod->field('description');  ?> <?php echo $levelsPod->field('cost');  ?><input type="radio" name = "<?php echo $levelsPod->field('name')  ?>"></p>
	<?php endwhile; ?>
	<p><input type="submit" value="submit" name="membership-levels-submit"></fieldset></p>
	</form>
</div>
<?php get_footer(); ?>