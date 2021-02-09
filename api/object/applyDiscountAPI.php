<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
include_once '../models/product.php';

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$product = new Product($conn);

$data = json_decode(file_get_contents("php://input"));

$discountCode = $data->discountCode;
$stmt = $product->discount($discountCode);
$num = $stmt->rowCount();

if ($num > 0)
{

    $discount_arr = array();
    $discount_arr["value"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $discount_code = array(
            "discount" => $discount
        );

        array_push($discount_arr["value"], $discount_code);
    }
    http_response_code(200);
    echo json_encode($discount_arr);

}
else
{
    http_response_code(404);
    echo json_encode(array(
        "message" => "No discount found."
    ));
}

?>