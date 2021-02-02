window.onload = function() {
    var xhttp = new XMLHttpRequest(); {

        console.log(itemCode);
        xhttp.open("GET", "../api/object/addtocart.php?itemCode=" + itemCode + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


                let results = JSON.parse(this.response);

                for (let row of results.records) {
                    var itemName = row.itemName;
                    var itemCode = row.itemCode;
                    var itemType = row.itemType;

                    document.getElementById("body").insertAdjacentHTML("beforeend", `
                        <div class='items'>
                        
                        <img src= '${row.img_path}'>
                        <div class='titles'>
                        <h2>${row.itemName}</h2>
                        <h6>${row.subtitle}</h6>
                        <p>${row.descriptions}</p>
                        <p>Stocks: ${row.quantity}</p>
                        <input type='text' placeholder='Quantity' name='quantity'>
                        <button type='button' name='cart' id="cart" onclick="cart();">
                        </div>
                        </div>
                        `);
                }


            }
        }
    }
}