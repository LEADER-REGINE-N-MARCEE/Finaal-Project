<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
include_once '../models/admin.php';

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$product = new Product($conn);
$users = new User($conn);

$stmt = $product->items();
$num = $stmt->rowCount();

$items_overview_arr = array();
$items_overview_arr["items"] = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);

    $product_item = array(
        "itemCode" => $itemCode,
        "itemType" => $itemType,
        "itemName" => $itemName,
        "quantity" => $quantity,
        "subtitle" => $subtitle,
        "price" => $price
    );

    array_push($items_overview_arr["items"], $product_item);
}
http_response_code(200);
echo json_encode($items_overview_arr, JSON_UNESCAPED_SLASHES);

?>
