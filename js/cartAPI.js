window.onload = function() {
    var jwt = getCookie('jwt');
    (jwt);
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("POST", API.userDB.tokenValid);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({
            jwt: jwt
        }));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var results = JSON.parse(this.response);
                var usrID = results.id;
                xhttp.open("POST", API.product.cart);
                xhttp.send(JSON.stringify({
                    id: usrID
                }));
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results2 = JSON.parse(this.response);
                        for (let rows of results2.records) {
                            var price = rows.price;
                            var tprice = price * rows.amount;
                            document.getElementById("carttable").insertAdjacentHTML("beforeend", `
                            <td class=item-img><img src=${rows.img_path}></td>
                            <td class=item-name>${rows.itemName}</td>
                            <td class=item-quantity>${rows.amount}</td>
                            <td class=item-price>${tprice}</td>
                            `);
                        }
                        document.getElementById("carttable").insertAdjacentHTML("afterend", `
                        <form method="POST" action='checkout.php'>
                        <button class="checkout-btn" id="btnCheckout" name="checkout" type="button">
                            Checkout
                        </button>
                        </form>
                            `);
                        const btnCheckout = document.getElementById("btnCheckout");
                        btnCheckout.addEventListener("click", checkout);

                        function checkout() {
                            window.location.href = "./checkout.php";
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        (this.response);
                        document.getElementById("carttable").insertAdjacentHTML("beforeend", `
                            <p>no products in cart</p>
                        `);
                    }
                };
            } else if (this.readyState == 4 && this.status == 401) {
                window.location.href = '../signIn.php';
            }
        };
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
}