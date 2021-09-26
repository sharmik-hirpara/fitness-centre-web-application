<?php 
	session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

	<form id="manager" method="post" action="manager.php">
	<fieldset>
		<legend>Search Order Details</legend>
		
		<p class="row"><label for="customer_first_name">Customer First Name: </label>
		<input type="text" name="customer_first_name" id="customer_first_name" /></p>
		
		<p class="row"><label for="customer_last_name">Customer Last Name: </label>
		<input type="text" name="customer_last_name" id="customer_last_name" /></p>
		
		<p class="row"><label for="product">Product: </label>
		<select name="product" id="product">
		<option value="default">Select product</option>
		<option value="gymnastics">Gymnastis</option>
		<option value="swimming">Swimming</option>
		<option value="yoga">Yoga</option>
		</select></p>
		
		<p class="row"><label for="order_status">Order status: </label>
		<select name="order_status" id="order_status">
		<option value="default">Select Order Status</option>
		<option value="pending">Pending</option>
		<option value="fulfilled">Fulfilled</option>
		<option value="paid">Paid</option>
		<option value="achived">Archieved</option>
		</select></p>

		<p class="row"><label for="sort_by">Sort by: </label>
		<select name="field" id="field">
		<option value="default">Select Field</option>
		<option value="first_name">First Name</option>
		<option value="last_name">Last Name</option>
		<option value="product">Product</option>
		<option value="order_status">Order Status</option>
		<option value="order_cost">Order Cost</option>
		</select>
		<select name="sort_by" id="sort_by">
		<option value="default">Select sort by</option>
		<option value="ascending">Ascending</option>
		<option value="descending">Descending</option>
		</select></p>

		<input type= "submit" name="search" value="Search"/>
		<input type="reset" value="Reset fields">
	</fieldset>
	</form>

<?php
	require_once("settings.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if(!$conn)
	{
		echo "<p>Datebase connection failure</p>";
	}
	else
	{
		$sql_table = "orders";
		$_SESSION['orderID'] = $_SESSION['orderID'] != NULL ? $_SESSION['orderID'] : array();
		$_SESSION['nextOrderStatus'] = $_SESSION['nextOrderStatus'] != NULL ? $_SESSION['nextOrderStatus'] : array();
		if(isset($_POST['search']))
		{
			echo "search database";
			$search = NULL;
			if(isset($_POST['customer_first_name']))
			{
				if($_POST['customer_first_name'] != NULL)
				{
					$search = sanitise_input($_POST["customer_first_name"]);
					$rowName = "first_name";
				}
				else
				{
					$search = NULL;
				}
			}

			if(isset($_POST['customer_last_name']) && $search == NULL)
			{
				if($_POST['customer_last_name'] != NULL)
				{
					$search = sanitise_input($_POST["customer_last_name"]);
					$rowName = "last_name";
				}
				else
				{
					$search = NULL;
				}
			}	

			if(isset($_POST['product']) && $search == NULL)
			{
			if($_POST['product'] != "default")
			{
				$search = sanitise_input($_POST["product"]);
				$rowName = "product";
			}
			else
			{
				$search = NULL;
			}
			}

			if(isset($_POST['order_status']) && $search == NULL)
			{
				if($_POST['order_status'] != "default")
				{
					$search = sanitise_input($_POST["order_status"]);
					$rowName = "order_status";
				}
				else
				{
					$search = NULL;
				}
			}

			$field = "";
			$sort_by = "";
			if(isset($_POST['field']) && isset($_POST['sort_by']))
			{
				if($_POST['field'] != "default" && isset($_POST['sort_by']))
				{
					$field = sanitise_input($_POST["field"]);
					$sort_by = sanitise_input($_POST["sort_by"]);
					if($sort_by == "ascending")
					{
						$sort_by = "ASC";
					}
					else
					{
						$sort_by = "DESC";
					}
				}
			}

			if($search != NULL)
			{
				echo "<form id=\"result\" method=\"post\" action=\"manager.php\">";
				echo "<fieldset id=\"result\">";
				echo "<legend>Result</legend>";
				$query = "select * FROM orders WHERE $rowName like '$search%'";
				if($field != "")
				{
					$query .= " ORDER BY $field $sort_by";
				}
				echo $query;

				$result = mysqli_query($conn,  $query);
				if(!$result)
				{
					echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
				}
				else
				{
					echo "<table border = \"1\">\n";
					echo "<tr>\n"
							."<th scope = \"col\">order_id</th>\n"
							."<th scope = \"col\">first_name</th>\n"
							."<th scope = \"col\">last_name</th>\n"
							."<th scope = \"col\">product</th>\n"
							."<th scope = \"col\">feature</th>\n"
							."<th scope = \"col\">order_cost</th>\n"
							."<th scope = \"col\">order_time</th>\n"
							."<th scope = \"col\">order_status</th>\n"
							."<th scope = \"col\">next_action</th>\n"
							."</tr>\n";

					$i = 0;
					$tempID = "";
					$tempStatus = "";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>\n";
						echo "<td align='center'>", $row["order_id"], "</td>\n";
						$_SESSION['orderID'][$i] = $row["order_id"];
						$tempID = $_SESSION['orderID'][$i];
						echo $tempID;
						echo "<td align='center'>", $row["first_name"], "</td>\n";
						echo "<td align='center'>", $row["last_name"], "</td>\n";
						echo "<td align='center'>", $row["product"], "</td>\n";
						echo "<td align='center'>", $row["feature"], "</td>\n";
						echo "<td align='center'>", $row["order_cost"], "</td>\n";
						echo "<td align='center'>", $row["order_time"], "</td>\n";
						echo "<td align='center'>", $row["order_status"], "</td>\n";
						$tempStatus = $row["order_status"];
						echo "<td align='center'>
								<select name=\"next_order_status\" id=\"next_order_status\" style=\"width: 100%\" onchange= \"storeNextOrderStatus(this.value, $tempID)\">
								<option value=\"default\">Next Action</option>
								<option value=\"pending\">Pending</option>
								<option value=\"fulfilled\">Fulfilled</option>
								<option value=\"paid\">Paid</option>
								<option value=\"achived\">Archieved</option>
								</select>
							</td>\n";
						$_SESSION['nextOrderStatus'][$i] = 'default';
						echo "</tr\n>";
						$i++;
					}
					echo "</table>\n";
					echo "<input type= \"submit\" name=\"saveChanges\" id=\"saveChanges\" value=\"Save changes\" />";
				}
				echo "</fieldset>";
				echo "</form>";
			}
		}	
		else if(isset($_POST['saveChanges']) && isset($_POST['next_order_status']))
		{
			echo "Update database";
		}
		mysqli_close($conn);
	}

	function sanitise_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<script type="text/javascript">

	function storeNextOrderStatus(value, iD)
	{
		alert(iD + value);
		$.ajax({
			type: "POST",
			url: 'https://mercury.swin.edu.au/cos60004/s101980352/assign3/manager.php',
			data: 'next_order_status=' + value,
			success: function(data)
			{
				alert("Sucess");
				$('next_order_status').html(html);
			}
		});
	}
</script>

</body>
</html>