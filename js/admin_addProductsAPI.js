window.onload = function() {
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("POST", "./api/object/validateTokenAPI.php");
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({
            jwt: jwt
        }));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const btnCreate = document.getElementById("btnCreate");
                btnCreate.addEventListener("click", addProduct);
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
                alert("Unauthorized Access! Authentication required.");
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
    const forms = document.querySelectorAll("form");
    const form = forms[0];
    var data = formToObject(form);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./api/object/create.php");
    xhttp.send(JSON.stringify(data));
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 201) {
            alert("success");
        }
    }
}


function formToObject(formArray) {
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]["name"]] = formArray[i]["value"];
    }
    return returnArray;
}