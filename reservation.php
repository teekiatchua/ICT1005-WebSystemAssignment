<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title>HONEY-LAB</title>
        <link rel="icon" href="image/1004_Logo_2.png">
        <meta name="description" content="YUM-YUM's restaurant and catering services reservation form. Book your table online here! Easy and hassle-free!">
        <meta name="keywords" content="restaurant, menu, reservation, book, online, easy">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/reservation.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/reservationFormValidation.js"></script>
    </head>
    <body>
        <?php
            include "navbar.inc.php";
        ?>
        
        <div class="container-fluid imgcontainer">
            <img title="header image" class="figimage" src="image/RESERVATION.png" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </div>

        <main>
        
        <form id="reservationForm" class="container reservationForm" action="process_reservation.php" method="post">
            <h1>RESERVATION FORM</h1>
            <div class="form-group">
                <label for="res_First_Name">First Name:</label>
                <input type="text" class="form-control" placeholder="Enter first name" id="res_First_Name" name="res_First_Name" pattern="/^([a-zA-Z']+)$/"
                        required>

                <label for="res_Last_Name">Last Name:</label>
                <input type="text" class="form-control" placeholder="Enter last name" id="res_Last_Name" name="res_Last_Name" pattern="/^([a-zA-Z']+)$/"
                       required>

                <label for="resEmail">Email address:</label>
                <input type="email" class="form-control" placeholder="Enter email" id="resEmail" name="resEmail"
                       pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/"
                        required>

                <label for="res_ContactNumber">Contact Number:</label>
                <input type="tel" class="form-control" placeholder="Enter contact number" id="res_ContactNumber" name="res_ContactNumber" pattern="/^([0-9]{8})$/"
                       maxlength="8" required>

                <label for="resDate">Date:</label>
                <input type="date" class="form-control" id="resDate" name="resDate" required>

                <label for="resTime">Time:</label> <br>
                <select id="resTime" name="resTime" required>
                    <option value="0">--Select Time--</option>
                    <option value="5pm">5:00 PM</option>
                    <option value="6pm">6:00 PM</option>
                    <option value="7pm">7:00 PM</option>
                    <option value="8pm">8:00 PM</option>
                    <option value="9pm">9:00 PM</option>
                    <option value="10pm">10:00 PM</option>
                </select>
                <br>

                <label for="resPax">Number of people:</label>
                <input type="tel" class="form-control" placeholder="Enter pax" id="resPax" name="resPax" pattern="/^([0-9])+$/" maxlength="3"
                        required>

                <label for="res_comment">Request:</label><br>
                <textarea id="res_comment" name="res_comment" placeholder="If no request, input 'NIL'" data-pattern="/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/" required></textarea>
            </div>

            <button type="submit" id="btnReservation" class="btn btn-default">Submit Reservation</button>

        </form>
        
        </main>    
            
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
