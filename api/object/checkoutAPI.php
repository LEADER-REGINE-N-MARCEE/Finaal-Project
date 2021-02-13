<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

include_once '../config/database.php';
include_once '../models/userDB.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));
$data->invoiceNum = invoice(10);

echo $data->invoiceNum;

if (!empty($data->id) && !empty($data->totalprice))
{

    $user->orderID = $data->id;
    $user->invoiceNum = $data->invoiceNum;
    $user->totalprice = $data->totalprice;

    if ($user->checkout())
    {

        http_response_code(201);
        echo json_encode(array(
            "message" => "Checkout Successfully Complete."
        ));
    }
    else
    {

        http_response_code(503);
        echo json_encode(array(
            "message" => "Unable to proceed with the Checkout."
        ));
    }
}
else
{ #Tell the user data is incomplete
    http_response_code(400);
    echo json_encode(array(
        "message" => "Unable to create product. Data is incomplete."
    ));
}

function invoice($length_of_string)
{
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    // Shufle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result) , 0, $length_of_string);
}
?>
