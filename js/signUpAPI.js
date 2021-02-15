window.onload = function() {
    const btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.addEventListener("click", register);

    function register() {
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        if (ValidateEmail(email)) {
            if (ValidatePassword(password)) {
                const forms = document.querySelectorAll("form");
                const form = forms[0];

                var data = toObject(form);
                var xhttp = new XMLHttpRequest(); {

                    xhttp.open("POST", API.userDB.signUp);
                    xhttp.send(JSON.stringify(data));
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 201) {
                            let result = JSON.parse(this.response);
                            alert(result.message);
                            window.location.href = '../signIn.php';

                        } else if (this.readyState == 4 && this.status == 400) {
                            let result = JSON.parse(this.response);
                            alert(result.message);
                        }
                    };
                }
            }

        }

    }

    function toObject(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]["name"]] = formArray[i]["value"];
        }
        return returnArray;
    }

    function ValidateEmail(inputText) {
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (inputText.match(mailformat)) {
            return true;
        } else {
            alert("You have entered an invalid email address!");
            return false;
        }
    }

    function ValidatePassword(passwordText) {
        var passwordLength = passwordText.length;
        if (passwordLength > 5) {
            return true;
        } else {
            alert("Password is not 6 characters or more!");
            return false;
        }
    }
}