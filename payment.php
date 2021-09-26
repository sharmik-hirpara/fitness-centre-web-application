<?php
	session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Enquiry Details Confirmation" />
	<meta name="keywords" content="Fitness Club, Gymnastic, Swimming, Yoga, Description, Enquiry form confirmation" />
	<meta name="author" content="Sharmik" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
	<script src="scripts/part2.js"></script>
</head>

<body>
<?php
	include "includes/header.inc";

	if(isset($_POST['first_name']))
	{
		if($_POST["first_name"] != NULL)
		{
			$firstName = $_POST["first_name"];
			$firstName = sanitise_input($firstName);
			$_SESSION['first_name'] = $firstName;
		}
		else
		{
			$_SESSION['first_name'] = NULL;
		}
	}
	else
	{
		header("location: index.php");
	}

 	if(isset($_POST['last_name']))
	{
		if($_POST['last_name'] != NULL)
		{
			$lastName = $_POST["last_name"];
			$lastName = sanitise_input($lastName);
			$_SESSION['last_name'] = $lastName;
		}
		else
		{
			$_SESSION['last_name'] = NULL;
		}
	}

	if(isset($_POST['email_id']))
	{
		if($_POST['email_id'] != NULL)
		{
			$emailID = $_POST["email_id"];
			$emailID = sanitise_input($emailID);
			$_SESSION['email_id'] = $emailID;
		}
		else
		{
			$_SESSION['email_id'] = NULL;
		}
	}

	if(isset($_POST['street_name']))
	{
		if($_POST['street_name'] != NULL)
		{
			$streetName = $_POST["street_name"];
			$streetName = sanitise_input($streetName);
			$_SESSION['street_name'] = $streetName;
		}
		else
		{
			$_SESSION['street_name'] = NULL;
		}
	}

	if(isset($_POST['suburb']))
	{
		if($_POST['suburb'] != NULL)
		{
			$suburb = $_POST["suburb"];
			$suburb = sanitise_input($suburb);
			$_SESSION['suburb'] = $suburb;
		}
		else
		{
			$_SESSION['suburb'] = NULL;
		}
	}

	if(isset($_POST['state']))
	{
		if($_POST['state'] != "")
		{
			$state = $_POST["state"];
			$state = sanitise_input($state);
			$_SESSION['state'] = $state;
		}
		else
		{
			$_SESSION['state'] = NULL;
		}
	}

	if(isset($_POST['postcode']))
	{
		if($_POST['postcode'] != NULL)
		{
			$postcode = $_POST["postcode"];
			$postcode = sanitise_input($postcode);
			$_SESSION['postcode'] = $postcode;
		}
		else
		{
			$_SESSION['postcode'] = NULL;
		}
	}

	if(isset($_POST["billing_add"]))
	{
		$_SESSION['diffBillingAddress'] = "Yes";
		if(isset($_POST['b_street_name']))
		{
			if($_POST['b_street_name'] != NULL)
			{
				$bStreetName = $_POST["b_street_name"];
				$bStreetName = sanitise_input($bStreetName);
				$_SESSION['b_street_name'] = $bStreetName;
			}
			else
			{
				$_SESSION['b_street_name'] = NULL;
			}
		}
		if(isset($_POST['b_suburb']))
		{
			if($_POST['b_suburb'] != NULL)
			{
				$bSuburb = $_POST["b_suburb"];
				$bSuburb = sanitise_input($bSuburb);
				$_SESSION['b_suburb'] = $bSuburb;
			}
			else
			{
				$_SESSION['b_suburb'] = NULL;
			}
		}
		if(isset($_POST['b_state']))
		{
			if($_POST['b_state'] != NULL)
			{
				$bState = $_POST["b_state"];
				$bState = sanitise_input($bState);
				$_SESSION['b_state'] = $bState;
			}
			else
			{
				$_SESSION['b_state'] = NULL;
			}
		}
		if(isset($_POST['b_postcode']))
		{
			if($_POST['b_postcode'] != NULL)
			{
				$bPostcode = $_POST["b_postcode"];
				$bPostcode = sanitise_input($bPostcode);
				$_SESSION['b_postcode'] = $bPostcode;
			}
			else
			{
				$_SESSION['b_postcode'] = NULL;
			}
		}
	}
	else
	{
		$_SESSION['diffBillingAddress'] = "Yes";
		$_SESSION['b_street_name'] = "Not applicable";
		$_SESSION['b_suburb'] = "Not applicable";
		$_SESSION['b_state'] = "Not applicable";
		$_SESSION['b_postcode'] = "Not applicable";
	}

	if(isset($_POST['phone_number']))
	{
		if($_POST['phone_number'] != NULL)
		{
			$phoneNumber = $_POST["phone_number"];
			$phoneNumber = sanitise_input($phoneNumber);
			$_SESSION['phone_number'] = $phoneNumber;
		}
		else
		{
			$_SESSION['phone_number'] = NULL;
		}
	}
	
	if(isset($_POST['preferred_contact']))
	{
		$preferredContact = $_POST["preferred_contact"];
		$preferredContact = sanitise_input($preferredContact);
		$_SESSION['preferred_contact'] = $preferredContact;
	}
	else
	{
		$_SESSION['preferred_contact'] = NULL;
	}
	
	if(isset($_POST['category']))
	{
		if($_POST['category'] != "default")
		{
			$category = $_POST["category"];
			$category = sanitise_input($category);
			$_SESSION['category'] = $category;
		}
		else
		{
			$_SESSION['category'] = NULL;
		}
	}

	if(isset($_POST['product_features']))
	{
		$productFeatures = $_POST["product_features"];
		$_SESSION['product_features'] = $productFeatures;	
	}
	else
	{
		$_SESSION['product_features'] = NULL;
	}
	
	if(isset($_POST['no_of_members']))
	{
		if($_POST['no_of_members'] != NULL)
		{
			$partySize = $_POST["no_of_members"];
			$partySize = sanitise_input($partySize);
			$_SESSION['no_of_members'] = $partySize;
		}
		else
		{
			$_SESSION['no_of_members'] = NULL;
		}
	}

	if(isset($_POST['comments']))
	{
		if($_POST['comments'] != NULL)
		{
			$comments = $_POST['comments'];
			$comments = sanitise_input($comments);
		}
		else
		{
			$comments = "NA";
		}
		$_SESSION['comments'] = $comments;
	}

	$_SESSION['totalCost'] = calculateCost();

	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	function calculateCost()
	{
		$result = 0;
		if($_SESSION["no_of_members"] != "")
		{
			if($_SESSION['product_features'][0] == "group_activity")
			{
				if($_SESSION['category'] == "gymnastics")
				{
					$result = $_SESSION['no_of_members'] * 5;
				}
				else if($_SESSION['category'] == "swimming")
				{
					$result = $_SESSION['no_of_members'] * 6;
				}
				else if($_SESSION['category'] == "yoga")
				{
					$result = $_SESSION['no_of_members'] * 7;
				}
			}
			else if($_SESSION['product_features'][0] == "personal_training")
			{
				if($_SESSION['category'] == "gymnastics")
				{
					$result = $_SESSION['no_of_members'] * 10;
				}
				else if($_SESSION['category'] == "swimming")
				{
					$result = $_SESSION['no_of_members'] * 12;
				}
				else if($_SESSION['category'] == "yoga")
				{
					$result = $_SESSION['no_of_members'] * 15;
				}
			}
		}
		return $result;
	}
