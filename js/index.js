window.onload = function() { /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {

        xhttp.open("POST", "../api/object/validateTokenAPI.php");
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({ jwt: jwt }));
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                console.log(this.status);

                document.getElementById("body").insertAdjacentHTML("afterbegin", `
                    <div class="section1" id="nav-container">
            <div class="nav-container">
                <div class="wrapper">
                    <nav class="nav1">
                        <div class="logo">
                            <a href="index"><img src="./img/logo.png"></a>
                        </div>
    
                        <ul class="nav-item1">
                            <li>
                                <a class="nav-btn-container" href="account.php">
                                    <img class="profile" src="./img/profile.png">
    
                                </a>
                                <a class="nav-btn-container" href="cart.php">
    
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
                                <a href="#">Group Buys</a>
                            </li>
    
                            <li>
                                <button class="buttonClick" onclick="scroll1()">Contact Us</button>
                            </li>
    
                            <li>
                                <a href="aboutus">About Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="wrapper">
                <p class="text1">
                    PRESS WITH CONFIDENCE
                </p>
    
                <p class="text2">
                    We will make your keyboard experience better
                </p>
    
                <button class="shop-btn" type="button">
                    <p>
                        Shop Now
                    </p>
                </button>
    
            </div>
    
    
    
        </div>
    
        
        
                    `);

            } else if (this.readyState == 4 && this.status == 401) {
                console.log(this.status);
                document.getElementById("body").insertAdjacentHTML("afterbegin", `
                    <div class="section1" id="nav-container">
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
                                <a href="#">Group Buys</a>
                            </li>
    
                            <li>
                                <button class="buttonClick" onclick="scroll1()">Contact Us</button>
                            </li>
    
                            <li>
                                <a href="aboutus">About Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="wrapper">
                <p class="text1">
                    PRESS WITH CONFIDENCE
                </p>
    
                <p class="text2">
                    We will make your keyboard experience better
                </p>
    
                <button class="shop-btn" type="button">
                    <p>
                        Shop Now
                    </p>
                </button>
    
            </div>
    
    
    
        </div>
    
        
        
                    `);
            }
        };
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return "";
}