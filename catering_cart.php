<?php
session_start();
$product_ids = array();
//session_destroy();
$connect = mysqli_connect('161.117.122.252', 'p2_5', 'rBs4CTxkDU', 'p2_5');

//check if Add to Cart button has been submitted
if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {
        //keep track of how many products are in the shopping cart
        $count = count($_SESSION['shopping_cart']);

        //create sequential array for matching array keys to products ids
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
            $_SESSION['shopping_cart'][$count] = array
                (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price') * filter_input(INPUT_POST, 'quantity'),
                'pax' => filter_input(INPUT_POST, 'pax') * filter_input(INPUT_POST, 'quantity'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        } else { //product already exists, increase quantity
            //match array ket to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    //add item quantity to he existing product in the array
                    $_SESSION['shopping_cart'][$i]['pax'] = (filter_input(INPUT_POST, 'pax') * filter_input(INPUT_POST, 'quantity'));
                    $_SESSION['shopping_cart'][$i]['quantity'] = filter_input(INPUT_POST, 'quantity');
                    $_SESSION['shopping_cart'][$i]['price'] = (filter_input(INPUT_POST, 'price') * filter_input(INPUT_POST, 'quantity'));
                }
            }
        }
    } else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, starting from key 0 and fill it values
        $_SESSION['shopping_cart'][0] = array
            (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'pax' => filter_input(INPUT_POST, 'pax'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if (filter_input(INPUT_GET, 'action') == 'delete') {
    //loop through all products in the shopping cart until it matches with GET id variables
    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            //remove product from shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

if (filter_input(INPUT_GET, 'action') == 'addtodb') {
//    //storing array values into database
    foreach ($_SESSION['shopping_cart'] as $key => $product) {
        $sql = "INSERT INTO p2_5.customer_order (productName, quantity, totalPrice, pax)";
        $sql .= " VALUES ('{$product['name']}', '{$product['quantity']}', '{$product['price']}', '{$product['pax']}')";
        header("Location: payment_information.php"); 
       if ($connect->query($sql)) {
            $errorMsg = "Connection failed: " . $connect->connect_error;
            $success = false;
        } 
    }
}

?>

<!DOCTYPE html>  
<html lang="en">  
    <head>
        <title>TUMMY FOR YUMMY</title>
        <link rel="icon" href="image/1004_Logo_2.png">
        <meta name="description" content="YUM-YUM's restaurant and catering services food menu. We provide a huge selection of dishes, including vegetarian!">
        <meta name="keywords" content="restaurant, catering, menu, vegetarian, food">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/cater.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />

        <script defer src="js/menu.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head> 
    <body>  
        <?php
        include "navbar.inc.php";
        ?>

        <div class="container-fluid imgcontainer">
            <img class="figimage" src="image/CATERING.png" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </div>
        <main>
        <div class="container">
            <h1>Please Select the following set:</h1>
            <?php
            $query = "SELECT * FROM p2_5.catering_menu ORDER BY cmenu_id ASC";
            $result = mysqli_query($connect, $query);

            if ($result){
                if (mysqli_num_rows($result) > 0){
                    while ($product = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <form method="post" action="catering_cart.php?action=add&id=<?php echo $product['cmenu_id']; ?>">
                                <section class="products">
                                    <img src="image/<?php echo $product['cmenu_image']; ?>" class="img-responsive" alt="menu image"/>
                                    <h2 class="text-info"><?php echo $product['cmenu_name']; ?></h2>
                                    <h3>Set Contains: </h3>
                                    <h4 class="text-info"><?php echo nl2br($product['cmenu_description']); ?></h4>
                                    <h4>Price: $<?php echo $product['cmenu_price']; ?></h4>
                                    <h4>Pax: <?php echo $product['cmenu_pax']; ?></h4>
                                    <input type="number" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="name" value="<?php echo $product['cmenu_name']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $product['cmenu_price']; ?>" />
                                    <input type="hidden" name="pax" value="<?php echo $product['cmenu_pax']; ?>" />
                                    <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-info" value="Add to Cart" />
                                </section>
                            </form>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <div style="clear:both"></div>
            <br />
            <div class="table-responsive">
                <table class="table">
                    <tr><th colspan="6"><h2>Order Details</h2></th></tr>
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Price</th>
                        <th width="10%">Pax</th>
                        <th width="10%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION['shopping_cart'])){
                        $total = 0;
                        $totalpax = 0;
                        foreach ($_SESSION['shopping_cart'] as $key => $product){
                            ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td>$ <?php echo $product['price']; ?></td>
                                <td><?php echo $product['pax']; ?></td>
                                <td>$ <?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                                <td>
                                    <a href="catering_cart.php?action=delete&id=<?php echo $product['id']; ?>">
                                        <div class="btn-danger">Remove</div>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $total = $total + ($product['price'] * $product['quantity']);
                        }
                        ?>
                        <tr>
                            <td>TOTAL:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>$ <?php echo number_format($total, 2); ?></td>
                        <hr>
                            <td></td>
                        </tr>
                        <tr>
                            <!--Show checkout button only if the shopping cart is not empty-->
                          
                            <td colspan="5">
                                <?php
                                if (isset($_SESSION['shopping_cart'])){
                                    if (count($_SESSION['shopping_cart']) > 0){
                                        ?>
                                        <a href="payment_information.php" class="button">CheckOut</a>
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>  
</html>
