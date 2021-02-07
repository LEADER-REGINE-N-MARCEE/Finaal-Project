<?php require('header.php')?>
<link rel="stylesheet" href="css/keyboard.css">
    <div class="section1">

        <div class="nav-container">
            <div class="wrapper">
                <nav class="nav1">
                    <div class="logo">
                        <a href="index"><img src="./img/logo.png"></a>
                    </div>

                    <ul class="nav-item1">
                        <li>
                            <a class="nav-btn-container" href="login.php">
                                <img class="profile" src="./img/profile.png">
                            </a>
                            <a class="nav-btn-container" href="login.php">
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


            <div class="item-container" id="itemcontainer">
                    
            </div>

        </div>
    </div>
    <script type="text/javascript">var itemType = "<?php echo $itemType ?>";</script>
    <script src="./js/productAPI.js"></script>
<?php require('footer.php')?>