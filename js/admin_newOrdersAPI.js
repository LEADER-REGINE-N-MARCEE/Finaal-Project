window.onload = function() {
    /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("POST", API.userDB.tokenValid);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({
            jwt: jwt
        }));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var results = JSON.stringify(this.response);

                var userRole = results.role;
                if (userRole == "user") {
                    window.location.href = "./account.php";

                }
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "api/object/admin_newOrdersAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var results2 = JSON.parse(this.response);
                        for (let rows of results2.neworders) {

                            document.getElementById("neworderTable").insertAdjacentHTML("beforeend", `
                            <tr>
                            <td class=item-img><input type="text" value="${rows.invoiceNum}" id="invoiceNum" disabled></td>
                            <TD ALIGN="center">
                                <select id="initial_status">        
                                    <option value="PENDING">PENDING</option>
                                </select>
                                <a href="">Accept</a>
                                <a href="">Decline</a>
                            </TD>
                            <td class=item-quantity>${rows.totalprice}</td>
                            
                            <tr>
                            `);

                        }

                    } else if (this.readyState == 4 && this.status == 404) {
                        console.log(this.response);
                        document.getElementById("neworderTable").insertAdjacentHTML("beforeend", `
                            <p>no New Orders Made.</p>
                        `);
                    }
                    const btnapplySelection = document.getElementById("btnapplySelection");
                    btnapplySelection.addEventListener("click", applySelection)

                    function applySelection() {
                        var selection = document.getElementById("initial_status").value;
                        var invoiceNum = document.getElementById("invoiceNum").value;
                        console.log(invoiceNum);
                    }



                };
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "api/object/admin_productOverviewAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results3 = JSON.parse(this.response);
                        for (let rows of results3.items) {
                            document.getElementById("productoverviewTable").insertAdjacentHTML("beforeend", `
                                            <tr>
                                            <td class=item-img>${rows.itemCode}</td>
                                            <td class=item-name>${rows.itemName}</td>
                                            <td class=item-quantity>${rows.quantity}</td>
                                            <tr>
                                            `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        console.log(this.response);
                        document.getElementById("productoverviewTable").insertAdjacentHTML("beforeend", `
                                            <p>No Product in the Database.</p>
                                        `);
                    }


                };
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "api/object/admin_viewUsersAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results4 = JSON.parse(this.response);
                        for (let rows of results4.users) {
                            document.getElementById("viewUsersTable").insertAdjacentHTML("beforeend", `
                                            <tr>
                                            <td class=item-img>${rows.id}</td>
                                            <td class=item-name>${rows.firstname}</td>
                                            <td class=item-quantity>${rows.lastname}</td>
                                            <td class=item-name>${rows.email}</td>
                                            <td class=item-quantity>${rows.reg_date}</td>
                                            <tr>
                                            `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        console.log(this.response);
                        document.getElementById("viewUsersTable").insertAdjacentHTML("beforeend", `
                                            <p>No Users Registered in the Database.</p>
                                        `);
                    }
                };
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "api/object/admin_activeDiscountsAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results5 = JSON.parse(this.response);
                        for (let rows of results5.active) {
                            document.getElementById("activeDiscountsTable").insertAdjacentHTML("beforeend", `
                                            <tr>
                                            <td class=item-img>${rows.discountID}</td>
                                            <td class=item-name>${rows.discountCode}</td>
                                            <td class=item-quantity>${rows.discount}</td>
                                            <td class=item-name>${rows.discount_status}</td>
                                            <td class=item-quantity>${rows.discountDate}</td>
                                            <tr>
                                            `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        console.log(this.response);
                        document.getElementById("activeDiscountsTable").insertAdjacentHTML("beforeend", `
                                            <p>No Users Registered in the Database.</p>
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