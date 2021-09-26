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
	<title>Fix it | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
	<script src="scripts/part2.js"></script>
</head>

<body>

<?php
include "includes/header.inc";
include 'includes/menu.inc';
?>

<h2>Fix Enquire form</h2>

<form id="fix_enquire_form" novalidate="novalidate" method="post" action="process_order.php">
	<fieldset>
		<legend>Personal datails</legend>
		<label for="first_name">First name: </label>
		<input type="text" name="first_name" id="first_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required" value=<?php if($_SESSION["first_name"]  != NULL) echo $_SESSION["first_name"]; ?>>
		<p>
			<label for="last_name">Last name: </label>
			<input type="text" name="last_name" id="last_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required" value=<?php if($_SESSION["last_name"]  != NULL) echo $_SESSION["last_name"]?>>
		</p>
		<p>
			<label for="email_id">Email address: </label>
			<input type="email" name="email_id" id="email_id" size="40" required="required" value=<?php if($_SESSION["email_id"]  != NULL) echo $_SESSION["email_id"]?>>
		</p><br>
		<fieldset>
			<legend>Recidence details</legend>
			<p><label for="street_name">Street name: </label>
			<input type="text" name="street_name" id="street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}" required="required" value=<?php if($_SESSION["street_name"]  != NULL) echo $_SESSION["street_name"] ?>></p>
			<p><label for="suburb">Suburb: </label>
			<input type="text" name="suburb" id="suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}" required="required" value=<?php if($_SESSION["suburb"]  != NULL) echo $_SESSION["suburb"] ?>></p>
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
			<input type="text" name="postcode" id="postcode" maxlength="4" size="4" required="required" value=<?php if($_SESSION["postcode"]  != NULL) echo $_SESSION["postcode"] ?>></p>
			<input type="checkbox" name="billing_add" class="billing_add" id="billing_add">
			<label for="billing_add" class="billing_add">Billing address different from Delivery Address</label>
			<div hidden="hidden" id="show_bill_add">
				<p>Billing address:</p>
				<p><label for="b_street_name">Street name: </label>
				<input type="text" name="b_street_name" id="b_street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}" value=<?php if($_SESSION["b_street_name"]  != NULL) echo $_SESSION["b_street_name"]?>></p>
				<p><label for="b_suburb">Suburb: </label>
				<input type="text" name="b_suburb" id="b_suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}" value=<?php if($_SESSION["b_suburb"]  != NULL) echo $_SESSION["b_suburb"] ?>></p>
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
				<input type="text" name="b_postcode" id="b_postcode" maxlength="4" size="4" pattern="\d{4}" value=<?php if($_SESSION["b_postcode"]  != NULL) echo $_SESSION["b_postcode"]?>></p>
			</div>				
		</fieldset>
		<p><label for="phone_number">Phone number</label>
		<input type="tel" name="phone_number" id="phone_number" maxlength="10" size="14" pattern="\d{10}" placeholder="(0)XXX-XXX-XXX" required="required" value=<?php if($_SESSION["phone_number"]  != NULL) echo $_SESSION["phone_number"]?>>
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
			<input type="text" name="no_of_members" id="no_of_members" class="member_count" maxlength="2" size="4" pattern="\d{2}" required="required" value=<?php if($_SESSION["no_of_members"]  != NULL) echo $_SESSION["no_of_members"]?>>
		<p></p>
		<label for="comments">Comments: </label>
		<p><textarea id="comments" name="comments" rows="4" cols="40" placeholder="Enter your comments here..."></textarea></p>
	</fieldset>

	<fieldset>
		<legend>Payment details</legend>
		<input type="radio" name="payment_type" id="visa" value="visa" required="required">
		<label for="visa">Visa</label>
		<input type="radio" name="payment_type" id="mastercard" value="mastercard" required="required">
		<label for="mastercard">Mastercard</label>
		<input type="radio" name="payment_type" id="americanexpress" value="americanexpress" required="required">
		<label for="americanexpress">American Express</label>
	<p></p>
		<label for="card_number">Card number:</label>
		<input type="text" name="card_number" id="card_number">
	<p></p>
		<img id="card_number_image" src="images/dummy_front.png" alt="card front image ">
	<p></p>
		<label>Expiry date:</label>
		<input type="text" name="expiry_month" id="expiry_month" required> /
		<input type="text" name="expiry_year" id="expiry_year" required>
	<p></p>
		<label for="cardholder_name">Name on card: </label>
		<input type="text" name="cardholder_name" id="cardholder_name">
	<p></p>
		<label for="cvv_no">CVV number:</label>
		<input type="text" name="cvv_no" id="cvv_no">
	<p></p>
		<img id="cvv_number_image" src="images/dummy_cvv.png" alt="card back image">
	</fieldset>
	<p></p>

	<input type="submit" value="Check Out" />
	<button type="button" id="cancelButton">Cancel Order</button>
</form><br><br>

	<?php 
		include 'includes/footer.inc';
	?>
</body>
</html>
