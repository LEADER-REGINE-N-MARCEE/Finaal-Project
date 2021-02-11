window.onload = function() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/admin_viewOrdersAPI.php");
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
            console.log(this.response);
            document.getElementById("vieworderTable").insertAdjacentHTML("beforeend", `
                <p>no Orders Made.</p>
            `);
        }
    };
}