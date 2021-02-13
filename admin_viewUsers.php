<html>

<head>
    <title>Users</title>
    <script src="./js/api.js"></script>
    <link rel="stylesheet" href="./css/admin.css">

</head>

<body>
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
                    <li><a href="./admin_viewUsers.php">USERS</a></li>
                    <li><a href="./admin_viewOrders.html">ORDERS</a></li>
                    <li><a href="">DISCOUNTS</a></li>
                    <li><a href="">LOGOUT</a></li>
                </ul>


            </div>
            <h1>ADMIN DASHBOARD</h1>
            <img src="./img/logo.png">
        </nav>


        <div class="wrapper">
            <div id="body1">
                <h2>Registered Users</h2>
                <table id="viewUsersTable">
                    <tr>
                        <td>User ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>E-mail</td>
                        <td>Registration Date</td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
</body>

<script src="./js/admin_viewUsersAPI.js"></script>

</html>




<!--



<div class="wrapper">
    <h2>NEW ORDERS</h2>
    <table>
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
    <table>
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


-->

<!--



            <div id="body3">
                <h2>ACTIVE DISCOUNTS</h2>
                <table id="activeDiscountsTable">
                    <tr>
                        <td>Discount ID</td>
                        <td>Discount Code</td>
                        <td>Discount</td>
                        <td>Discount Status</td>
                        <td>Discount Date</td>
                    </tr>
                </table>
            </div>


-->
