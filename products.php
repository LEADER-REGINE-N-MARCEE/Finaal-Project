<?php
session_start();
include 'config2.php';


$itemType = $_GET['itemType'];


?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/keyboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="section1">

        <div class="nav-container">
            <div class="wrapper">
                <nav class="nav1">
                    <div class="logo">
                        <img src="./img/logo.png">
                    </div>

                    <ul class="nav-item1">
                        <li>
                            <a class="nav-btn-container" href="#">
                                <img class="profile" src="./img/profile.png">
                                <img class="shop" src="./img/buy.png">
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav class="nav2">
                    <ul class="nav-item2">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li>
                            <a href="products.php?itemType=KB">Store</a>
                        </li>

                        <li>
                            <a href="#">Group Buys</a>
                        </li>

                        <li>
                            <a href="#">Contact Us</a>
                        </li>

                        <li>
                            <a href="aboutus.html">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="section2">
        <div class="wrapper">

            <div class="types">
                <a href="products.php?itemType=KB" class="keyboard">Keyboard</a>
                <a href="products.php?itemType=KC" class="keycaps">Keycaps</a>
                <a href="products.php?itemType=SW" class="switches">Switches</a>
                <a href="products.php?itemType=DM" class="deskmat">Deskmat</a>

            </div>


            <div class="search-filter">
                <form class="form1">
                    <div class="label1">
                        <label class="search1">Search</label>
                        <label class="filter1">Filter</label>

                    </div>
                    <div class="input">
                        <input class="search" type="text">
                        <input class="filter" type="text">
                    </div>
                </form>
            </div>


            <div class="item-container">
                <?php

                $sql = "SELECT itemName, subtitle, img_path FROM items WHERE itemType = '$itemType'";
                $query = mysqli_query($link, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                    $itemName = $row['itemName'];
                    $subtitle = $row['subtitle'];
                    $img_path = $row['img_path'];

                    echo "<div class='items'>";
                    echo "<a href='productPage.php?itemName=$itemName' class='item-link'>";
                    echo "<img class='' src=" . $img_path . ">";
                    echo "<div class='titles'>";
                    echo "<h2 class= \'Item Name\'>" . $itemName . " <a></h2>\n";
                    echo "<p class= \'Subtitle\'> " . $subtitle . "</p>\n";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>
    </div>





    <div class="footer">
        <div class="wrapper">
            <div class="footer-left">
                <img class="logo-footer" src="./img/logo1.png">
                <div>
                    <img class="social-icon" src="./img/fb.png">
                    <img class="social-icon" src="./img/ig.png">
                    <img class="social-icon" src="./img/tweeter.png">
                </div>

            </div>

            <div class="footer-right">
                <p>CONTACT US</p>
                <p>Phone: (044) 766 2451 | (044) 664 5762</p>
                <p>Email: info@keycorp.ph</p>
            </div>
        </div>
        <p class="copyright">Copyright© 2021 | All Rights Reserved</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>