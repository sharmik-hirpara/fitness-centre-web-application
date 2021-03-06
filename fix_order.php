<?php
	session_start();
	print_r($_SESSION);
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

	<h2 class="form_name">Fix Enquire form</h2>

	<form class="forms" id="fix_enquire_form" novalidate="novalidate" method="post" action="process_order.php">
		<fieldset class="new_fieldset">	
			<legend>Personal datails</legend>
			<div class="input_field">
				<label for="first_name">First name </label>
				<input class="input" type="text" name="first_name" id="first_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required">
			</div>
			<div class="input_field">
				<label for="last_name">Last name </label>
				<input type="text" name="last_name" id="last_name" maxlength="25" size="25" pattern="[a-zA-Z ]{1,25}" required="required">
			</div>
			<div class="input_field">
				<label for="email_id">Email address </label>
				<input type="email" name="email_id" id="email_id" size="40" required="required">
			</div>
			<div class="input_field">
				<label for="phone_number">Phone number</label>
				<input type="text" name="phone_number" id="phone_number" maxlength="10" size="14" pattern="\d{10}" placeholder="(0)XXX-XXX-XXX" required="required">
			</div>
			<div class="radio_button_input_field">
				<label>Preferred contact method: </label>
				<div class="radio_button">
					<input type="radio" name="preferred_contact" id="post" value="post" required="required">
					<label for="post">Post</label>
				</div>
				<div class="radio_button">
					<input type="radio" name="preferred_contact" id="email" value="email" required="required">
					<label for="email">Email</label>
				</div>
				<div class="radio_button">
					<input type="radio" name="preferred_contact" id="phone" value="phone" required="required">
					<label for="phone">Phone</label>
				</div>
			</div>
			<fieldset class="new_fieldset">
				<legend>Recidence details</legend>
				<div class="input_field">
					<label for="street_name">Street name </label>
					<input type="text" name="street_name" id="street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}" required="required">
				</div>
				<div class="input_field">
					<label for="suburb">Suburb </label>
					<input type="text" name="suburb" id="suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}" required="required">
				</div>
				<div class="input_field">
					<label for="state">State </label>
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
					</select>
				</div>
				<div class="input_field">
					<label for="postcode">Postcode </label>
					<input type="text" name="postcode" id="postcode" maxlength="4" size="4" required="required">
				</div>
				<input type="checkbox" name="billing_add" class="billing_add" id="billing_add">
				<label for="billing_add" class="billing_add">Billing address different from Delivery Address</label>
				<div hidden="hidden" id="show_bill_add">
					<p>Billing address</p>
					<div class="input_field">
						<label for="b_street_name">Street name </label>
						<input type="text" name="b_street_name" id="b_street_name" maxlength="40" size="40" pattern="[a-zA-Z ]{1,40}">
					</div>
					<div class="input_field">
						<label for="b_suburb">Suburb </label>
						<input type="text" name="b_suburb" id="b_suburb" maxlength="20" size="25" pattern="[a-zA-Z ]{1,20}">
					</div>
					<div class="input_field">
						<label for="b_state">State </label>
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
						</select>
					</div>
					<div class="input_field">
						<label for="b_postcode">Postcode </label>
						<input type="text" name="b_postcode" id="b_postcode" maxlength="4" size="4" pattern="\d{4}">
					</div>
				</div>				
			</fieldset>
		</fieldset>

		<fieldset class="new_fieldset">
			<legend>Payment details</legend>
			<div class="radio_button_input_field">
				<div class="radio_button">
					<input type="radio" name="payment_type" id="visa" value="visa" required="required">
					<label for="visa">Visa</label>
				</div>
				<div class="radio_button">
					<input type="radio" name="payment_type" id="mastercard" value="mastercard" required="required">
					<label for="mastercard">Mastercard</label>
				</div>
				<div class="radio_button">
					<input type="radio" name="payment_type" id="americanexpress" value="americanexpress" required="required">
					<label for="americanexpress">American Express</label>
				</div>
			</div>
			<div class="input_field">
				<label for="card_number">Card number:</label>
				<input type="text" name="card_number" id="card_number">
			</div>
			<div class="card_samples">
				<img class="card_sample" id="card_number_image" src="images/dummy_front.png" alt="card front image ">
			</div>
			<div class="input_field">
				<label>Expiry date:</label>
				<div class="date_field">
					<input type="text" name="expiry_month" id="expiry_month" required>
					<span class="date_seperator">/</span>
					<input type="text" name="expiry_year" id="expiry_year" required>
				</div>
			</div>
			<div class="input_field">
				<label for="cardholder_name">Name on card: </label>
				<input type="text" name="cardholder_name" id="cardholder_name">
			</div>	
			<div class="input_field">
				<label for="cvv_no">CVV number:</label>
				<input type="text" name="cvv_no" id="cvv_no">
			</div>
			<div class="card_samples">	
				<img class="card_sample" id="cvv_number_image" src="images/dummy_cvv.png" alt="card back image">
			</div>
		</fieldset>
		<fieldset class="new_fieldset">
			<legend>Validation</legend>
			<input type="checkbox" name="debug" class="debug" id="debug">
			<label for="debug" class="debug">JavaScript validation</label>
		</fieldset>

		<div class="buttons">
				<input type="submit" value="Check Out" />
				<input type="button" id="cancelButton" value="Cancel" />
		</div>

	</form>

	<?php 
		include 'includes/footer.inc';
	?>
</body>
</html>
