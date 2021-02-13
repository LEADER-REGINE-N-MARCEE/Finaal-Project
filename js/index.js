window.onload = function() { /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {

        xhttp.open("POST", API.userDB.tokenValid);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({ jwt: jwt }));
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                var itemType = "KB";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topkeyboards").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }

                var itemType2 = "SW";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType2 + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topswitches").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }

                var itemType3 = "KC";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType3 + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topkeycaps").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }


            } else if (this.readyState == 4 && this.status == 401) {
                var itemType = "KB";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topkeyboards").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }

                var itemType2 = "SW";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType2 + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topswitches").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }

                var itemType3 = "KC";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", API.product.indexRead + "?itemType=" + itemType3 + "");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results = JSON.parse(this.response);
                        console.log(results);
                        for (let row of results.records) {

                            document.getElementById("topkeycaps").insertAdjacentHTML("beforeend", `
                                  <div class='items'>
                                  <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                                  <img src= '${row.img_path}'>
                                  <div class='titles'>
                                  <h2>${row.itemName}</h2>
                                  <p>${row.subtitle}</p>
                                  </div>
                                  </div>
                                  `);
                        }
                    }
                }
            }
        }
    }
}

const btnShop = document.getElementById("btnShop");
btnShop.addEventListener("click", openShop);

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

function openShop() {
    window.location.href = "products.php?itemType=KB";
}