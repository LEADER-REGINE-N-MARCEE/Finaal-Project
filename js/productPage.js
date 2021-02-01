window.onload = function() {
    var xhttp = new XMLHttpRequest(); {

        console.log(itemCode);
        xhttp.open("GET", "../api/object/prodPage.php?itemCode=" + itemCode + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


                let results = JSON.parse(this.response);

                for (let row of results.records) {
                    document.getElementById("body").insertAdjacentHTML("beforeend", `
                        <div class='items'>
                        
                        <img src= '${row.img_path}'>
                        <div class='titles'>
                        <h2>${row.itemName}</h2>
                        <h6>${row.subtitle}</h6>
                        <p>${row.descriptions}</p>
                        <p>Quantity: ${row.quantity}</p>
                        </div>
                        </div>
                        `);
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