?>

	<form id="payment" method="post" novalidate="novalidate" action="process_order.php">
		
		<input type="hidden" name="first_name" id="first_name" />
		<input type="hidden" name="last_name" id="last_name" />
		<input type="hidden" name="email_id" id="email_id" />
		<input type="hidden" name="street_name" id="street_name" />
		<input type="hidden" name="suburb" id="suburb" />
		<input type="hidden" name="state" id="state" />
		<input type="hidden" name="postcode" id="postcode" />
		<input type="hidden" name="b_street_name" id="b_street_name" />
		<input type="hidden" name="b_suburb" id="b_suburb" />
		<input type="hidden" name="b_state" id="b_state" />
		<input type="hidden" name="b_postcode" id="b_postcode" />		
		<input type="hidden" name="phone_number" id="phone_number" />
		<input type="hidden" name="preferred_contact" id="preferred_contact" />
		<input type="hidden" name="category" id="category" />
		<input type="hidden" name="product_features" id="product_features" />
		<input type="hidden" name="member_count" id="member_count" />

		<fieldset>
			<legend>Your Details</legend>
			<p>Your Name: <strong><span id="confirm_name">
									<?php if($_SESSION["first_name"]  != NULL) echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; else echo "Not entered"; ?>
						</span></strong></p>
			<p>Address: <strong><span id="confirm_address">
									<?php if($_SESSION['street_name'] != NULL) echo $_SESSION["street_name"] . ", " . $_SESSION["suburb"] . ", " . $_SESSION["state"] . ", " . $_SESSION["postcode"] . ", Australia."; else echo "Not entered"; ?>
									</span></strong></p>
			<p>Billing Address: <strong><span id="confirm_b_address">
				<?php if($_SESSION["b_street_name"] != "Not applicable")
						{
							echo $_SESSION["b_street_name"] . ", " . $_SESSION["b_suburb"] . ", " . $_SESSION["b_state"] . ", " . $_SESSION["b_postcode"] . ", Australia.";
						}
						else
						{
							echo $_SESSION["b_street_name"];
						}
						 ?>
			</span></strong></p>
			<p>Phone Number: <strong><span id="confirm_phone_number">
				<?php if($_SESSION['phone_number'] != NULL) echo $_SESSION["phone_number"]; else echo "Not entered";
				?>
			</span></strong></p>
			<p>Email ID: <strong><span id="confirm_email_id">
				<?php if($_SESSION['email_id'] != NULL) echo $_SESSION["email_id"]; else echo "Not entered";
				?>
			</span></strong></p>			
			<p>Preferred Contact Type: <strong><span id="confirm_preferred_contact">
				<?php if($_SESSION['preferred_contact'] != NULL) echo $_SESSION["preferred_contact"]; else echo "Not selected";
				?>
			</span></strong></p>
		</fieldset>
		<p></p>
		<fieldset>
			<legend>Product Details</legend>
			<p>Category: <strong><span id="confirm_category">
				<?php if($_SESSION['category'] != NULL)	echo $_SESSION["category"]; else echo "Not selected";
				?>
			</span></strong></p>
			<p>Feature: <strong><span id="confirm_feature">
				<?php if($_SESSION['product_features'][0] != NULL)	echo $_SESSION["product_features"][0]; else echo "Not selected";
				?>
			</span></strong></p>
			<p>Total Members: <strong><span id="confirm_member_count">
				<?php if($_SESSION['no_of_members'] != NULL) echo $_SESSION["no_of_members"]; else echo "Not entered";
				?>
			</span></strong></p>
			<p>Total Cost: <strong><span id="confirm_cost">
				<?php if($_SESSION['totalCost'] != NULL) echo "$ " . $_SESSION["totalCost"] ." per hour"; else echo "Not entered";
				?>
			</span></strong></p>
		</fieldset>
		<p></p>
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
		<fieldset>
			<legend>Validation</legend>
			<input type="checkbox" name="debug" class="debug" id="debug">
			<label for="debug" class="debug">JavaScript validation</label>
		</fieldset>

		<input type="submit" value="Check Out" />
		<button type="button" id="cancelButton">Cancel Order</button>
	</form>

	<?php 
		include 'includes/footer.inc';
	?>
</body>
</html>