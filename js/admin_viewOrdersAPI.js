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
                xhttp.open("POST", "api/object/admin_viewOrdersAPI.php");
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results2 = JSON.parse(this.response);
                        (results2);
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
                                ("hello");
                            }

                            (status);
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
                        (this.response);
                        document.getElementById("vieworderTable").insertAdjacentHTML("beforeend", `
                <p>no Orders Made.</p>
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