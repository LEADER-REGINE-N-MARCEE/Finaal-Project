<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files for decoding jwt will be here
include_once '../config/database.php';
include_once '../models/userDB.php';
require '../../vendor/autoload.php';
use \Firebase\JWT\JWT;

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse

$users = new User($conn); #initialize ung User class, parameter ung $conn para mavalidate if naka connect na sa database

 
// decode jwt here
$secret_key = "nwoWAkH3DltizN62b37V2zsyWf1QufF5";

$jwt = null;
$databaseService = new Database();
$conn = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));


$headers = getallheaders();
$data->jwt= $headers['Authorization'];
$jwt = $data->jwt;
if($jwt){

    try {

        $decoded = JWT::decode($jwt, $secret_key, array('HS256'));

        // Access is granted. Add code of the operation here 
        http_response_code(200);

        $usrID = $decoded->data->id;
        $usrID = $decoded->data->id;
        $itemCode = $data->itemCode;
        $itemType = $data->itemType;
        $quantity = $data->amount;

        echo $usrID;
        echo $itemCode;
        echo $itemType;
        echo $quantity;

        $addtocart = $users->addtocart($usrID, $itemCode, $itemType, $quantity);
        if ($addtocart == TRUE)
        {

            http_response_code(200);
            echo json_encode(array(
                "message" => "Successfully added to cart."
            ));
        }
        else
        {
            http_response_code(400);

            echo json_encode(array(
                "message" => "Unable to add to cart."
            ));
        }
    }catch (Exception $e){

    http_response_code(401);

    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}

}
?>