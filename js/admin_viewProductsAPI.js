window.onload = function(){
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "api/object/admin_productOverviewAPI.php");
  xhttp.send();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var results3 = JSON.parse(this.response);
          for (let rows of results3.items) {
              document.getElementById("viewProductsTable").insertAdjacentHTML("beforeend", `
                              <tr>
                              <td class=item-img>${rows.itemCode}</td>
                              <td class=item-img>${rows.itemType}</td>
                              <td class=item-name>${rows.itemName}</td>
                              <td class=item-name>${rows.subtitle}</td>
                              <td class=item-name>${rows.price}</td>
                              <td class=item-quantity>${rows.quantity}</td>
                              <tr>
                              `);
          }
      } else if (this.readyState == 4 && this.status == 404) {
          console.log(this.response);
          document.getElementById("viewProductsTable").insertAdjacentHTML("beforeend", `
                              <p>No Product in the Database.</p>
                          `);
      }


  };
}
