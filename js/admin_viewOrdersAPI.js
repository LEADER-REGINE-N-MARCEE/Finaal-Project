window.onload = function() {
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("POST", API.userDB.tokenValid);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({
            jwt: jwt
        }));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", API.admin.admin_viewOrdersAPI);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results2 = JSON.parse(this.response);
                        console.log(results2);
                        for (let rows of results2.neworders) {
                            if (rows.order_status == "PENDING") {
                                status = "pending";
                            } else if (rows.order_status == "SHIPPING") {
                                status = "shipping";
                            } else if (rows.order_status == "CANCELLED") {
                                status = "cancelled";
                            } else if (rows.order_status == "ACCEPTED") {
                                status = "accepted";
                            } else if (rows.order_status == "DELIVERED") {
                                status = "delivered";
                            } else if (rows.order_status == "DECLINED") {
                                status = "declined";
                            } else {
                                console.log("hello");
                            }

                            console.log(status);
                            document.getElementById("vieworderTable").insertAdjacentHTML("beforeend", `
                <tr>
                <td class="invoice">${rows.invoiceNum}</td>
                <td class="${status}">${rows.order_status}</td>
                <td class="cancel-button">
                ${rows.totalprice}
                </td>
                 </tr>
                
                `);
                        }

                    } else if (this.readyState == 4 && this.status == 404) {
                        document.getElementById("vieworderTable").insertAdjacentHTML("beforeend", `
                <p>no Orders Made.</p>
            `);
                    }
                }
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", API.admin.admin_adminInfoAPI);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results4 = JSON.parse(this.response);
                        for (let rows of results4.users) {
                            document.getElementById("nav-links").insertAdjacentHTML("beforeend", `
                                <li><a href="./admindashboard.php">${rows.firstname}<br>${rows.lastname}</a></li>
                                <li><a href="./items.php">PRODUCTS</a></li>
                                <li><a href="./admin_viewUsers.php">USERS</a></li>
                                <li><a href="./admin_viewOrders.html">ORDERS</a></li>
                                 
                                <li><a href="javascript:signout();">LOGOUT</a></li>
                                `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        document.getElementById("nav-links").insertAdjacentHTML("beforeend", `
                                <p>No Users Registered in the Database.</p>
                            `);
                    }
                }
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