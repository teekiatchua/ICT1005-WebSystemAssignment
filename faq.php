<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title>TUMMY FOR YUM-YUM</title>
        <link rel="icon" href="image/1004 Logo 2.png">
        <meta name="description" content="YUM-YUM's restaurant and catering services FAQ page! Ask about operating hours, delivery and catering services here!">
        <meta name="keywords" content="restaurant, menu, reservation, delivery, operating, hours">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/faq.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <script defer src="js/formvalidation.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include "navbar.inc.php";
        ?>
        
        <section class="container-fluid imgcontainer">
            <img class="figimage" src="image/FAQ.png" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </section>
        <main>
        <article>
            <h1>Catering Inquiries</h1>
            <hr>
            <div class="container">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q1' data-toggle="collapse" href="#collapse1">Is cutlery provided?</a>
                            </h2>
                        </div>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">Yes, disposable cutlery is provided for all menus. Cutlery is provided 1:1
                            with additional buffer. Additional disposable cutlery is available at $0.50/set.

                        </div>


                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q2' data-toggle="collapse" href="#collapse2">Are additional warmers available?</a>
                            </h2>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">Additional warmers are not available.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q3' data-toggle="collapse" href="#collapse3">Are table decorations provided?</a>
                            </h2>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">All complete buffet set up includes a silk flower centerpiece (unless
                                otherwise indicated). Creative thematic set up services are available at an additional
                                price.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q4' data-toggle="collapse" href="#collapse4">What is the portion of the food provided
                                    like?</a>
                            </h2>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">We pride ourselves for using only quality ingredients and our servings
                                cater to the exact no. of guests based on your order. As good food runs out fast, we
                                encourage you to order an extra 10% to act as a buffer for your guests.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article>
            <h1>Delivery</h1>
            <hr>
            <div class="container">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q5' data-toggle="collapse" href="#collapse5">Can I do self-collection?</a>
                            </h2>
                        </div>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in">
                        <div class="panel-body">Yes, self-collection is available at 172 Ang Mo Kio Avenue 8, 567739
                        </div>


                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q6' data-toggle="collapse" href="#collapse6">Do you deliver on Public Holidays?</a>
                            </h2>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse">
                            <div class="panel-body">Yes, we deliver everyday.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q7' data-toggle="collapse" href="#collapse7">Do you deliver to venues without lift
                                    landing?</a>
                            </h2>
                        </div>
                        <div id="collapse7" class="panel-collapse collapse">
                            <div class="panel-body">A surcharge of $50 to $100 is applicable for delivery to venues without
                                lift landing as we will require additional help and effort to set up the different
                                components of the buffet set up.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a id='q8' data-toggle="collapse" href="#collapse8">Is there an extra charge for late
                                    collection?</a>
                            </h2>
                        </div>
                        <div id="collapse8" class="panel-collapse collapse">
                            <div class="panel-body">A surcharge of $50 is applicable for next day collection at our driver's
                                convenience, and a surcharge of $150 for collection between 11pm-1am latest.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </article>
        </main>
        <?php
            include "footer.inc.php";
        ?>
    </body>
</html>
