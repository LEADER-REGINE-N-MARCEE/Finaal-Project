<link rel="stylesheet" href="css/admin.css">

<div class="section2">
     
    <nav>
        <div class="hamburger"> 
            <button>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </button>
            <ul class="nav-links">
                <li><a href="">ADMIN<br>ADMIN</a></li>
                <li><a href="">PRODUCTS</a></li>
                <li><a href="">USERS</a></li>
                <li><a href="">ORDERS</a></li>
                 
                <li><a href="javascript:signout()">LOGOUT</a></li>
            </ul>

            
        </div>
        <h1>ADMIN DASHBOARD</h1>
        <img src="./img/logo.png">
    </nav>
    <div class="wrapper">
        <h2>NEW ORDERS</h2>
        <table >
                <tr>
                    <th>Invoice</th>
                    <th>Order Status</th>
                    <th>Total Price</th>
                </tr>
                <tr>
                    <td>123456ABCD</td>
                    <td class="select">
                        <select>
                            <option value="#" class="accepted">ACCEPTED</option>
                            <option value="#" class="pending">PENDING</option>
                            <option value="#" class="shipping">SHIPPING</option>
                            <option value="#" class="canceled">CANCELED</option>
                            <option value="#" class="delivered">DELIVERED</option>
                        </select>
                    </td>
                    <td>$165</td>
                </tr>

            </table>

        <h2>PRODUCT OVERVIEW</h2>
        <table >
            <tr>
                <th>Item Code</th>
                <th>Product Name</th>
                <th>Stocks</th>
            </tr>
            <tr>
                <td>123456ABCD</td>
                <td>TOFU65 ACRYLIC MECHANICAL KEYBOARD</td>
                <td>500</td>
            </tr>
            <tr>
                <td>123456ABCD</td>
                <td>TOFU65 ACRYLIC MECHANICAL KEYBOARD</td>
                <td>500</td>
            </tr>
            <tr>
                <td>123456ABCD</td>
                <td>TOFU65 ACRYLIC MECHANICAL KEYBOARD</td>
                <td>500</td>
            </tr>
         </table>



    </div>            
</div>
