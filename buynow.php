<?php
session_start();
include_once('productDB.php');

$usrID = $_SESSION['user'];
$itemCode = $_SESSION['itemCode'];
$itemName = $_SESSION['itemName'];
$itemType = $_SESSION['itemType'];
$quantity = $_POST['quantity'];

$productsView = new products();


$buynow = $productsView->buy($itemCode, $usrID, $itemType, $itemName, $quantity)
?>

