<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>HONEY-LAB</title>
        <link rel="icon" href="image/1004 Logo 2.png">
        <meta name="description" content="YUM-YUM's restaurant and catering services checkout/payment page. Pay for your food after adding it in your shopping cart, safely and securely here! ">
        <meta name="keywords" content="restaurant, catering, menu, reservation, payment, checkout, shopping, cart">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/reservation.css">
        <link rel="stylesheet" href="css/shoppingcart.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/paymentFormValidation.js"></script>
        <script src="js/shopcart.js"></script>
    </head>
    <body>
        <?php
            include "navbar.inc.php";
        ?>
        
        <section class="container-fluid imgcontainer">
            <img class="figimage" src="image/CHECKOUT.png" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </section>

        <!--Payment Form-->
        <form id="paymentForm" class="row" action="/action_page.php" method="POST">
            <section class="col-sm-7">
                <!--7 col out of 12 col for payment information-->
                <h1>PAYMENT INFORMATION</h1>
                <section class="col-sm-6">
                    <!--half of the bigger col-->
                    <h2>Customer information:</h2>
                    <section class="form-group">
                        <label>Customer Name:*</label>
                        <input type="text" class="form-control" placeholder="Enter your full name" id="custname"
                               pattern="[A-Za-z]{99}" title="Please input a name" required>

                        <label>Email address:*</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="custemail"
                               pattern="([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$"
                               title="Please input a valid email" required>

                        <label>Contact Number:*</label>
                        <input type="tel" class="form-control" placeholder="Enter contact number" id="cnumber"
                               pattern="[\d]{8}" maxlength="8" title="please input a valid number" required>
                    </section>

                    <h2>Address:</h2>
                    <section class="form-group">
                        <label>Street Name:*</label>
                        <input type="text" class="form-control" placeholder="Enter street name" id="streetadd"
                               pattern="[A-Za-z0-9'\.\-\#\s\,]+$" title="Please input a valid address" required>

                        <label>Blk Number:*</label>
                        <input type="tel" class="form-control" placeholder="Enter block number" id="blknumber"
                               pattern="[A-Za-z0-9'\.\-\#\s\,]+$" title="Please input a valid blk number" required>

                        <label>Unit Number:*</label>
                        <input type="tel" class="form-control" placeholder="Enter unit number" id="unitnumber"
                               pattern="\d+\-+\d+$" title="Please input a valid blk number" required>

                        <label>Zip Code:*</label>
                        <input type="tel" class="form-control" placeholder="Enter zip code" id="zipcode" pattern="^\d{6}$"
                               title="Please input a valid blk number" required>

                        <label>Delivery Date:*</label>
                        <input type="date" class="form-control" id="deldate" required>

                        <label>Delivery Time (hour:min:AM/PM):*</label>
                        <input type="time" class="form-control" id="deltime" required>
                    </section>
                </section>

                <section class="col-sm-6">
                    <!--half of the bigger col-->
                    <h2>Credit Card Information:</h2>
                    <section class="form-group">
                        <label>Full Name:*</label>
                        <input type="text" class="form-control" placeholder="Enter your full name" id="ccname"
                               pattern="[A-Za-z]{2,30}$" title="Please input a name" required>

                        <label>Credit Card Number:*</label>
                        <input type="tel" class="form-control" placeholder="Enter credit card number" id="ccnumber"
                               pattern="^\d{16}$" maxlength="16" title="Please input a valid credit card number" required>

                        <label>Exp:*</label>
                        <input type="tel" class="form-control" placeholder="Enter expiry month Example: mm-yy (10/20)"
                               id="expdate" pattern="^\d{2}\/\d{2}$" maxlength="5" title="Please input a valid exp date"
                               required>

                        <label>CCV:*</label>
                        <input type="tel" class="form-control" placeholder="Enter CCV number" id="ccvnumber"
                               pattern="^\d{3}$" maxlength="3" title="Please input a valid ccv number" required>
                    </section>
                </section>
                <button type="submit" id="btnPayment" class="btn btn-default">CHECKOUT</button>
                <h4>*information must be filled</h4>
            </section>

            <section class="col-sm-5">
                <!--5 col out of 12 col for cart information-->
                <h1>CART</h1>
                <table class="carttable">
                    <tr>
                        <th colspan="2">CANCEL ORDERED ITEMS:</th>
                        <th>Quantity:</th>
                        <th>Price:</th>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-default btn-lg rowbtn"
                                    onclick="SomeDeleteRowFunction(this)"><span
                                    class="glyphicon glyphicon-remove"></span></button>
                            Chicken
                        </td>
                        <td></td>
                        <td>3</td>
                        <td>$120</td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-default btn-lg rowbtn"
                                    onclick="SomeDeleteRowFunction(this)"><span
                                    class="glyphicon glyphicon-remove"></span></button>
                            Beef
                        </td>
                        <td></td>
                        <td>2</td>
                        <td>$150</td>

                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-default btn-lg rowbtn"
                                    onclick="SomeDeleteRowFunction(this)"><span
                                    class="glyphicon glyphicon-remove"></span></button>
                            Fish
                        </td>
                        <td></td>
                        <td>1</td>
                        <td>$80</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>$80</td>
                    </tr>
                </table>
            </section>
        </form>
        
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
