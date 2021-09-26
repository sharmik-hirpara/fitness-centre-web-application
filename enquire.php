<?php
	session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Description" />
	<meta name="keywords" content="Fitness Club, Gymnastic, Swimming, Yoga, Description, Enquiry form" />
	<meta name="author" content="Sharmik" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enquiry | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
	<script src="scripts/part2.js"></script>
</head>

<body>

<?php
	include "includes/header.inc";
	include 'includes/menu.inc';
?>

<h2>Enquire form</h2>

<form id="enquire_form" novalidate="novalidate" method="post" action="payment.php">
	<fieldset>
		<legend>Personal datails</legend>
		<label for="first_name">First name: </label>
		<input type="text" name="first_name" id="first_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required">
		<p>
			<label for="last_name">Last name: </label>
			<input type="text" name="last_name" id="last_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required">
		</p>
		<p>
			<label for="email_id">Email address: </label>
			<input type="email" name="email_id" id="email_id" size="40" required="required">
		</p><br>
		<fieldset>
			<legend>Recidence details</legend>
			<p><label for="street_name">Street name: </label>
			<input type="text" name="street_name" id="street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}" required="required"></p>
			<p><label for="suburb">Suburb: </label>
			<input type="text" name="suburb" id="suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}" required="required"></p>
			<p><label for="state">State: </label>
			<select name="state" id="state" required>
				<option value="" >State name</option>
				<option value="VIC">VIC</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
				<option value="NT">NT</option>
				<option value="WA">WA</option>
				<option value="SA">SA</option>
				<option value="TAS">TAS</option>
				<option value="ACT">ACT</option>
			</select></p>
			<p><label for="postcode">Postcode: </label>
			<input type="text" name="postcode" id="postcode" maxlength="4" size="4" required="required"></p>
			<input type="checkbox" name="billing_add" class="billing_add" id="billing_add">
			<label for="billing_add" class="billing_add">Billing address different from Delivery Address</label>
			<div hidden="hidden" id="show_bill_add">
				<p>Billing address:</p>
				<p><label for="b_street_name">Street name: </label>
				<input type="text" name="b_street_name" id="b_street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}"></p>
				<p><label for="b_suburb">Suburb: </label>
				<input type="text" name="b_suburb" id="b_suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}"></p>
				<p><label for="b_state">State: </label>
				<select name="b_state" id="b_state">
					<option value="" >State name</option>
					<option value="VIC">VIC</option>
					<option value="NSW">NSW</option>
					<option value="QLD">QLD</option>
					<option value="NT">NT</option>
					<option value="WA">WA</option>
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="ACT">ACT</option>
				</select></p>
				<p><label for="b_postcode">Postcode: </label>
				<input type="text" name="b_postcode" id="b_postcode" maxlength="4" size="4" pattern="\d{4}"></p>
			</div>				
		</fieldset>
		<p><label for="phone_number">Phone number</label>
		<input type="tel" name="phone_number" id="phone_number" maxlength="10" size="14" pattern="\d{10}" placeholder="(0)XXX-XXX-XXX" required="required">
		</p>
		<label>Preferred contact: </label>
			<input type="radio" name="preferred_contact" id="post" value="post" required="required">
			<label for="post">Post</label>
			<input type="radio" name="preferred_contact" id="email" value="email" required="required">
			<label for="email">Email</label>
			<input type="radio" name="preferred_contact" id="phone" value="phone" required="required">
			<label for="phone">Phone</label>
	</fieldset>
	<p></p>
	<fieldset>
		<legend>Product enquiry details</legend>
		<p><label for="category">Category: </label>
			<select name="category" id="category" required>
				<option value="" id="default">Select category</option>
				<option value="gymnastics" id="gymnastics">Gymnastics</option>
				<option value="swimming" id="swimming">Swimming</option>
				<option value="yoga" id="yoga">Yoga</option>
			</select></p>
		<label>Product features: </label>
		<p></p>
			<label for="group_activity">Group activity</label>
			<input type="radio" name="product_features[]" id="group_activity" value="group_activity" required="required"><br />
			<div hidden="hidden" class="category gymnastics">$5 per hour</div>
			<div hidden="hidden" class="category swimming">$6 per hour</div>
			<div hidden="hidden" class="category yoga">$7 per hour</div>
		<p></p>	
			<label for="personal_training">Personal training</label>
			<input type="radio" name="product_features[]" id="personal_training" value="personal_training" required="required"><br />
			<div hidden="hidden" class="category gymnastics">$10 per hour</div>
			<div hidden="hidden" class="category swimming">$12 per hour</div>
			<div hidden="hidden" class="category yoga">$15 per hour</div>
		<p></p>	
			<label for="session_timings">Session timings:</label>
			<div hidden="hidden" class="category gymnastics">Everyday</div>
			<div hidden="hidden" class="category swimming">Monday, Wednesday, Friday, Saturday, Sunday</div>
			<div hidden="hidden" class="category yoga">Everyday early morning</div>
		<p></p>
			<label for="no_of_members" class="member_count">Total number of member(s) to join fitness club: </label>
			<input type="text" name="no_of_members" id="no_of_members" class="member_count" maxlength="2" size="4" pattern="\d{2}" required="required">
		<p></p>
		<label for="comments">Comments: </label>
		<p><textarea id="comments" name="comments" rows="4" cols="40" placeholder="Enter your comments here..."></textarea></p>
	</fieldset>
	<p></p>
	<fieldset>
		<legend>Validation</legend>
		<input type="checkbox" name="debug" class="debug" id="debug">
		<label for="debug" class="debug">JavaScript validation</label>
	</fieldset>

	<input type= "submit" value="Pay now"/>
	<input type="reset" value="Reset fields">
</form><br><br>

	<?php 
		include 'includes/footer.inc';

	?>
</body>
</html>