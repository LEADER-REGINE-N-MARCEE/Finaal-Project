window.onload = function() {
    /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("POST", "../api/object/validateTokenAPI.php");
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({
            jwt: jwt
        }));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var results = JSON.parse(this.response);
                var usrID = results.id;
                xhttp.open("POST", "../api/object/userInfoAPI.php");
                xhttp.send(JSON.stringify({
                    id: usrID
                }));
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results2 = JSON.parse(this.response);
                        console.log(results2);
                        for (let row of results2.info) {
                            document.getElementById("body").insertAdjacentHTML("beforeend", `
                        <form method="POST">
                        <label>Full Name:</label>
                        <input class="input1" type="text" name="fullname" value = "${row.fullname}" autofocus required>
                        <label>Floor/Unit Number:</label>
                        <input class="input1" type="text" name="flrnum" value = "${row.flrnum}" autofocus required>
                        <label>Province:</label>
                        <input class="input1" type="text" name="province" value = "${row.province}" autofocus required>
                        <label>Municipality:</label>
                        <input class="input1" type="text" name="municipality" value = "${row.municipality}" autofocus required>
                        <label>Barangay:</label>
                        <input class="input1" type="text" name="barangay" value = "${row.barangay}" autofocus required>
                        <label>Mobile Number:</label>
                        <input class="input1" type="text" name="mobilenum" value = "${row.mobilenum}" autofocus required>
                        </form>
                            `);
                        }
                        xhttp.open("POST", "../api/object/cartAPI.php");
                        xhttp.send(JSON.stringify({
                            id: usrID
                        }));
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var subtotal = 0;
                                let results2 = JSON.parse(this.response);
                                for (let rows of results2.records) {
                                    var price = rows.price;
                                    var tprice = price * rows.amount;
                                    subtotal = tprice + subtotal;
                                }
                                var totalprice = subtotal + 15;
                                document.getElementById("body2").insertAdjacentHTML("beforeend", `
                                <form id="checkout-form>
                                <input type="text" value="$${subtotal}" disabled>
                                <input type="text" value="$15" disabled>
                                <input type="text" value="${totalprice}" id="totalprice" name="totalprice" disabled>
                                <button type="button" id="btnCheckout" name="checkout">Checkout</button>
                                </form>
                                `);
                                const btnCheckout = document.getElementById("btnCheckout"); /*kunin ung id ng btn para magkaron ng event listener*/
                                btnCheckout.addEventListener("click", checkout);

                                function checkout() {
                                    var total = document.getElementById("totalprice").value;
                                    var totalObj = new Object;
                                    totalObj["totalprice"] = total;
                                    const formdata2 = {};
                                    let key;
                                    for (key in totalObj) {
                                        if (totalObj.hasOwnProperty(key)) {
                                            formdata2[key] = totalObj[key];
                                        }
                                    }
                                    for (key in results) {
                                        if (results.hasOwnProperty(key)) {
                                            formdata2[key] = results[key];
                                        }
                                    }
                                    console.log(JSON.stringify(formdata2));
                                    xhttp.open("POST", "../api/object/checkoutAPI.php");
                                    xhttp.send(JSON.stringify(formdata2));
                                    xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 201) {
                                            window.location.href = '../index.php';
                                        } else if (this.readyState == 4 && this.status == 503) {
                                            console.log(this.status);
                                        }
                                    };
                                }
                            } else if (this.readyState == 4 && this.status == 404) {
                                console.log(this.response);
                                document.getElementById("carttable").insertAdjacentHTML("afterbegin", `
                                <p>no products in cart</p>
                            `);
                            }
                        };
                    } else if (this.readyState == 4 && this.status == 206) {
                        document.getElementById("body").insertAdjacentHTML("beforeend", `
                        <form method="POST">
                        <label>Full Name:</label>
                        <input class="input1" type="text" name="fullname" autofocus required>
                        <label>Floor/Unit Number:</label>
                        <input class="input1" type="text" name="flrnum" autofocus required>
                        <label>Province:</label>
                        <input class="input1" type="text" name="province" autofocus required>
                        <label>Municipality:</label>
                        <input class="input1" type="text" name="municipality" autofocus required>
                        <label>Barangay:</label>
                        <input class="input1" type="text" name="barangay" autofocus required>
                        <label>Mobile Number:</label>
                        <input class="input1" type="text" name="mobilenum" autofocus required>
                        <button type="button" class="signin-btn" id="btnUpdate" name="register">UPDATE USER INFORMATION</button>
                        </form>
                            `);
                        xhttp.open("POST", "../api/object/cartAPI.php");
                        xhttp.send(JSON.stringify({
                            id: usrID
                        }));
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var totalprice = 0;
                                let results2 = JSON.parse(this.response);
                                for (let rows of results2.records) {
                                    var price = rows.price;
                                    var tprice = price * rows.amount;
                                    totalprice = tprice + totalprice;
                                }
                                document.getElementById("body2").insertAdjacentHTML("beforeend", `
                                    <form id="checkout-form>
                                    <input type="text" value="$${totalprice}" disabled>
                                    <input type="text" value="$15" disabled>
                                    <button type="button" id="btnCheckout" name="checkout" disabled>Checkout</button>
                                    </form>
                                    `);
                            } else if (this.readyState == 4 && this.status == 404) {
                                console.log(this.response);
                                document.getElementById("carttable").insertAdjacentHTML("afterbegin", `
                                    <p>no products in cart</p>
                                `);
                            }
                        };
                        const btnUpdate = document.getElementById("btnUpdate");
                        btnUpdate.addEventListener("click", update);

                        function update() {
                            const forms = document.querySelectorAll("form");
                            const form = forms[0];
                            var data = toObject(form);
                            const formdata2 = {};
                            let key;
                            for (key in data) {
                                if (data.hasOwnProperty(key)) {
                                    formdata2[key] = data[key];
                                }
                            }
                            for (key in results) {
                                if (results.hasOwnProperty(key)) {
                                    formdata2[key] = results[key];
                                }
                            }
                            /*initialize ung variable data. then icacall ung toObject na function the parameter ung form */
                            var xhttp = new XMLHttpRequest(); {
                                /*para sa API */
                                console.log(formdata2);
                                xhttp.open("POST", "../api/object/updateInfoAPI.php"); /*POST ung request, then icall ung registerAPI.php */
                                xhttp.send(JSON.stringify(formdata2)); /*isesend ung data na nakuha dun sa form */
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 201) {
                                        window.location.reload();
                                    } else if (this.readyState == 4 && this.status == 400) {
                                        let result = JSON.parse(this.response);
                                        alert(result.message);
                                        console.log(result);
                                    }
                                };
                            }
                        }
                    };
                };
            } else if (this.readyState == 4 && this.status == 401) {
                window.location.href = "./login.php";
            }
        };
    }

    function toObject(formArray) {
        /*to object function*/
        var returnArray = {}; /*initialize ung array */
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]["name"]] = formArray[i]["value"]; /*ipapasa na ung mga nasa form to array, */
        }
        return returnArray; /*then irereturn ung result */
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