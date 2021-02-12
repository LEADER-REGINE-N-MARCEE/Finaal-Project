window.onload = function() { /*para maload agad ung script pag naload ung web page*/
    var jwt = getCookie('jwt');
    var xhttp = new XMLHttpRequest(); {

        xhttp.open("POST", API.userDB.tokenValid);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({ jwt: jwt }));
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                console.log(this.status);


            } else if (this.readyState == 4 && this.status == 401) {
                console.log(this.status);

            }
        };
    }
}

const btnShop = document.getElementById("btnShop");
btnShop.addEventListener("click", openShop);

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

function openShop() {
    window.location.href = "products.php?itemType=KB";
}