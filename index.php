
<script src="js/api.js"></script>
<link rel=" stylesheet" href="css/generalStyle.css">
<link rel=" stylesheet" href="css/home.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
<body id="body">
    <div class="section1">
        <?php require('header1.php') ?>
        <div class="header-p">
            <p class="p1">PRESS WITH CONFIDENCE</p>
            <p class="p2">We will make your keyboard experience better</p>
            <div class="btn-container">
                <a href="products.php?itemType=GB"><button class="shop-btn" >Shop Now</button></a>
            </div>
        </div>
        <div class="intro">
            <div class="intro-text">
                <h1 class="hide">
                    <span class="text">Welcome</span>
                </h1>
                <h1 class="hide">
                    <span class="text">To</span>
                </h1>
                <h1 class="hide">
                    <span class="text"><img src="img/logo.png"></span>
                </h1>
            </div>
        </div>
        <div class="slider"></div>
    </div>


    <div class="section2">
        <div class="wrapper">
            <h1>TOP KEYBOARDS</h1>
            <div class="item-container" id="topkeyboards">

            </div>
            <a href="products.php?itemType=KB" class="section2_seemore">See more...</a>
            <h1>TOP SWITCHES</h1>
            <div class="item-container" id="topswitches">

            </div>
            <a href="products.php?itemType=SW" class="section2_seemore">See more...</a>
            <h1>TOP KEYCAPS</h1>
            <div class="item-container" id="topkeycaps">

            </div>
            <a href="products.php?itemType=KC" class="section2_seemore">See more...</a>

            <h1>TOP DESKMATS</h1>
            <div class="item-container" id="topkeydeskmats">

            </div>
            <a href="products.php?itemType=DM" class="section2_seemore">See more...</a>
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
                    <img src="./img/map.png" class="map1">
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
                KEY.CORP started in 2021 with the goal of providing high-quality mechanical keyboards and their various components, such as keycaps, switches and desk mats. We mainly listen to our customer base for feedback and greatly appreciate when customers give
                feedback so we can work on improving our store and service. The selection of keyboards has expanded to over 30 brands, we are happy to be working with various brands such as Cannon keys, GMK, and VARMILO whom we meet frequently in person
                at events all around to world to keep our relationship strong with them, which is important in being able to select the best products for customers. We have also been offering Group-Buys since the launch of KEY.CORP but has never been
                the #1 focus as we want to make sure that we can offer all possible mechanical keyboards before bringing in crowd-funded projects.
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

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
      integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
      crossorigin="anonymous"
    ></script>
    <script src="js/index-intro.js"></script>
    <script src="js/index.js"></script>
<?php require('footer.php')?>
