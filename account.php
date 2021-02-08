<?php require('header.php')?>
<link rel="stylesheet" href="css/account.css"/>

    <div class="section2">
        <div class="wrapper">
            <h1>MY ACCOUNT</h1>

            <button>SIGN OUT</button>
            <h2>ORDERS</h2>
            <table class="table">
                <tr>
                    <th>Invoice</th>
                    <th>Order Status</th>
                    <th></th>
                </tr>
                <tr>
                    <td class="invoice">123456ABCD</td>
                    <td class="pending">PENDING</td>
                    <td class="cancel-button">
                        <img src="./img/cancel1.png">
                        <p class="cancel1">CANCEL ORDER</p>
                    </td>
                </tr>
                <tr>
                    <td class="invoice">123456ABCD</td>
                    <td class="shipping">SHIPPING</td>
                    <td class="cancel-button">
                        <img src="./img/cancel2.png">
                        <p class="cancel2">CANCEL ORDER</p>
                    </td>
                </tr>
                <tr>
                    <td class="invoice">123456ABCD</td>
                    <td class="canceled">CANCELED</td>
                    <td class="cancel-button">
                        <img src="./img/cancel2.png">
                        <p class="cancel2">CANCEL ORDER</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php require('footer.php')?>