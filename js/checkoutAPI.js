window.onload = function() {
    /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    console.log(jwt);
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


                        const formdata = {};
                        let key;

                        for (key in results) {
                            if (results.hasOwnProperty(key)) {
                                formdata[key] = results[key];
                            }
                        }

                        for (key in results2) {
                            if (results2.hasOwnProperty(key)) {
                                formdata[key] = results2[key];
                            }
                        }

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
                    }

                    const btnCheckout = document.getElementById("btnCheckout"); /*kunin ung id ng btn para magkaron ng event listener*/
                    const btnUpdate = document.getElementById("btnUpdate");
                    btnCheckout.addEventListener("click", checkout);
                    btnUpdate.addEventListener("click", update);

                    function checkout() {

                        xhttp.open("POST", "../api/object/checkoutAPI.php");
                        xhttp.send(JSON.stringify({
                            id: usrID
                        }));
                    }

                    function update() {

                        xhttp.open("POST", "../api/object/checkoutAPI.php");
                        xhttp.send(JSON.stringify({
                            id: usrID
                        }));
                    }
                };
            } else if (this.readyState == 4 && this.status == 401) {
                window.location.href = "./login";
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