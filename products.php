<?php
session_start();
include_once('productDB.php');

$itemType = $_GET['itemType'];

$products = new products();




?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php

    $crawl = $products->crawlDB($itemType);


    ?>

</body>

</html>