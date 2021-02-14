window.onload = function() {
    var xhttp = new XMLHttpRequest(); {
        xhttp.open("GET", API.product.read + "?itemType=" + itemType + "");
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let results = JSON.parse(this.response);
                for (let row of results.records) {
                    document.getElementById("itemcontainer").insertAdjacentHTML("beforeend", `
                        <div class='items'>
                        <a href='productPage.php?itemCode=${row.itemCode}&itemType=${row.itemType}' class='item-link'>
                        <img src= '${row.img_path}'>
                        <div class='titles'>
                        <h2>${row.itemName}</h2>
                        <p>${row.subtitle}</p>
                        </div>
                        </div>
                        `);
                }
            }
        }
    }
}