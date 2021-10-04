<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Enquiry Details Confirmation" />
	<meta name="keywords" content="Fitness Club, Gymnastic, Swimming, Yoga, Description, Enquiry form confirmation" />
	<meta name="author" content="Sharmik" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Receipt | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
	<script src="scripts/part2.js"></script>
</head>

<body>
	<?php
		include "includes/header.inc";
		require_once("settings.php");

		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		if(!$conn)
			echo "<p>Datebase connection failure</p>";
		else {
			$sql_table = "orders";
			$sqlString = "select * FROM orders ORDER BY order_id DESC LIMIT 1";
			$result = mysqli_query($conn,  $sqlString);
			if(!$result)
				echo "<p class=\"wrong\">Something is wrong with ", $sqlString, "</p>";
			else {
				while($row = mysqli_fetch_assoc($result)){
					$orderID = $row['order_id'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$email_id = $row['email_id'];
					$street_name = $row['street_name'];
					$suburb = $row['suburb'];
					$state = $row['state'];
					$postcode = $row['postcode'];
					$different_billing_address = $row['different_billing_address'];
					$b_street_name = $row['b_street_name'];
					$b_suburb = $row['b_suburb'];
					$b_state = $row['b_state'];
					$b_postcode = $row['b_postcode'];
					$phone_number = $row['phone_number'];
					$preferred_contact = $row['preferred_contact'];
					$product = $row['product'];
					$feature = $row['feature'];
					$members = $row['members'];
					$comments = $row['comments'];
					$payment_type = $row['payment_type'];
					$card_number = $row['card_number'];
					$expiry_month = $row['expiry_month'];
					$expiry_year = $row['expiry_year'];
					$cardholder_name = $row['cardholder_name'];
					$cvv_no = $row['cvv_no'];
					$order_cost = $row['order_cost'];
					$order_time = $row['order_time'];
					$orderStatus = $row['order_status'];
				}
			}
		}
		mysqli_close($conn);
	?>

	<form class="forms" id="receipt" method="post" novalidate="novalidate" action="index.php">
		<fieldset class="new_fieldset">
			<legend>Order details</legend>
			<div class="order_details">
				Order ID: 
				<span class="font_bold">
					<?php echo $orderID; ?>
				</span>
			</div>
			<div class="order_details">
				Order Status: 
				<span class="font_bold">
					<?php echo $orderStatus; ?>
				</span>
			</div>
		</fieldset>
		<fieldset class="new_fieldset">
			<legend>Your Details</legend>
			<div class="output_field">
				Your Name: 
				<span class="font_bold">
					<?php echo $first_name . " " . $last_name ?>
				</span>
			</div>
			<div class="output_field">
				Address: 
				<span class="font_bold">
					<?php echo $street_name . ", " . $suburb . ", " . $state . ", " . $postcode . ", Australia." ?>
				</span>
			</div>
			<div class="output_field">
				Billing Address: 
				<span class="font_bold">
					<?php 
						if($b_street_name != "Not applicable")
							echo $b_street_name . ", " . $b_suburb . ", " . $b_state . ", " . $b_postcode . ", Australia.";
						else
							echo $b_street_name;
					?>
				</span>
			</div>
			<div class="output_field">
				Phone Number: 
				<span class="font_bold">
					<?php echo $phone_number;?>
				</span>
				</div>
			<div class="output_field">
				Email ID: 
				<span class="font_bold">
					<?php echo $email_id; ?>
				</span>
		</div>			
			<div class="output_field">
				Preferred Contact Type: 
				<span class="font_bold">
					<?php echo $preferred_contact; ?>
				</span>
		</div>
		</fieldset>
		<fieldset class="new_fieldset">
			<legend>Product Details</legend>
			<div class="output_field">
				Category: 
				<span class="font_bold">
					<?php echo $product; ?>
				</span>
			</div>
			<div class="output_field">
				Feature: 
				<span class="font_bold">
					<?php echo $feature; ?>
				</span>
			</div>
			<div class="output_field">
				Total Members: 
				<span class="font_bold">
					<?php echo $members; ?>
				</span>
			</div>
			<div class="output_field">
				Total Cost: $ 
				<span class="font_bold">
					<?php echo $order_cost; ?>
				</span>
			  	per hour
			</div>
		</fieldset>
		<fieldset class="new_fieldset">
			<legend>Payment details</legend>
			<div class="output_field">
				Card type: 
				<span class="font_bold">
					<?php echo $payment_type; ?>
				</span>
			</div>
			<div class="output_field">
				Card number: 
				<span class="font_bold">
					<?php echo $card_number; ?>
				</span>
			</div>
			<div class="output_field">
				Expiry date: 
				<span class="font_bold">
					<?php echo $expiry_month . "/" . $expiry_year; ?>
				</span>
			</div>
			<div class="output_field">
				Name on card: 
				<span class="font_bold">
					<?php echo $cardholder_name; ?>
				</span>
			</div>
			<div class="output_field">
				CVV code: 
				<span class="font_bold">
					<?php echo $cvv_no; ?>
				</span>
			</div>
		</fieldset>

		<div class="buttons">
			<input type="submit" value="Print receipt" />
			<input type="button" id="backButton" value="Return to Home Page" />
		</div>
	</form>

	<?php 
		include 'includes/footer.inc';
	?>
</body>
</html>