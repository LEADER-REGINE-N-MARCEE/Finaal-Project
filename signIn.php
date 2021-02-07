<?php require('header.php')?>
<link rel=" stylesheet" href="./css/signInUp.css">
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
            <h1>
                SIGN IN
            </h1>

            <div class="form1">
                <form method="POST">

                    <label>Email</label>
                    <input class="input1" type="text" placeholder="Email" name="email" autofocus required>

                    <label>Password</label>
                    <input class="input1" type="Password" placeholder="Password" type="password" name="password" required>
                    <button class="signin-btn" type="button" id="btnSubmit" name="login">SIGN IN</button>
                </form>

                <button type="button">
                    <p>

                    </p>
                </button>
                <p class="or">or</p>
                <button onclick="window.location.href='register.php'" class="signup-btn" type="button">
                    <p>
                        SIGN UP
                    </p>
                </button>
            </div>

        </div>
        <script src="js/signInAPI.js"></script>
<?php require('footer.php')?>