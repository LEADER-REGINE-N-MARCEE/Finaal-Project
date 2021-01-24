<?php
session_start();
include_once('productDB.php');

$itemType = $_GET['itemType'];

$products = new products();


$crawl = $products->crawlDB($itemType);

?>