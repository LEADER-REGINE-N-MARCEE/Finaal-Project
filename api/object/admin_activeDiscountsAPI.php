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

$stmt = $product->activeDiscounts();
$num = $stmt->rowCount();

$activediscounts_arr = array();
$activediscounts_arr["active"] = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    extract($row);

    $discounts_code = array(
        "discountID" => $discountID,
        "discountCode" => $discountCode,
        "discountDate" => $discountDate,
        "discount" => $discount,
        "discount_status" => $discount_status
    );

    array_push($activediscounts_arr["active"], $discounts_code);
}
echo json_encode($activediscounts_arr, JSON_UNESCAPED_SLASHES);

?>
