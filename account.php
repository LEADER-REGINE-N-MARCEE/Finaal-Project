<?php require('header.php') ?>

<body>
    <link rel="stylesheet" href="css/account.css" />

    <div class="section2">
        <div class="wrapper">
            <h1>MY ACCOUNT</h1>
            <div class="btn-container">
                <button type="button" id="btnSignout" onclick="signout()">SIGN OUT</button>
            </div>
            <h2>ORDERS</h2>
            <table class="table" id="orderTable">
                <tr>
                    <th>Invoice</th>
                    <th>Order Status</th>
                    <th></th>
                </tr>

            </table>
        </div>
    </div>
    <script src="./js/signoutAPI.js"></script>
    <script src="./js/accountAPI.js"></script>
    
</body>

<?php require('footer.php') ?>