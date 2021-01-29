<?php
session_start();
include_once('productPage-backend.php');

$usrID = $_SESSION['user'];
$itemCode = $_SESSION['itemCode'];
$itemName = $_SESSION['itemName'];
$itemType = $_SESSION['itemType'];
$quantity = $_POST['quantity'];

$productsView = new productsView();


$buynow = $productsView->buy($itemCode, $usrID, $itemType, $itemName, $quantity)
?>

