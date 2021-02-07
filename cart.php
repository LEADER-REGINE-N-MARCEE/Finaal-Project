<?php require('header.php')?>
<link rel="stylesheet" href="./css/cart.css">
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
                            <a href="products.php?itemType=GB">Group Buys</a>
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
            <table class=table-cart id="carttable">
                <tr class=table-title>
                    <th colspan=2>Item(s)</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>

            </table>

            





        </div>

    </div>
    <script src="./js/cartAPI.js"></script>
<?php require('footer.php')?>