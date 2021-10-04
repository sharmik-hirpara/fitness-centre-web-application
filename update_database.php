<?php

    if(isset($_POST['orderID']) && isset($_POST['new_order_status'])) {
        $orderID = sanitise_input($_POST['orderID']);
        $new_order_status = sanitise_input($_POST['new_order_status']);
        $new_order_status = strtoupper($new_order_status);

        $query = "UPDATE orders SET order_status='$new_order_status' WHERE order_id=$orderID";

        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if(!$conn)
            echo "<p>Datebase connection failure</p>";
        else {
            $result = mysqli_query($conn, $query);
            if($result)
                echo "Order status has been changed to " . $new_order_status;
            else
                echo "Something went wrong please update it manually!";
            mysqli_close($conn);
        }
    }
    

    

    function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>