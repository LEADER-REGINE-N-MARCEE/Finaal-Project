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

if (!empty($data->id) && !empty($data->fullname) && !empty($data->flrnum) && !empty($data->province) && !empty($data->municipality) && !empty($data->barangay) && !empty($data->mobilenum))
{

    $user->infoID = $data->id;
    $user->fullname = $data->fullname;
    $user->flrnum = $data->flrnum;
    $user->province = $data->province;
    $user->municipality = $data->municipality;
    $user->barangay = $data->barangay;
    $user->mobilenum = $data->mobilenum;

    if ($user->addInfo())
    {

        http_response_code(201);
        echo json_encode(array(
            "message" => "Adding User Information Successfully Completed."
        ));
    }
    else
    {

        http_response_code(503);
        echo json_encode(array(
            "message" => "Cannot set user information."
        ));
    }
}
else
{ #tell the user data is incomplete
    http_response_code(400);
    echo json_encode(array(
        "message" => "Unable to update User information. Data is incomplete."
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
