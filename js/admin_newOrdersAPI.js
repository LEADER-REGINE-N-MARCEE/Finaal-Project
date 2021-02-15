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
                            <td class=item-img><input type="text" value="${rows.invoiceNum}" id="${rows.totalprice}" disabled></td>
                            <TD ALIGN="center">
                                <select id="initial_status">
                                    <option value="PENDING">PENDING</option>
                                </select>
                                <button type="button" id="${rows.invoiceNum}" onclick="acceptOrder()">Accept</button>
                                <button type="button" id="${rows.invoiceNum}" onclick="acceptOrder()">Decline</button>
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

function acceptOrder() {
    var choice = "ACCEPTED";
    var invoiceNum = event.srcElement.id;

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/admin_orderChoiceAPI.php");
    xhttp.send(JSON.stringify({
        choice: choice,
        invoiceNum: invoiceNum
    }));

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Order Accepted")
            window.location.reload();
        } else if (this.readyState == 4 && this.status == 401) {
            alert("error");
        }
    };
}

function declineOrder() {
    var choice = "DECLINED";
    var invoiceNum = event.srcElement.id;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/admin_orderChoiceAPI.php");
    xhttp.send(JSON.stringify({
        choice: choice,
        invoiceNum: invoiceNum
    }));
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Order Declined")
            window.location.reload();
        } else if (this.readyState == 4 && this.status == 401) {
            alert("error");
        }
    };
}