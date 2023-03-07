<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title>GREATEST HONEY</title>
        <link rel="icon" href="image/1004 Logo 2.png">
        <meta name="description" content="Boasting a wide variety selection of honey, find out more information about HONEY-LAB's PRODUCTION services here.">
        <meta name="keywords" content="PRODUCTION, HONEY, Singapore, CUSTOM, IMPORTED, HOMEGROWN, Contact, About">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/about_contact.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script src="js/contactFormValidation.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include "navbar.inc.php";
        ?>
        <main>
        <section class="container-fluid imgcontainer">
            <img class="figimage" src="image/ABOUTUS.PNG" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </section>

        <section class="container">
            <article>
                <h1>About us</h1>
                <hr>
                <p>
                    HONEY LAB PARA PARA PARA...
                </p>
            </article>
        </section>

        <section class="container">
            <article>
                <h1>Get in Touch</h1>
                <hr>
                <div id="contactusRow" class="row">
                    <div id="contactmap" class="col-sm-7">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665252371279!2d103.8466486145811!3d1.3775233989953357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1570768423752!5m2!1sen!2ssg"
                            width="600" height="400" frameborder="0" style="border:0;" allowfullscreen="" title="google map of YUM YUM location">
                        </iframe>
                    </div>
                    
                    <div id="contactus" class="col-sm-5">
                        <form id="contactForm" action="process_contact.php" method="post">
                            <div class="form-group">
                                <label for="contactName">Name:</label>
                                <input type="text" class="form-control" id="contactName" name="contactName" placeholder="NAME" pattern="/^([a-zA-Z']+)$/" required="true">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" required="true">
                            </div>
                            
                            <div class="form-group">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="tel" class="form-control" id="contactPhoneNumber" name="contactPhoneNumber" placeholder="PHONE NUMBER" pattern="/^([0-9]{8})$/" maxlength="8" required="true">
                            </div>
                            
                            <div class="form-group">
                                <label for="feedback">Feedback/Message:</label>
                                <textarea class="form-control" id="contactMessage" name="contactMessage" placeholder="MESSAGE" pattern="/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/" required="true"></textarea>
                            </div>
                            
                            <button type="submit" id="btnSubmit" class="btn btn-default">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </article>
        </section>
        </main>
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
