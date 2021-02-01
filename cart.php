<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'store');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

$usrID = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="icon" type="image/svg+xml" href="./img/iconLogo.svg">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="section1">

        <div class="nav-container">
            <div class="wrapper">
                <nav class="nav1">
                    <div class="logo">
                        <a href="index"><img src="./img/logo.png"></a>
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
                            <a href="index">Home</a>
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
                            <a href="aboutus">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="section2">
        <div class="wrapper">

            <?php

            echo "<table class=table-cart>
            <tr class=table-title>
            <th colspan=2>Item(s)</th>
            <th>Quantity</th>
            <th>Price</th>
            </tr>";

            $sql = "SELECT orderID, itemCode, itemType, itemName, quantity, invoiceNum FROM orders WHERE orderID = '$usrID'";
            $query = mysqli_query($link, $sql);
            $totalprice = 0;
            $totalquantity = 0;
            while ($row = mysqli_fetch_assoc($query)) {
                $itemCode    = $row['itemCode'];
                $itemName    = $row['itemName'];
                $quantity    = $row['quantity'];
                

                $sql2 = "SELECT price, img_path FROM items WHERE itemCode = '$itemCode'";
                $query2 = mysqli_query($link, $sql2);

                echo "<tr>";


                if ($query2->num_rows > 0) {
                    $row = $query2->fetch_array();
                    
                    $price = $row['price'];
                    $img_path = $row['img_path'];
                    
                    $tprice = bcmul($price, $quantity, "2");
                    $totalprice = $totalprice + $tprice;
                    $totalquantity = $totalquantity + $quantity;
                    echo "<td class=item-img><img src=" . $img_path . "></td>";
                    echo "<td class=item-name>" . $itemName . "</td>";
                    echo "<td class=item-quantity>" . $quantity . "</td>";
                    echo "<td class=item-price>" . $tprice . "</td>";
                    
                }
                
            }

            
            $_SESSION['totalprice'] = $totalprice;
            $_SESSION['totalquantity'] = $totalquantity;

            echo "</table>";

            ?>

            <form method="POST" action='checkout.php'>
                <button class="checkout-btn" type="submit">
                    <p>
                        Check Out
                    </p>
                </button>
            </form>





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
</body>

</html>