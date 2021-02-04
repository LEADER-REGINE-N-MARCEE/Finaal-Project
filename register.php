<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="icon" type="image/svg+xml" href="./img/iconLogo.svg">
    <link rel="stylesheet" href="./css/signin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

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
                <form method="POST" action="./api/object/registerAPI.php">

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

        <script src="./js/registrationAPI.js"></script>
</body>

</html>