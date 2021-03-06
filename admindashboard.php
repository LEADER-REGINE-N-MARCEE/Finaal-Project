<html>

<head>
    <title>Admin Dashboard</title>
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
                <ul class="nav-links" id="nav-links">

                </ul>


            </div>
            <h1>ADMIN DASHBOARD</h1>
            <img src="./img/logo.png">
        </nav>
        <div class="wrapper">
            <div id="body1">
                <h2>NEW ORDERS</h2>
                <table id="neworderTable">
                    <tr>
                        <td>Invoice</td>
                        <td>Order Status</td>
                        <td>Total Price</td>
                    </tr>

                </table>
            </div>

            <div id="body2">
                <h2>PRODUCT OVERVIEW</h2>
                <table id="productoverviewTable">
                    <tr>
                        <td>Item Code</td>
                        <td>Product Name</td>
                        <td>Stocks</td>
                    </tr>
                </table>
            </div>


        </div>
    </div>
</body>

<script src="./js/signoutAPI.js"></script>
<script src="./js/admin_newOrdersAPI.js"></script>

</html>