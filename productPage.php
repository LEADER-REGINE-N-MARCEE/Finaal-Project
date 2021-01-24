<?php
session_start();
include_once('productPage-backend.php');
$itemName = $_GET['itemName'];

$productsView = new productsView();


$view = $productsView->productDetails($itemName);
?>