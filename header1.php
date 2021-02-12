<!DOCTYPE html>
<html lang="en">

<head>
    <title>Key.Corp</title>

    <link rel="icon" type="image/svg+xml" href="./img/iconLogo.svg">
    <link rel="stylesheet" href="css/generalStyle1.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="./js/api.js"></script>
    <script>
        function scroll() {
            window.scrollTo(0, 2055);
        }
    </script>

</head>

<body id="body">

    <div class="header">

            <div class="nav-container">
                <div class="wrapper">
                    <nav class="nav1">
                        <div class="logo">
                            <a href="index.php"><img src="img/logo.png"></a>
                        </div>

                        <ul class="nav-item1">
                            <li>
                                <a class="nav-btn-container" href="account.php">
                                    <img class="profile" src="img/profile.png">
                                </a>
                                <a class="nav-btn-container" href="cart.php">
                                    <img class="shop" src="img/buy.png">
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <nav class="nav2">
                        <ul class="nav-item2">
                            <li class="nav22">
                                <a href="index.php" class="aa">Home</a>
                            </li>

                            <li class="nav22" id="store1">
                                <button>Store</button> <!--products.php?itemType=KB-->
                                <ul class="store-dropdown">
                                    <a href="products.php?itemType=KB"><li>Keyboard</li></a>
                                    <a href="products.php?itemType=KC"><li>Keycaps</li></a>
                                    <a href="products.php?itemType=SW"><li>Switches</li></a>
                                    <a href="products.php?itemType=DM"><li>Deskmat</li></a>
                                </ul>
                            </li>

                            <li class="nav22">
                                <a href="products.php?itemType=GB" class="aa">Group Buys</a>
                            </li>

                            <li class="nav22">
                                <a href="#" class="aa">Contact Us</a>
                            </li>

                            <li class="nav22">
                                <a href="aboutUs.php" class="aa">About Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</body>
</html>


