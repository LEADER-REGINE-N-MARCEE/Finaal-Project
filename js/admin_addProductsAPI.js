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

                const forms = document.querySelectorAll("form");
                const form = forms[0];

                var data = formToObject(form);

                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", API.admin.create);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        (xhttp);
                    }
                }
            } else if (this.readyState == 4 && this.status == 401) {
                ("Unauthorized Access! Authentication required.");
                window.location.href = '../signIn.php';
            }
        };
    }

    function formToObject(formArray) {
        //Serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]["name"]] = formArray[i]["value"];
        }
        return returnArray;
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