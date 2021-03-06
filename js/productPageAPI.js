window.onload = function() {
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("GET", API.product.prodPage + "?itemCode=" + itemCode + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let results = JSON.parse(this.response);
                for (let row of results.records) {
                    if (row.quantity == 0) {
                        document.getElementById("item-container").insertAdjacentHTML("beforeend", `

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
                        <h5 style="color:red;">Stocks: OUT OF STOCK!</h5>
                        <label for="">Quantity </label>
                        <form>
                            <input type="number" value="1" min="1" max="20" onkeydown="false" name='amount' id="quantity" disabled> <br>
                            <button type="button" class="add-to-cart-btn" id="btnAddToCart" name='cart' disabled>Add to Cart</button>
                        </form>
                    </div>`);
                    } else {
                        document.getElementById("item-container").insertAdjacentHTML("beforeend", `

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
                            <button type="button" class="add-to-cart-btn" id="btnAddToCart" name='cart'>Add to Cart</button>
                        </form>
                    </div>`);
                    }


                    const btnAddToCart = document.getElementById("btnAddToCart"); /*kunin ung id ng btn para magkaron ng event listener*/
                    btnAddToCart.addEventListener("click", addtocart)

                    function addtocart() {
                        validate();
                    }

                    function toObject(formArray) { /*to object function*/
                        var returnArray = {}; /*initialize ung array */
                        for (var i = 0; i < formArray.length; i++) {
                            returnArray[formArray[i]["name"]] = formArray[i]["value"]; /*ipapasa na ung mga nasa form to array, */
                        }
                        return returnArray; /*then irereturn ung result */
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

                    function validate() {
                        let jwt = getCookie('jwt');
                        var xhttp = new XMLHttpRequest(); {
                            xhttp.open("POST", "../api/object/validateTokenAPI.php");
                            xhttp.send(JSON.stringify({ jwt: jwt }));
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    let results1 = JSON.parse(this.response);
                                    (results1);
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

                                    for (key in results1) {
                                        if (results1.hasOwnProperty(key)) {
                                            formdata[key] = results1[key];
                                        }
                                    }


                                    var xhttp = new XMLHttpRequest(); { /*para sa API */

                                        xhttp.open("POST", "../api/object/addtocartAPI.php"); /*POST ung request, then icall ung registerAPI.php */
                                        xhttp.send(JSON.stringify(formdata)); /*isesend ung data na nakuha dun sa form */

                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                let result = JSON.parse(this.response);
                                                alert("Added to cart");
                                                window.location.reload();

                                            } else if (this.readyState == 4 && this.status == 404) {
                                                let result = JSON.parse(this.response);
                                                alert(result.message);
                                            }
                                        };
                                    }
                                } else if (this.readyState == 4 && this.status == 401) {
                                    window.location.href = "./signIn.php";
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for (var i = 0; i < thumbnails.length; i++) {

        thumbnails[i].addEventListener('mouseover', function() {
            (activeImages)

            if (activeImages.length > 0) {
                activeImages[0].classList.remove('active')
            }


            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }
}