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

                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "api/object/admin_productOverviewAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var results3 = JSON.parse(this.response);
                        for (let rows of results3.items) {
                            document.getElementById("viewProductsTable").insertAdjacentHTML("beforeend", `

                                            <tr>
                                            <td>${rows.itemName}</td>
                                            <td>${rows.itemCode}</td>
                                            <td>${rows.quantity}</td>
                                            <td>
                                                <a href="view.php"><button class="view">View</button></a>
                                                <a href="edit.php"><button class="edit">Edit</button></a>
                                                <button type="button" id="${rows.itemCode}" class="delete" onclick="deleteProduct();">Delete</button>
                                            </td>
                                        </tr>
                                            `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        document.getElementById("viewProductsTable").insertAdjacentHTML("beforeend", `
                                            <p>No Product in the Database.</p>
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

function addProduct() {
    window.location.href = "./create.php";
}

function deleteProduct() {
    var itemCode = event.srcElement.id;
    console.log(JSON.stringify({
        itemCode: itemCode
    }));
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/admin_deleteProductAPI.php");
    xhttp.send(JSON.stringify({
        itemCode: itemCode
    }));

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("Order Deleted");
            window.location.reload();
        } else if (this.readyState == 4 && this.status == 401) {
            alert("Error. Cannot Delete Product");
        }
    };
}