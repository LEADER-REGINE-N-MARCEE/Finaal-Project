window.onload = function() {
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("GET", "../api/object/prodPage.php?itemCode=" + itemCode + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


                let results = JSON.parse(this.response);

                for (let row of results.records) {
                    console.log(results);
                    document.getElementById("body").insertAdjacentHTML("beforeend", `
                        <div class='items'>
                        
                        <img src= '${row.img_path}'>
                        <div class='titles'>
                        <h2 id="itemname">${row.itemName}</h2>
                        <h6>${row.subtitle}</h6>
                        <h4>${row.price}</h4>
                        <p>${row.descriptions}</p>
                        <p>Stocks: ${row.quantity}</p>
                        <form>
                            <input type='text' placeholder='Quantity' id="quantity" name='amount'>
                            <button type='button' name='cart' id="btnAddToCart">add to cart </button>
                        </form>
                        </div>
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


/*            echo "<h2 class= \'Item Name\'>" . $itemName . "</h2>\n";
            echo "<h6 class= \'Subtitle\'> " . $subtitle . "</h6>\n";
            echo "<p class= \'Descriptions\'> " . $description . "</p>\n";
            echo "<p class= \'Quantity\'>Stocks: " . $quantity . "</p>\n";
            echo "<form method='POST' action='addtocart.php'>";
            echo"<input type='text' placeholder='Quantity' name='quantity'>";
            echo "<button type='submit' name='addtocart' class= \'Add to Cart\'>Add to Cart</a>\n";
            echo "</form>"; */