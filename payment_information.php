<!DOCTYPE html>
<html>
    <head>
        <title>TUMMY FOR YUM-YUM</title>
        <link rel="icon" href="image/1004 Logo 2.png">
        <meta name="description" content="YUM-YUM's restaurant and catering services checkout/payment page. Pay for your food after adding it in your shopping cart, safely and securely here! ">
        <meta name="keywords" content="restaurant, catering, menu, reservation, payment, checkout, shopping, cart">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/paymentinformation.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/paymentFormValidation.js"></script>
    </head>
    <body>
        <?php
        include "navbar.inc.php";
        ?>

        <section class="container-fluid imgcontainer">
            <img class="figimage" src="image/CHECKOUT.png" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </section>

        <?php
        session_start();
        if(!isset($_SESSION['shopping_cart'])) {
            header('Location: index.php');
        }
        else{
            ?>
        
        <!--Payment Form-->
            <form id="paymentForm" action="process_payment.php" method="post">
                <h1>PAYMENT INFORMATION</h1>
                <section class="col-sm-6">
                    <h2>Customer information:</h2>
                    <section class="form-group">
                        <label for="custname">Customer Name:</label>
                        <input type="text" class="form-control" placeholder="Enter your full name" id="custname" name="custname"
                               pattern="/^([a-zA-Z']+)$/" title="Please input a name" required>

                        <label for="custemail">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="custemail" name="custemail"
                               pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/"
                               title="Please input a valid email" required>

                        <label for="custnumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Enter contact number" id="custnumber" name="custnumber"
                               pattern="/^([0-9]{8})$/" maxlength="8" title="please input a valid number" required>
                    </section>

                    <h2>Address Information:</h2>
                    <section class="form-group">
                        <label for="streetadd">Street Name:</label>
                        <input type="text" class="form-control" placeholder="Enter street name" id="streetadd" name="streetadd"
                               pattern="/^([A-Za-z0-9'\.\-\#\s\,])+$/" title="Please input a valid address" required>

                        <label for="blknumber">Blk Number:</label>
                        <input type="tel" class="form-control" placeholder="Enter block number" id="blknumber" name="blknumber"
                               pattern="/^([0-9]{3})$/" maxlength="3" title="Please input a valid blk number" required>

                        <label for="unitnumber">Unit Number:</label>
                        <input type="tel" class="form-control" placeholder="Enter unit number: xx-xxx " id="unitnumber" name="unitnumber"
                               pattern="/^([0-9]{2}\-[0-9]{3})$/" maxlength="6" title="Please input a valid blk number" required>

                        <label for="zipcode">Zip Code:</label>
                        <input type="tel" class="form-control" placeholder="Enter zip code" id="zipcode" name="zipcode" pattern="/^([0-9]{6})$/"
                               maxlength="6" title="Please input a valid blk number" required>

                        <label for="deldate">Delivery Date:</label>
                        <input type="date" class="form-control" id="deldate" name="deldate" required>

                        <label for="deltime">Delivery Time:</label> <br>
                        <select id="deltime" name="deltime" required="true">
                            <option value="0">--Select Time--</option>
                            <option value="09am">09:00 AM</option>
                            <option value="10am">10:00 AM</option>
                            <option value="11am">11:00 AM</option>
                            <option value="12pm">12:00 PM</option>
                            <option value="01pm">01:00 PM</option>
                            <option value="02pm">02:00 PM</option>
                            <option value="03pm">03:00 PM</option>
                            <option value="04pm">04:00 PM</option>
                            <option value="05pm">05:00 PM</option>
                            <option value="06pm">06:00 PM</option>
                            <option value="07pm">07:00 PM</option>
                            <option value="08pm">08:00 PM</option>
                        </select>
                    </section>
                </section>

                <section class="col-sm-6">
                    <!--half of the bigger col-->
                    <h2>Credit Card Information:</h2>
                    <section class="form-group">
                        <label for="ccname">Full Name:</label>
                        <input type="text" class="form-control" placeholder="Enter your full name" id="ccname" name="ccname"
                               pattern="/^[a-zA-Z]+(([a-zA-Z ])?[a-zA-Z]*)*$/" title="Please input a name" required>

                        <label for="ccnumber">Credit Card Number:</label>
                        <input type="tel" class="form-control" placeholder="Enter credit card number" id="ccnumber" name="ccnumber"
                               pattern="/^([0-9]{16})$/" maxlength="16" title="Please input a valid credit card number" required>

                        <label for="expdate">Exp:</label>
                        <input type="tel" class="form-control" placeholder="Enter expiry month: mm/yy"
                               id="expdate" name="expdate" pattern="/^([0-9]{2}\/[0-9]{2})$/" maxlength="5" title="Please input a valid exp date"
                               required>

                        <label for="ccvnumber">CCV:</label>
                        <input type="tel" class="form-control" placeholder="Enter CCV number" id="ccvnumber" name="ccvnumber"
                               pattern="/^([0-9]{3})$/" maxlength="3" title="Please input a valid ccv number" required>
                    </section>
                </section>
                <button type="submit" id="btnPayment" class="btn btn-default">PROCEED TO CHECKOUT</button>
            </form>

        
        <?php
        }
        ?>

        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>
