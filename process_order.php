<?php
	session_start();
	
	$errMsg = "";
	$_SESSION["errArr"] = array();

	if(isset($_POST['first_name']))
	{
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
	}

	if($_SESSION["first_name"] != NULL)
	{
		if(!preg_match("/^[A-Za-z\\- \']{1,25}$/", $_SESSION["first_name"]))
		{
			$errMsg .= "Invalid first name\n";
			$_SESSION["errArr"]['first_name_error'] = true;
		}
		else
		{
			$first_name = $_SESSION["first_name"];
		}
	}
	else
	{
		$errMsg .= "<p> Error: Please enter the first in the <a href=\"enquire.php\"> form</a></p>\n";
		$_SESSION["errArr"]['first_name_error'] = true;
		header("location: index.php");
	}
	if($_SESSION["last_name"] != NULL)
	{
		if(!preg_match("/^[A-Za-z\\- \']{1,25}$/", $_SESSION["last_name"]))
		{
			$errMsg .= "Invalid last name\n";
			$_SESSION["errArr"]['last_name_error'] = true;
		}
		else
		{
			$last_name = $_SESSION["last_name"];
		}	
	}
	else
	{
		$errMsg .= "<p> Error: Please enter the last name in the <a href=\"enquire.php\"> form</a></p>\n";
		$_SESSION["errArr"]['last_name_error'] = true;
	}

	if($_SESSION["email_id"] != NULL)
	{
		if (!filter_var($_SESSION["email_id"], FILTER_VALIDATE_EMAIL)) 
		{
	  		$errMsg .= "<p> Error: Please enter the valid email address in the <a href=\"enquire.php\"> form</a></p>\n";
	  		$_SESSION["errArr"]['email_id_error'] = true; 
		}
		else
		{
			$email_id = $_SESSION["email_id"];
		}
	}
	else
	{
		$errMsg .= "<p> Error: Please enter the email address in the <a href=\"enquire.php\"> form</a></p>\n";
		$_SESSION["errArr"]['email_id_error'] = true;
	}

	$errMsg .= validateAddress($_SESSION['street_name'], $_SESSION['suburb'], $_SESSION['state'], $_SESSION['postcode']);

	if($errMsg == "")
	{
			$street_name = $_SESSION["street_name"];
			$suburb = $_SESSION["suburb"];
			$state = $_SESSION["state"];
			$postcode = $_SESSION["postcode"];
	}

	$diffBillingAddress = $_SESSION["diffBillingAddress"];
	if($_SESSION['b_street_name'] != "Not applicable")
	{
		$errMsg .= validateAddress($_SESSION['b_street_name'], $_SESSION['b_suburb'], $_SESSION['b_state'], $_SESSION['b_postcode']);
		if($errMsg == "")
		{
			$b_street_name = $_SESSION["b_street_name"];
			$b_suburb = $_SESSION["b_suburb"];
			$b_state = $_SESSION["b_state"];
			$b_postcode = $_SESSION["b_postcode"];
		}
	}
	else
	{
		$b_street_name = $_SESSION["b_street_name"];
		$b_suburb = $_SESSION["b_suburb"];
		$b_state = $_SESSION["b_state"];
		$b_postcode = $_SESSION["b_postcode"];
	}

	if($_SESSION['phone_number'] != NULL)
	{
		if(!preg_match("/^[0-9]{10}$/", $_SESSION['phone_number']))
		{
			$errMsg .= "Invalid phone number";
			$_SESSION["errArr"]['phone_number_error'] = true;
		}
		else
		{
			$phone_number = $_SESSION["phone_number"];
		}
	}
	else
	{
		$errMsg .= "<p> Error: Please enter the phone number in the <a href=\"enquire.php\"> form</a></p>";
		$_SESSION["errArr"]['phone_number_error'] = true;
	}

	if(empty($_SESSION["preferred_contact"]))
	{
		$errMsg .= "<p> Error: Please select the preferred contact type in the <a href=\"enquire.php\"> form</a></p>";
		$preferredContact = "Unknown species";
		$_SESSION["errArr"]['preferred_contact_error'] = true;
	}
	else
	{
		$preferred_contact = $_SESSION["preferred_contact"];
	}

	if($_SESSION['category'] == "")
	{
		$errMsg .= "<p> Error: Please select the category in the <a href=\"enquire.php\"> form</a></p>";
		$_SESSION["errArr"]['category_error'] = true;
	}
	else
	{
		$category = $_SESSION["category"];
	}	

	if(empty($_SESSION['product_features']))
	{
		$errMsg .= "<p> Error: Please select any one product feature in the <a href=\"enquire.php\"> form</a></p>";
		$_SESSION["errArr"]['product_features_error'] = true;
	}
	else
	{
		$product_features = $_SESSION["product_features"];
	}

	if($_SESSION['no_of_members'] != NULL)
	{
		if(!preg_match("/^[0-9]{1,2}$/", $_SESSION['no_of_members']))
		{
			$errMsg .= "Invalid party size";
			$_SESSION["errArr"]['no_of_members_error'] = true;
		}
		else
		{
			$no_of_members = $_SESSION["no_of_members"];
		}
	}
	else
	{
		$errMsg .= "<p> Error: Please enter the total number of members in the <a href=\"enquire.php\"> form</a></p>";
		$partySize = "Unknown party size";
		$_SESSION["errArr"]['no_of_members_error'] = true;
	}

	$comments = $_SESSION["comments"];
	$totalCost = $_SESSION["totalCost"];

	if(isset($_POST["payment_type"]))
	{
		$paymentType = $_POST["payment_type"];
		$paymentType = sanitise_input($paymentType);
		$_SESSION["payment_type"] = $paymentType;
	}
	else
	{
		$errMsg .= "<p> Error: Please select the payment type in the <a href=\"payment.php\"> form</a></p>";
		$paymentType = "Unknown payment type";
		$_SESSION["errArr"]['payment_type_error'] = true;
	}
	echo $paymentType;

	if(isset($_POST["card_number"]) && isset($_POST["cvv_no"]))
	{
		$cardNumber = $_POST["card_number"];
		$cardNumber = sanitise_input($cardNumber);
		$cvvNumber = $_POST["cvv_no"];
		$cvvNumber = sanitise_input($cvvNumber);
		if($cardNumber != NULL)
		{
			if($paymentType == "visa")
			{
				if((!preg_match("/^[0-9]{16}$/", $cardNumber)) || digitFromRightSide($cardNumber, 16) != 4)
				{
					$errMsg .= "Invalid Visa card number";
				}
				else
				{
					$_SESSION["card_number"] = digitFromRightSide($cardNumber, 16) . digitFromRightSide($cardNumber, 15) . "XX XXXX XXXX " . digitFromRightSide($cardNumber, 4) . digitFromRightSide($cardNumber, 3) . digitFromRightSide($cardNumber, 2) . digitFromRightSide($cardNumber, 1);
				}
				if(!preg_match("/^[0-9]{3}$/", $cvvNumber))
				{
					$errMsg .= "Invalid cvv number";
				}
				else
				{
					$_SESSION["cvv_no"] = str_repeat("*", strlen($cvvNumber));
				}
			}
			else if($paymentType == "mastercard")
			{
				if((!preg_match("/^[0-9]{16}$/", $cardNumber)) || digitFromRightSide($cardNumber, 16) != 5)
				{
					$errMsg .= "Invalid Mastercard number";
				}
				else if(digitFromRightSide($cardNumber, 15) < 1 || digitFromRightSide($cardNumber, 15) > 5)
				{
					$errMsg .= "Invalid Mastercard number";
				}
				else
				{
					$_SESSION["card_number"] = digitFromRightSide($cardNumber, 16) . digitFromRightSide($cardNumber, 15) . "XX XXXX XXXX " . digitFromRightSide($cardNumber, 4) . digitFromRightSide($cardNumber, 3) . digitFromRightSide($cardNumber, 2) . digitFromRightSide($cardNumber, 1);
				}				
				if(!preg_match("/^[0-9]{3}$/", $cvvNumber))
				{
					$errMsg .= "Invalid cvv number";
				}
				else
				{
					$_SESSION["cvv_no"] = str_repeat("*", strlen($cvvNumber));
				}
			}
			else if($paymentType == "americanexpress")
			{
				if((!preg_match("/^[0-9]{15}$/", $cardNumber)) || digitFromRightSide($cardNumber, 15) != 3)
				{
					$errMsg .= "Invalid American express card number(3)";
				}
				else if(digitFromRightSide($cardNumber, 14) != 4 && digitFromRightSide($cardNumber, 14) != 7)
				{
					$errMsg .= "Invalid American express card number(47)";
				}
				else
				{
					$_SESSION["card_number"] = digitFromRightSide($cardNumber, 15) . digitFromRightSide($cardNumber, 14) . "XX XXXXXX X " . digitFromRightSide($cardNumber, 4) . digitFromRightSide($cardNumber, 3) . digitFromRightSide($cardNumber, 2) . digitFromRightSide($cardNumber, 1);
				}
				if(!preg_match("/^[0-9]{4}$/", $cvvNumber))
				{
					$errMsg .= "Invalid cvv number";
				}
				else
				{
					$_SESSION["cvv_no"] = str_repeat("*", strlen($cvvNumber));
				}
			}
			$card_number = $_SESSION['card_number'];
			$cvvNumber = $_SESSION['cvv_no'];
		}
		else
		{
			$errMsg .= "<p> Error: Please enter the card detials in the <a href=\"payment.php\"> form</a></p>";
		}
	}

	if(isset($_POST["expiry_month"]) && isset($_POST["expiry_year"]))
	{
		$expiryMonth = $_POST["expiry_month"];
		$expiryMonth = sanitise_input($expiryMonth);
		$expiryYear = $_POST["expiry_year"];
		$expiryYear = sanitise_input($expiryYear);
		$month = date("m");
		$year = date("y");

		if($expiryYear != NULL)
		{
			if((!preg_match("/^[0-9]{2}$/", $expiryYear)) || $expiryYear < $year)
			{
				$errMsg .= "Invalid year";
			}
			else
			{
				$_SESSION["expiry_year"] = $expiryYear;
			}
		}

		if($expiryMonth != NULL)
		{
			if((!preg_match("/^[0-9]{1,2}$/", $expiryMonth)) || ($expiryMonth < $month && $year == $expiryYear) || $expiryMonth > 12)
			{
				$errMsg .= "Invalid month";
			}
			else
			{
				$_SESSION["expiry_month"] = $expiryMonth;
			}
		}
		else
		{
			$errMsg .= "<p> Error: Please enter the expiry date of card in the <a href=\"enquire.php\"> form</a></p>";
			$expiryMonth = "Unknown year";
		}
	}

	if(isset($_POST["cardholder_name"]))
	{
		$cardHolderName = $_POST["cardholder_name"];
		$cardHolderName = sanitise_input($cardHolderName);
		if($cardHolderName != NULL)
		{
			if(!preg_match("/^[A-Za-z\\- \']{1,40}$/", $cardHolderName))
			{
				$errMsg .= "Invalid card holder name\n";
			}
			else
			{
				$_SESSION["cardholder_name"] = $cardHolderName;
			}
		}
		else
		{
			$errMsg .= "<p> Error: Please enter the card holder's name in the <a href=\"enquire.php\"> form</a></p>\n";
		}
	}

	if($errMsg != "")
	{
		echo "<p>$errMsg</p>";
		print_r($_SESSION["errArr"]);
		header("location: fix_order.php");
	}
	else
	{
		print_r($_SESSION);
		require_once("settings.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
		if(!$conn)
		{
			echo "<p>Datebase connection failure</p>";
		}
		else
		{
			$orderTime =  date("y-m-d H:i:s");
			$sqlString = "create table if not exists orders(order_id int(3) auto_increment primary key, first_name varchar(25), last_name varchar(25), email_id varchar(50), street_name varchar(40), suburb varchar(20), state varchar(3), postcode int(4), different_billing_address varchar(3), b_street_name varchar(40), b_suburb varchar(20), b_state varchar(3), b_postcode int(4), phone_number int(10), preferred_contact varchar(10), product varchar(20), feature varchar(30), members int(3), comments varchar(200), payment_type varchar(30), card_number varchar(16), expiry_month int(2), expiry_year int(2), cardholder_name varchar(40), cvv_no varchar(4), order_cost int(5), order_time datetime, order_status varchar(10))";
			//$sqlString = "drop table orders";
			$queryResult = mysqli_query($conn, $sqlString);
			$sqlString = "insert into orders(first_name, last_name, email_id, street_name, suburb, state, postcode, different_billing_address, b_street_name, b_suburb, b_state, b_postcode, phone_number, preferred_contact, product, feature, members, comments, payment_type, card_number, expiry_month, expiry_year, cardholder_name, cvv_no, order_cost, order_time, order_status) values ('$first_name', '$last_name', '$email_id', '$street_name', '$suburb', '$state', '$postcode', '$diffBillingAddress', '$b_street_name', '$b_suburb', '$b_state', '$b_postcode', '$phone_number', '$preferred_contact', '$category', '$product_features', '$no_of_members', '$comments', '$paymentType', '$card_number', '$expiryMonth', '$expiryYear', '$cardHolderName', '$cvvNumber', '$totalCost', '$orderTime', 'PENDING')";
			$queryResult = mysqli_query($conn, $sqlString);
			if($queryResult)
			{
				echo "Order submitted successfully. We will review the order details and get beck to you";

			}
			else
			{
				echo "Fail to submit order, Please try again!";
			}
			mysqli_close ($conn);
			session_destroy();
			header("location: receipt.php");
		}
	}
 
	function digitFromRightSide($number, $position)
	{
		return floor(($number / pow(10, $position - 1)) % 10);
	}

	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function validateAddress($streetName, $suburb, $state, $postcode)
	{
		$message = "";
		if($streetName != NULL)
		{
			if(!preg_match("/^[A-Za-z\\- \']+$/", $streetName))
			{
				$message .= "Invalid street name\n";
				$_SESSION["errArr"]['street_name_error'] = true;
			}	
		}
		else
		{
			$message .= "<p> Error: Please enter the street name in the <a href=\"payment.php\"> form</a></p>\n";
		}

		if($suburb != NULL)
		{
			if(!preg_match("/^[A-Za-z\\- \']+$/", $suburb))
			{
				$message .= "Invalid suburb name\n";
			}	
		}
		else
		{
			$message .= "<p> Error: Please enter the suburb name in the <a href=\"payment.php\"> form</a></p>\n";
		}


		if($state == "")
		{
			$message .= "<p> Error: Please select the state in the <a href=\"payment.php\"> form</a></p>";
		}

		if($postcode != NULL)
		{
			if(!preg_match("/^[0-9]{4}$/", $postcode))
			{
				$message .= "Invalid postcode";
			}

			switch($state)
			{
				case "VIC": if(digitFromRightSide($postcode, 4) != 3 && digitFromRightSide($postcode, 4) != 8)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "NSW": if(digitFromRightSide($postcode, 4) != 1 && digitFromRightSide($postcode, 4) != 2)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "QLD": if(digitFromRightSide($postcode, 4) != 4 && digitFromRightSide($postcode, 4) != 9)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "NT":  if(digitFromRightSide($postcode, 4) != 0)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "WA":  if(digitFromRightSide($postcode, 4) != 6)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "SA":  if(digitFromRightSide($postcode, 4) != 5)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "TAS": if(digitFromRightSide($postcode, 4) != 7)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
				case "ACT": if(digitFromRightSide($postcode, 4) != 0)
							{
								$message .= "Enter valid post code for " . $state;
							}
							break;
			}
		}
		else
		{
			$message .= "<p> Error: Please enter an postcode in the <a href=\"payment.php\"> form</a></p>";
			$postcode = "Unknown postcode";
		}
		return $message;
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