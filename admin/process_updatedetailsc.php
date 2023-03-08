<?php

// Constants for accessing our DB:
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_5");
define("DBUSER", "p2_5");
define("DBPASS", "rBs4CTxkDU");

//Admin_Catering
$orderID = $customerID = $deliveryDate = $deliveryTime = $orderPax = $orderQuantity = $orderItems = "";

$success = true;

//Sanitize inputs
$orderID = sanitize_input($_POST["orderID"]);
$customerID = sanitize_input($_POST["customerID"]);
$name = sanitize_input($_POST["name"]);
$mobileNumber = sanitize_input($_POST["mobileNumber"]);
$orderPax = sanitize_input($_POST["orderPax"]);
$orderQuantity = sanitize_input($_POST["orderQuantity"]);
$orderItems = sanitize_input($_POST["orderItems"]);

//Delivery Date
if (empty($_POST["deliveryDate"])) {
    $errorMsg .= "Delivery Date is required.";
    $success = false;
} else {
    $deliveryDate = sanitize_input($_POST["deliveryDate"]);
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($success) {
    updateReservation();
    header("location: admin_catering.php");
    echo '<script>alert("Data has been updated successfully."); </script>';
} else {
    echo '<script>alert("Data update failed. Please try again."); </script>';
}

function updateReservation() {

    if (isset($_POST['updatebutton'])) {
        $orderID = $_POST['orderID'];
        $customerID = $_POST['customerID'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileNumber = $_POST['mobileNumber'];
        $deliveryDate = $_POST['deliveryDate'];
        $deliveryTime = $_POST['deliveryTime'];
        $orderPax = $_POST['orderPax'];
        $orderQuantity = $_POST['orderQuantity'];
        $orderItems = $_POST['orderItems'];

        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } else {
            $sql = "UPDATE customer_information SET deliveryDate = '$deliveryDate', deliveryTime = '$deliveryTime' WHERE customer_id = '$customerID'";
            if (!$conn->query($sql)) {
                $errorMsg = "Database error: " . $conn->error;
                $success = false;
            }
        }
    }

    $conn->close();
}

?>