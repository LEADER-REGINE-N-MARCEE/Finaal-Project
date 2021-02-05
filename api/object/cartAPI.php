<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
require '../../vendor/autoload.php';
include_once '../models/product.php';
use \Firebase\JWT\JWT;

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$product = new Product($conn);

// decode jwt here
$secret_key = "nwoWAkH3DltizN62b37V2zsyWf1QufF5";

$jwt = null;
$databaseService = new Database();
$conn = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));

$jwt = $data->jwt;

if ($jwt)
{

    $decoded = JWT::decode($jwt, $secret_key, array(
        'HS256'
    ));

    // Access is granted. Add code of the operation here
    http_response_code(200);

    $usrID = $decoded
        ->data->id;
    $stmt = $product->cart($usrID);
    $num = $stmt->rowCount();

    if ($num > 0)
    {

        $products_arr = array();
        $products_arr["records"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $product_item = array(
                "itemID" => $itemID,
                "itemCode" => $itemCode,
                "itemType" => $itemType,
                "itemName" => $itemName,
                "subtitle" => html_entity_decode($subtitle) ,
                "descriptions" => html_entity_decode($descriptions) ,
                "quantity" => $quantity,
                "price" => $price,
                "img_path" => $img_path,
                "orderID" => $orderID,
                "amount" => $amount,
            );

            array_push($products_arr["records"], $product_item);
        }
        http_response_code(200);
        echo json_encode($products_arr);

    }
    else
    {
        http_response_code(404);
        echo json_encode(array(
            "message" => "No products found."
        ));
    }

}

?>
