<?php
session_start();
?>

<!--<html>

<head>
    <title>Key.Corp</title>
</head>

<body>
    <a href="products.php?itemType=KB">Keyboards</a>
    <a href="products.php?itemType=KC"">Keycaps</a>
    <a href=" products.php?itemType=SW"">Switches</a>
    <a href="products.php?itemType=DM"">Deskmats</a>
</body>

</html>-->


<!DOCTYPE html>
<html>

<head>
    <title>Key.Corp</title>

    <link rel="icon" type="image/svg+xml" href="./img/iconLogo.svg">
    <link rel=" stylesheet" href="./css/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        function scroll1() {
            window.scrollTo(0, 2055);
        }

        function scroll2() {
            window.scrollTo(0, 2815);
        }
    </script>

</head>

<body>
    <div class="section1">

        <div class="nav-container">
            <div class="wrapper">
                <nav class="nav1">
                    <div class="logo">
                        <a href="index.php"><img src="./img/logo.png"></a>
                    </div>

                    <ul class="nav-item1">
                        <li>
                            <a class="nav-btn-container" href="login.php">
                                <img class="profile" src="./img/profile.png">

                            </a>
                            <a class="nav-btn-container" href="cart.php">

                                <img class="shop" src="./img/buy.png">
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav class="nav2">
                    <ul class="nav-item2">
                        <li>
                            <a href="#">Home</a>
                        </li>

                        <li>
                            <a href="#">Store</a>
                        </li>

                        <li>
                            <a href="#">Group Buys</a>
                        </li>

                        <li>
                            <button class="buttonClick" onclick="scroll1()">Contact Us</button>
                        </li>

                        <li>
                            <a href="aboutus.html">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="wrapper">
            <p class="text1">
                PRESS WITH CONFIDENCE
            </p>

            <p class="text2">
                We will make your keyboard experience better
            </p>

            <button class="shop-btn" type="button">
                <p>
                    Shop Now
                </p>
            </button>

        </div>
    </div>

    <div class="section2">
        <div class="wrapper">
            <h1>TOP SELLING</h1>
            <div class="item-container">
                <div class="items">
                    <img class="" src="./img/item1.png">
                    <h2>EPBT</h2>
                    <p>FULLY ASSEMBLED MECHANICAL KEYBOARD</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item2.png">
                    <h2>KBD75</h2>
                    <p>FULLY ASSEMBLED MECHANICAL KEYBOARD</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item3.png">
                    <h2>DROP CTRL</h2>
                    <p>PREMIUM MECHANICAL KEYBOARD</p>
                </div>
            </div>

            <h1>TOP SWITCHES</h1>
            <div class="item-container">
                <div class="items">
                    <img class="" src="./img/item4.png">
                    <h2>Healios (ZealPC)</h2>
                    <p>Silent Linear Mechanical Switch</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item5.png">
                    <h2>DROP + INVYR HOLY PANDA</h2>
                    <p>Tactile Mechanical Switch</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item6.png">
                    <h2>Zealios V2 (ZealPC)</h2>
                    <p>Zealios V2 (ZealPC)</p>
                </div>
            </div>

            <h1>TOP KEYCAPS</h1>
            <div class="item-container">
                <div class="items">
                    <img class="" src="./img/item7.png">
                    <h2>MULTI COLORED 1U</h2>
                    <p>OEM BLACK KEYCAPS</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item8.png">
                    <h2>M7 GAME CONSOLE</h2>
                    <p>ARTISAN KEYCAPS</p>
                </div>
                <div class="items">
                    <img class="" src="./img/item9.png">
                    <h2>CHEMICAL ELEMENTS</h2>
                    <p>DYE SUB KEYCPAS </p>
                </div>
            </div>
        </div>
    </div>

    <div class="section3">
        <div class="wrapper">
            <h1>
                CONTACT US
            </h1>
            <div class="section3-item">
                <div class="section3-left">
                    <div class="section3-info">
                        <img src="./img/phone.png">
                        <p>(044) 766-2451</p>
                    </div>
                    <div class="section3-info">
                        <img src="./img/envelope.png">
                        <p>info@keycorp.ph</p>
                    </div>
                    <div class="section3-info">
                        <img src="./img/map-marker.png">
                        <p>0231 Poblacion,<br>Bustos, Bulacan</p>
                    </div>

                    <button class="contact-btn" type="button">
                        <p>
                            Contact Now
                        </p>
                    </button>
                </div>

                <div>
                    <img src="./img/map.png">
                </div>
            </div>
        </div>
    </div>

    <div class="section4">
        <div class="wrapper">

            <h1>
                ABOUT US
            </h1>

            <div class="line">
                <img src="./img/line.png">
                <h2>
                    Welcome to KEY.CORP
                </h2>
                <img src="./img/line.png">
            </div>

            <p>
                KEY.CORP started in 2021 with the goal of providing high-quality mechanical keyboards and their various components, such as keycaps, switches and desk mats. We mainly listen to our customer base for feedback and greatly appreciate when customers give feedback so we can work on improving our store and service. The selection of keyboards has expanded to over 30 brands, we are happy to be working with various brands such as Cannon keys, GMK, and VARMILO whom we meet frequently in person at events all around to world to keep our relationship strong with them, which is important in being able to select the best products for customers. We have also been offering Group-Buys since the launch of KEY.CORP but has never been the #1 focus as we want to make sure that we can offer all possible mechanical keyboards before bringing in crowd-funded projects.
            </p>
            <div class="aboutus-item">
                <img src="./img/about1.png">
                <div>
                    <div>
                        <img src="./img/about2.png">
                        <img src="./img/about3.png">
                    </div>
                    <div>
                        <img src="./img/about4.png">
                        <img src="./img/about5.png">
                    </div>
                </div>
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

</body>

</html>