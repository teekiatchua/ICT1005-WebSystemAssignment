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
            <?php
            $connect = mysqli_connect('161.117.122.252', 'p2_5', 'rBs4CTxkDU', 'p2_5');
            $query = "SELECT * FROM p2_5.catering_menu ORDER BY cmenu_id ASC";
            $result = mysqli_query($connect, $query);

            if ($result):
                if (mysqli_num_rows($result) > 0):
                    while ($product = mysqli_fetch_assoc($result)):
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <form method="post" action="TESTMENU.php?action=add&id=<?php echo $product['cmenu_id']; ?>">
                                <div class="products">
                                    <img src="image/<?php echo $product['cmenu_image']; ?>" title="<?php echo $product['alt_text']?>" alt="<?php echo $product['alt_text']?>" class="img-responsive" />
                                    <h1 class="text-info"><?php echo $product['cmenu_name']; ?></h1>
                                    <h2>Set includes:</h2>
                                    <h3 class="text-secondary"><?php echo nl2br($product['cmenu_description']); ?></h3><br>
                                    <h2>Pax: <?php echo $product['cmenu_pax']; ?></h2>
                                    <h3>Price: $<?php echo $product['cmenu_price']; ?></h3>
                                    <input type="hidden" name="name" value="<?php echo $product['cmenu_name']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $product['cmenu_price']; ?>" />
                                    <input type="hidden" name="pax" value="<?php echo $product['cmenu_pax']; ?>" />
                                </div>
                            </form>
                        </div>
                        <?php
                    endwhile;
                endif;
            endif;
            ?>
        </div>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>  
</html>
