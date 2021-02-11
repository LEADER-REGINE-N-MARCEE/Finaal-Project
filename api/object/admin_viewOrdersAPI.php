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

$stmt = $product->viewOrders();
$num = $stmt->rowCount();

$neworder_arr = array();
$neworder_arr["neworders"] = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);

    $neworder_item = array(
        "orderID" => $orderID,
        "invoiceNum" => $invoiceNum,
        "totalprice" => $totalprice,
        "order_status" => $order_status,
        "order_date" => $order_date
    );

    array_push($neworder_arr["neworders"], $neworder_item);
}
echo json_encode($neworder_arr, JSON_UNESCAPED_SLASHES);

?>
