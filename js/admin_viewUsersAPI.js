window.onload = function() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "api/object/admin_viewUsersAPI.php");
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var results4 = JSON.parse(this.response);
            for (let rows of results4.users) {
                document.getElementById("viewUsersTable").insertAdjacentHTML("beforeend", `
                                <tr>
                                <td class=item-img>${rows.id}</td>
                                <td class=item-name>${rows.firstname}</td>
                                <td class=item-quantity>${rows.lastname}</td>
                                <td class=item-name>${rows.email}</td>
                                <td class=item-quantity>${rows.reg_date}</td>
                                <td><button type="button">Edit</button></td>
                                <td><button type="button">Delete</button></td>
                                <tr>
                                `);
            }
        } else if (this.readyState == 4 && this.status == 404) {
            console.log(this.response);
            document.getElementById("viewUsersTable").insertAdjacentHTML("beforeend", `
                                <p>No Users Registered in the Database.</p>
                            `);
        }
    };
}
