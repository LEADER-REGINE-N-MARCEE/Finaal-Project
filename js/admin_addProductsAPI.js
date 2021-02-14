window.onload = function() {

    /*para maload agad ung script pag naload ung web page*/
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

    console.log(JSON.stringify(data));
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
    //Serialize data function
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]["name"]] = formArray[i]["value"];
    }
    return returnArray;
}