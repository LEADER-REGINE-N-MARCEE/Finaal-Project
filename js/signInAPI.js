window.onload = function() {
    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", login);

    function login() {
        const forms = document.querySelectorAll("form");
        const form = forms[0];
        var data = toObject(form);
        var xhttp = new XMLHttpRequest(); {
            xhttp.open("POST", API.userDB.signIn);
            xhttp.send(JSON.stringify(data));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 202) {
                    let result = JSON.parse(this.response);
                    setCookie("jwt", result.jwt, 1);
                    alert(result.message);
                    home();
                } else if (this.readyState == 4 && this.status == 401) {
                    let result = JSON.parse(this.response);
                    alert(result.message);
                }
            };
        }
    }

    function toObject(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]["name"]] = formArray[i]["value"];
        }
        return returnArray;
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function home() {
        let jwt = getCookie('jwt');
        var xhttp = new XMLHttpRequest(); {
            xhttp.open("POST", API.userDB.tokenValid);
            xhttp.send(JSON.stringify({
                jwt: jwt
            }));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let results4 = JSON.parse(this.response);
                    var rdr = results4.redirect;
                    window.location.href = rdr;
                } else if (this.readyState == 4 && this.status == 401) {
                    let results4 = JSON.stringify(this.response);
                }
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
        return '';
    }
}