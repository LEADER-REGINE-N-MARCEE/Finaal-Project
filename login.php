<?php
//start session
session_start();

//redirect if logged in
if (isset($_SESSION['user'])) {
    
    header('location:home.php');
}
?>



<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="icon" type="image/svg+xml" href="./img/iconLogo.svg">
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@300;400&display=swap" rel="stylesheet">

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
                            <a href="home.html">Home</a>
                        </li>

                        <li>
                            <a href="#">Store</a>
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
                SIGN IN
            </h1>

            <div class="form1">
                <form method="POST" action="login-backend.php">

                    <label>Email</label>
                    <input class="input1" type="text" placeholder="Email" name="email" autofocus required>

                    <label>Password</label>
                    <input class="input1" type="Password" placeholder="Password" type="password" name="password" required>
                    <button class="signin-btn" type="submit" name="login">SIGN IN</button>
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