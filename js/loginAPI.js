window.onload = function() {
    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", register)



    function register() {
        const forms = document.querySelectorAll("form");
        const form = forms[0];

        var data = toObject(form);

        var xhttp = new XMLHttpRequest(); {

            xhttp.open("POST", "../api/object/loginAPI.php");
            xhttp.send(JSON.stringify(data));
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 202) {
                    let result = JSON.parse(this.response);
                    alert(result.message);
                    window.location.href = '../index.php';

                } else if (this.readyState == 4 && this.status == 401) {
                    let result = JSON.parse(this.response);
                    alert(result.message);
                    console.log(result);
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


}