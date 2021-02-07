<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
include_once '../models/userDB.php';

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$users = new User($conn); #initialize ung User class, parameter ung $conn para mavalidate if naka connect na sa database


$data = json_decode(file_get_contents("php://input"));

$usrID = $data->id;
$itemCode = $data->records[0]->itemCode;
$itemType = $data->records[0]->itemType;
$itemName = $data->records[0]->itemName;
$quantity = $data->amount;

$addtocart = $users->addtocart($usrID, $itemCode, $itemType, $itemName, $quantity);
if ($addtocart == true)
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

?>
