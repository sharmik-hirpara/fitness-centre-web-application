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
		{
			echo "<p>Datebase connection failure</p>";
		}
		else
		{
			$sql_table = "orders";
			$sqlString = "select * FROM orders ORDER BY order_id DESC LIMIT 1";
			$result = mysqli_query($conn,  $sqlString);
			if(!$result)
			{
				echo "<p class=\"wrong\">Something is wrong with ", $sqlString, "</p>";
			}
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
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

	<form id="receipt" method="post" novalidate="novalidate" action="index.php">
		<fieldset>
			<legend>Order details</legend>
			<h2>Order ID: <?php echo $orderID; ?></h2>
			<h2>Order Status: <?php echo $orderStatus; ?></h2>
		</fieldset>
	<p></p>
		<fieldset>
			<legend>Your Details</legend>
			<p>Your Name: <strong> <?php echo $first_name . " " . $last_name ?></strong></p>
			<p>Address: <strong><?php echo $street_name . ", " . $suburb . ", " . $state . ", " . $postcode . ", Australia." ?></strong></p>
			<p>Billing Address: <strong>
				<?php if($b_street_name != "Not applicable")
						{
							echo $b_street_name . ", " . $b_suburb . ", " . $b_state . ", " . $b_postcode . ", Australia.";
						}
						else
						{
							echo $b_street_name;
						}
						 ?>
						 	
						 </strong></p>
			<p>Phone Number: <strong><?php echo $phone_number;
				?></strong></p>
			<p>Email ID: <strong><?php echo $email_id; ?></strong></p>			
			<p>Preferred Contact Type: <strong><?php echo $preferred_contact; ?></strong></p>
		</fieldset>
		<p></p>
		<fieldset>
			<legend>Product Details</legend>
			<p>Category: <strong><?php echo $product; ?></strong></p>
			<p>Feature: <strong><?php echo $feature; ?></strong></p>
			<p>Total Members: <strong><?php echo $members; ?></strong></p>
			<p>Total Cost: $ <strong><?php echo $order_cost; ?></strong>  per hour</p>
		</fieldset>
		<p></p>
		<fieldset>
			<legend>Payment details</legend>
			<p>Card type: <strong><?php echo $payment_type; ?></strong></p>
			<p>Card number: <strong><?php echo $card_number; ?></strong></p>
			<p>Expiry date: <strong><?php echo $expiry_month . "/" . $expiry_year; ?></strong></p>
			<p>Name on card: <strong><?php echo $cardholder_name; ?></strong></p>
			<p>CVV code: <strong><?php echo $cvv_no; ?></strong></p>
		</fieldset>

		<input type="submit" value="Print receipt" />
		<!-- <button type="button" id="backButton">Back to home page</button> -->
	</form>

	<?php 
		include 'includes/footer.inc';
	?>
</body>
</html>