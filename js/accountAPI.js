var status;
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
                var results = JSON.parse(this.response);
                var usrID = results.id;
                xhttp.open("POST", "./api/object/accountAPI.php");
                xhttp.send(JSON.stringify({
                    id: usrID
                }));
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let results2 = JSON.parse(this.response);

                        for (let rows of results2.items) {
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
                            document.getElementById("orderTable").insertAdjacentHTML("beforeend", `
                            <tr>
                            <td class="invoice"><p id="${rows.invoiceNum}">${rows.invoiceNum}</p></td>
                            <td class="${status}">${rows.order_status}</td>
                            <td class="cancel-button">
                                <img src="./img/cancel1.png" id="cancelImg">
                                <button type="button" id="${rows.invoiceNum}" onclick="cancelOrder()">Cancel Order</button>
                            </td>
                             </tr>
                            
                            `);



                        }

                    }
                }

            } else if (this.readyState == 4 && this.status == 401) {
                window.location.href = '../signIn.php';
            }
        }
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

function cancelOrder() {
    /*const cancelImg = document.getElementById("cancelImg");
    const btnCancelOrder = event.srcElement.id;*/

    const invoiceNum = event.srcElement.id;

    console.log(invoiceNum);

    /*if (order_status != "PENDING") {
        btnCancelOrder.style.display = "none";
        cancelImg.style.display = "none";
    }*/


    var choice = "CANCELLED";
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/cancelOrderAPI.php");
    xhttp.send(JSON.stringify({
        choice: choice,
        invoiceNum: invoiceNum
    }));
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.status);
            alert("Order Cancelled")
            window.location.reload();
        } else if (this.readyState == 4 && this.status == 401) {
            console.log("error")
        }
    };
}