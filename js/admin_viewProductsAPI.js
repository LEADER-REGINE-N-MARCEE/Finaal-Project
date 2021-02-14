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
                                            <td class=item-img>${rows.itemCode}</td>
                                            <td class=item-img>${rows.itemType}</td>
                                            <td class=item-name>${rows.itemName}</td>
                                            <td class=item-name>${rows.subtitle}</td>
                                            <td class=item-name>${rows.price}</td>
                                            <td class=item-quantity>${rows.quantity}</td>
                                            <tr>
                                            `);
                        }
                    } else if (this.readyState == 4 && this.status == 404) {
                        document.getElementById("viewProductsTable").insertAdjacentHTML("beforeend", `
                                            <p>No Product in the Database.</p>
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

function addProduct() {
    window.location.href = "./create.php";
}