<?php
// Constants for accessing our DB:
define("DBHOST", "161.117.122.252");
define("DBNAME", "p2_5");
define("DBUSER", "p2_5");
define("DBPASS", "rBs4CTxkDU");
$fullname = $orderid = $email = $date = $time = $price = $errorMsg = "";
$success = true;

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if ($conn->connect_error) {
    $errorMsg = "Connection failed: " . $conn->connect_error;
    $success = false;
} else {
    $success;
}

$ALFRED = "";
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>
        <title>TUMMY FOR YUMMY</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/admin_order.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">


        <script defer src="../js/admin.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>

        <main class="page-container">
<?php
include 'adminHeader.inc.php';
?>

            <article>
                <section>
                    <div class="jumbotron">
                        <h1>View Catering Orders</h1>
                    </div>
                    <div class="container">
                        <div class="table-responsive">
                            <input type="text" id="searchInput" onkeyup="tableFunction()" placeholder="Search"
                                   aria-label="Search">
                            <table id="orderTable" class="table table-striped table-hover">
<?php
$sql = "SELECT customer_order.order_id, customer_information.email, customer_information.name, customer_order.productName, customer_order.quantity, ";
$sql .= "customer_order.pax, customer_order.price, customer_information.mobileNumber, customer_information.deliveryDate, ";
$sql .= "customer_information.deliveryTime, customer_information.customer_id";
$sql .= " FROM customer_order INNER JOIN customer_information ON customer_order.cust_id = customer_information.customer_id";
$result = $conn->query($sql);
?>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Pax</th>
                                        <th>Quantity</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
<?php
if ($result->num_rows > 0) {
    foreach ($result as $row) {
        ?>
                                        <tbody>
                                            <tr>
                                                <td class="counterCell"></td>
                                                <td><?php echo $row['order_id']; ?></td>
                                                <td><?php echo $row['customer_id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['mobileNumber']; ?></td>
                                                <td><?php echo $row['deliveryDate']; ?></td>
                                                <td><?php echo $row['deliveryTime']; ?></td>
                                                <td><?php echo $row['pax']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['productName']; ?></td>
                                                <td><button type="button" class="btn btn-primary btn-xs updatebtn" title="Update Details"><span class="glyphicon glyphicon-edit"></span></button></td>
                                            </tr>
        <?php
    }
    (isset($result)) ? $result->free_result() : "";
    unset($row);
} else {
    ?>    
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No Data Available!</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    <?php
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </article>

            <!-- View Catering Details Modal -->
            <div class="modal fade" id="updateCatering" tab-index="-1" role="dialog" aria-labelledby="viewCaterinngDetails" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Catering Details</h4>
                        </div>
                        <form action="process_updatedetailsc.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="customerID" id="customerID" class="form-control" placeholder="Customer ID" readonly>
                                <div class="form-group">
                                    <label> Order ID </label>
                                    <input type="text" name="orderID" id="orderID" class="form-control" placeholder="Order ID" readonly>
                                </div>
                                <div class="form-group">
                                    <label> Customer Name </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name" readonly>
                                </div> 
                                <div class="form-group">
                                    <label> Mobile Number </label>
                                    <input type="text" name="mobileNumber" id="mobileNumber" class="form-control" placeholder="Mobile Number" readonly>
                                </div>  
                                <div class="form-group">
                                    <label> Delivery Date </label>
                                    <input type="text" name="deliveryDate" id="deliveryDate" class="form-control" placeholder="Delivery Date (YYYY-MM-DD)" required>
                                </div>
                                <div class="form-group">
                                    <label> Delivery Time </label>
                                    <input type="text" name="deliveryTime" id="deliveryTime" class="form-control" placeholder="Delivery Time" required>
                                </div>
                                <div class="form-group">
                                    <label> Order Pax </label>
                                    <input type="text" name="orderPax" id="orderPax" class="form-control" placeholder="Order Pax" onkeypress="javascript:return isNumber(event)" readonly>
                                </div> 
                                <div class="form-group">
                                    <label> Order Quantity </label>
                                    <input type="text" name="orderQuantity" id="orderQuantity" class="form-control" placeholder="Order Quantity" onkeypress="javascript:return isNumber(event)" readonly>
                                </div>
                                <div class="form-group">
                                    <label> Order Items </label>
                                    <input type="text" name="orderItems" id="orderItems" class="form-control" placeholder="Order Item" readonly>
                                </div>        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark" name="updatebutton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                //To hide 'customer_id'
                $("td:nth-of-type(3)").hide();

                $(document).ready(function () {
                    $('.updatebtn').on('click', function () {
                        $('#updateCatering').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#orderID').val(data[1]);
                        $('#customerID').val(data[2]);
                        $('#name').val(data[3]);
                        $('#mobileNumber').val(data[4]);
                        $('#deliveryDate').val(data[5]);
                        $('#deliveryTime').val(data[6]);
                        $('#orderPax').val(data[7]);
                        $('#orderQuantity').val(data[8]);
                        $('#orderItems').val(data[9]);

                    });
                });
            </script>

<?php
include 'adminFooter.inc.php';
?>

        </main>
    </body>


</html>
