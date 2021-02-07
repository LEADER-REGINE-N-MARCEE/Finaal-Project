<?php $itemCode = $_GET['itemCode'];
      $itemType = $_GET['itemType'];?>
<?php require('header.php')?>
<link rel="stylesheet" href="css/productPage.css">
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
<?php require('footer.php')?>