<?php
$connect = mysqli_connect('161.117.122.252', 'p2_5', 'rBs4CTxkDU', 'p2_5');
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
        <link rel="stylesheet" href="css/menu.css">
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
            <img class="figimage" src="image/APPETIZER.jpg" alt="topimage">
            <!--Url: https://www.flickr.com/photos/inthe-arena/13727335133/in/explore-2014-04-08 | Title: Takito | Author: Seaman Andrea | Publish: April,2014 | Publisher: Flickr | Visted: October 5, 2019-->
        </div>
        
        <main>
        
        <div class="container">
            <h1>SALAD</h1>
            <hr>

            <?php
            $saladquery = "SELECT * FROM p2_5.res_menu WHERE (resmenu_category = 'salad');";
            $saladresult = mysqli_query($connect, $saladquery);

            if ($saladresult):
                if (mysqli_num_rows($saladresult) > 0):
                    while ($product = mysqli_fetch_assoc($saladresult)):
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <section class="products">
                                <img src="image/<?php echo $product['resmenu_img']; ?>" title="<?php echo $product['resmenu_alt'] ?>" alt="<?php echo $product['resmenu_alt'] ?>" class="img-responsive" />
                                <h2 class="text-info menu-text-size1"><?php echo $product['resmenu_name']; ?></h2>
                                <h3 class="text-secondary"><?php echo $product['resmenu_description']; ?></h3><br>
                                <h2>Price: $<?php echo $product['resmenu_price']; ?></h2>
                            </section>
                        </div>
                        <?php
                    endwhile;
                endif;
            endif;
            ?>
        </div>

        <div class="container">
            <h1>SOUP</h1>
            <hr>

            <?php
            $soupquery = "SELECT * FROM p2_5.res_menu WHERE (resmenu_category = 'soup');";
            $soupresult = mysqli_query($connect, $soupquery);

            if ($soupresult):
                if (mysqli_num_rows($soupresult) > 0):
                    while ($product = mysqli_fetch_assoc($soupresult)):
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <section class="products">
                                <img src="image/<?php echo $product['resmenu_img']; ?>" title="<?php echo $product['resmenu_alt'] ?>" alt="<?php echo $product['resmenu_alt'] ?>" class="img-responsive" />
                                <h2 class="text-info"><?php echo $product['resmenu_name']; ?></h2>
                                <h3 class="text-secondary"><?php echo $product['resmenu_description']; ?></h3><br>
                                <h2>Price: $<?php echo $product['resmenu_price']; ?></h2>
                            </section>
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
