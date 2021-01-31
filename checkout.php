<?php 
session_start();
include_once('productDB.php');

$checkout = new products();

$orderID = $_SESSION['user'];
$invoicenum = $_SESSION['invoice'];
$totalprice = $_SESSION['totalprice'];
$totalquantity = $_SESSION['totalquantity'];

$check = $checkout->checkout($orderID ,$invoicenum, $totalprice, $totalquantity);

?>

<html>

<body>

</body>

</html>