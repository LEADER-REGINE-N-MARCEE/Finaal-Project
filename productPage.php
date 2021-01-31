<?php
session_start();
include_once('productDB.php');
$itemName = $_GET['itemName'];

$productsView = new products();


$view = $productsView->productDetails($itemName);

$_SESSION['itemCode'] = $view[0];
$_SESSION['itemName'] = $view[1];
$_SESSION['itemType'] = $view[2];

?>
