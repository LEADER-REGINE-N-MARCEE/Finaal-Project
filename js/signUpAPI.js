window.onload = function() { /*para maload agad ung script pag naload ung web page*/
    const btnSubmit = document.getElementById("btnSubmit"); /*kunin ung id ng btn para magkaron ng event listener*/
    btnSubmit.addEventListener("click", register) /*para pag "click" nung button, icacall nya ung register function*/


    /*register function*/
    function register() {
        const forms = document.querySelectorAll("form"); /*kukuhanin nya lahat ng values sa form, iisa lang naman kaya queryselectorall gamit. ibigsabihin lagat ng forms sa html mo ipaparse nya */
        const form = forms[0]; /*initialize ung form constant with the start nung array formst */

        var data = toObject(form); /*initialize ung variable data. then icacall ung toObject na function the parameter ung form */
        var xhttp = new XMLHttpRequest(); { /*para sa API */

            xhttp.open("POST", API.userDB.signUp); /*POST ung request, then icall ung registerAPI.php */
            xhttp.send(JSON.stringify(data)); /*isesend ung data na nakuha dun sa form */
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 201) {
                    let result = JSON.parse(this.response);
                    alert(result.message);
                    window.location.href = '../signIn.php';

                } else if (this.readyState == 4 && this.status == 400) {
                    let result = JSON.parse(this.response);
                    alert(result.message);
                    console.log(result);
                }
            };
        }
    }

    function toObject(formArray) { /*to object function*/
        var returnArray = {}; /*initialize ung array */
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]["name"]] = formArray[i]["value"]; /*ipapasa na ung mga nasa form to array, */
        }
        return returnArray; /*then irereturn ung result */
    }
}