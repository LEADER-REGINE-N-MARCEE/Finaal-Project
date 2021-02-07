<?php
$itemCode = $_GET['itemCode'];
$itemType = $_GET['itemType'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store</title>

    <link rel="stylesheet" href="./css/Productpage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@300;400&display=swap" rel="stylesheet">

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
                            <a class="nav-btn-container" href="account">
                                <img class="profile" src="./img/profile.png">
                            </a>
                            <a class="nav-btn-container" href="cart">
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


    <div class="details-container" id="body">
    
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


    <script type="text/javascript">
        let thumbnails = document.getElementsByClassName('thumbnail')

        let activeImages = document.getElementsByClassName('active')

        for (var i = 0; i < thumbnails.length; i++) {

            thumbnails[i].addEventListener('mouseover', function() {
                console.log(activeImages)

                if (activeImages.length > 0) {
                    activeImages[0].classList.remove('active')
                }


                this.classList.add('active')
                document.getElementById('featured').src = this.src
            })
        }
    </script>
    <script type="text/javascript">
        var itemCode = <?php echo json_encode($itemCode) ?>;
        var itemType = <?php echo json_encode($itemType) ?>;
    </script>
    <script src="./js/productPageAPI.js"></script>
</body> 

</html>