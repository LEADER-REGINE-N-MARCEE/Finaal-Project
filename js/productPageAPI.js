window.onload = function() {
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("GET", "../api/object/prodPage.php?itemCode=" + itemCode + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var decodedCookie = decodeURIComponent(document.cookie);
                var cookie = decodedCookie.replace(/jwt=/g, '');
                let results = JSON.parse(this.response);

                for (let row of results.records) {
                    document.getElementById("body").insertAdjacentHTML("beforeend", `

                <div class="thumb-image">
                    <img class="thumbnail active" src="${row.img_path}">
                    <img class="thumbnail" src="${row.img_path2}">
                    <img class="thumbnail" src="${row.img_path3}">

                </div>

                <img id=featured src="${row.img_path}">

                <div class="text-details">
                <br>
                <h1>${row.itemName}</h1>
                <h3>${row.subtitle}</h3>
                <h4>$${row.price}</h4>
                <p>${row.descriptions}</p><br>
                <h5>Stocks: ${row.quantity}</h5>
                <label for="">Quantity </label>
                <form>
                <input type="number" value="1" min="1" max="20" onkeydown="false" name='amount' id="quantity"><br>
                <button class="add-to-cart-btn" id="btnAddToCart" name='cart'>Add to Cart</button>
                </form>
                

                    </div>

                        `);

                    const btnAddToCart = document.getElementById("btnAddToCart"); /*kunin ung id ng btn para magkaron ng event listener*/
                    btnAddToCart.addEventListener("click", addtocart)

                    function addtocart() {
                        const forms = document.querySelectorAll("form"); /*kukuhanin nya lahat ng values sa form, iisa lang naman kaya queryselectorall gamit. ibigsabihin lagat ng forms sa html mo ipaparse nya */
                        const form = forms[0];

                        /*initialize ung variable data. then icacall ung toObject na function the parameter ung form */
                        var data2 = toObject(form);
                        const formdata = {};
                        let key;

                        for (key in results) {
                            if (results.hasOwnProperty(key)) {
                                formdata[key] = results[key];
                            }
                        }

                        for (key in data2) {
                            if (data2.hasOwnProperty(key)) {
                                formdata[key] = data2[key];
                            }
                        }

                        console.log(JSON.stringify(formdata));
                        var xhttp = new XMLHttpRequest(); { /*para sa API */

                            xhttp.open("POST", "../api/object/addtocartAPI.php"); /*POST ung request, then icall ung registerAPI.php */
                            xhttp.send(JSON.stringify(formdata)); /*isesend ung data na nakuha dun sa form */

                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 201) {
                                    let result = JSON.parse(this.response);
                                    alert(result.message);


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


            }
        }
    }
}