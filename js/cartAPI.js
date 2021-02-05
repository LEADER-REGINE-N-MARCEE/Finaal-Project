window.onload = function() { /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie(document.cookie);
    console.log(jwt);
    var xhttp = new XMLHttpRequest(); {

        xhttp.open("POST", "../api/object/cartAPI.php");
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({ "jwt": jwt }));

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let results = JSON.parse(this.response);

                for (let row of results.records) {
                    var price = row.price;
                    var tprice = price * row.amount;
                    document.getElementById("carttable").insertAdjacentHTML("beforeend", `
                    <td class=item-img><img src=${row.img_path}></td>
                    <td class=item-name>${row.itemName}</td>
                    <td class=item-quantity>${row.amount}</td>
                    <td class=item-price>${tprice}</td>
                    `);
                }


            } else if (this.readyState == 4 && this.status == 404) {
                console.log(this.response);
                document.getElementById("carttable").insertAdjacentHTML("beforeend", `
                
                `);
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
        var cookie = decodedCookie.replace('jwt=', '');

        return cookie;
    }
}