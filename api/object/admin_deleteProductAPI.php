<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

include_once '../config/database.php';
include_once '../models/admin.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));
$itemCode = $data->itemCode;

if ($product->deleteProduct($itemCode))
{

    http_response_code(200);

    echo json_encode(array(
    "message" => "Order Successfully Completed."
    ));
}else{

    http_response_code(401);

    echo json_encode(array(
        "message" => "Unable to proceed with the task."
    ));
}


?>
