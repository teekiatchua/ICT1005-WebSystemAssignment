<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title>HONEY-LAB: HONEY FOR ALL</title>
        <link rel="icon" href="image/1004_Logo_2.png">
        <meta name="description" content="YUM-YUM is a Singapore restaurant and catering business. Wide range of affordable and delicious food. Open all-day, seven days a week.">
        <meta name="keywords" content="restaurant, catering, menu, reservation, home, food, open, 7">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" />

        <script defer src="js/admin.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include "navbar.inc.php";
        ?>
        
    <main>
        <div class="container-fluid">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                </ul>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active ">
                        <img src="image/restaurant3wide.jpg" alt="reservationimage" class="img-responsive">
                        <section class="carousel-caption">
                            <h1 class="carousel-txt-size">WELCOME</h1>
                            <button onclick="window.location.href='reservation.php'" class="btncaro">RESERVE A
                                TABLE</button>
                        </section>
                    </div>
                    
                    <div class="item">
                        <img src="image/catering.jpg" alt="cateringimage" class="img-responsive">
                        <section class="carousel-caption">
                            <h1 class="carousel-txt-size">CATERING</h1>
                            <button onclick="window.location.href='catering.php'" class="btncaro">ORDER NOW</button>
                        </section>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div id="container_aboutus" class="container">
            <div class="row">
                <section class="col-sm-6">
                    <h2 class="history-txt-size">HISTORY</h2>
                    <h2>ABOUT US</h2>
                    <P>Welcome to our website, where we proudly produce the finest, purest honey available! We're passionate about bees and the delicious, 
                        golden nectar they create, and we're thrilled to share our passion with you.</P>
                    <p>Our bees are carefully tended and our honey is expertly harvested and bottled to ensure the highest quality product possible. 
                        We offer a range of honey varieties, from classic wildflower honey to specialty blends infused with herbs, spices, and fruits. 
                        Whether you're looking for something sweet to spread on your toast, a natural sweetener for your tea or coffee, 
                        r a unique ingredient for your culinary creations, we've got you covered.</p>
                    <p>
                        Our website is your one-stop-shop for all things honey. Browse our selection of products, learn more about our bees and our process, and find inspiration for how to incorporate honey into your daily life. We also offer resources and tips for beekeeping and sustainability, so you can join us in our mission to protect and preserve these amazing creatures.
                    </p>
                    <p>
                        Thank you for visiting our website and supporting our small, family-owned business. We hope you'll love our honey as much as we do!
                    </p>
                </section>

                <figure id="home" class="col-sm-6">
                     <img src="image/kitchen.jpg" class="img-responsive" alt="kitchen">
                    <!--Url: https://unsplash.com/photos/zk5vJ8Duw9k | Author: Hansel Louis | Publish: August, 2019 | Publisher: Unsplash | Visited: October 5, 2019-->
                </figure>
            </div>
            <button onclick="window.location.href='about_contact.php'" class="btn-RM">READ MORE</button>
        </div>
    </main>

    <!-- Admin Login Modal Form -->
    <div id="adminLogin" class="modal">
        <span onclick="document.getElementById('adminLogin').style.display='none'" class="close"
              title="Close Modal">&times;
        </span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="admin/process_login.php" method="post">

            <div class="flex-container">
                <label for="email"><b>Enter Email</b></label>
                <input type="email" id="email" placeholder="Enter email" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" required>

                <label for="password"><b>Enter Password</b></label>
                <input type="password" id="password" placeholder="Enter Password" name="password" required>

                <button type="submit" id="loginbtn">Login</button>
                <label>
                    <input type="checkbox" id="rememberme" checked="checked"> Remember me
                </label>
            </div>

            <div class="containerbottom">
                <button type="button" onclick="document.getElementById('adminLogin').style.display='center'"
                        class="cancelbtn btn btn-dark" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
        
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
