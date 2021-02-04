<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

include_once '../config/database.php';
include_once '../models/product.php';



$database = new Database();
$db = $database->getConnection();

$itemCode = $_GET['itemCode'];
$itemType = $_GET['itemType'];
$quantity = $_GET['quantity'];


$product = new Product($db);

$stmt = $product->addtocart($itemCode, $itemType, $quantity);

if ($product->addtocart($itemCode, $itemType, $quantity)) {

    http_response_code(201);

    echo json_encode(array("message" => "Product was created."));
} else {

    http_response_code(503);

    echo json_encode(array("message" => "Unable to create product."));
}


