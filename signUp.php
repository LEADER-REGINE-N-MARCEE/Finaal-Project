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
                            <a href="home.html">Home</a>
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
            <h1>
                SIGN UP
            </h1>

            <div class="form1">
                <form method="POST">

                    <label>First Name:</label>
                    <input class="input1" type="text" name="firstname" autofocus required>


                    <label>Last Name:</label>
                    <input class="input1" type="text" name="lastname" autofocus required>


                    <label>Email:</label>
                    <input class="input1" type="text" name="email" autofocus required>


                    <label>Password:</label>
                    <input class="input1" type="Password" name="password" required>
                    <button type="button" class="signin-btn" id="btnSubmit" name="register">Register</button>
                </form>

                <p class="or">or</p>
                <button class="signup-btn" type="button">
                    <p>
                        SIGN IN
                    </p>
                </button>
            </div>

        </div>
        <script src="./js/signUpAPI.js"></script>
    <?php require('footer.php')?>