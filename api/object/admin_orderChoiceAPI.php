<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

include_once '../config/database.php';
include_once '../models/admin.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));
$invoiceNum = $data->invoiceNum;
$order_status = $data->choice;

if (!empty($data->invoiceNum) && !empty($data->choice))

{
    $user->invoiceNum = $invoiceNum;
    $user->order_status = $order_status;

    if ($user->updateOrder())
    {

        http_response_code(200);

        echo json_encode(array(
            "message" => "Order Successfully Completed."
        ));
    }

    else
    {

        http_response_code(401);

        echo json_encode(array(
            "message" => "Unable to proceed with the task."
        ));
    }
}

// tell the user data is incomplete
else
{
    http_response_code(400);

    echo json_encode(array(
        "message" => "Unable to create product. Data is incomplete."
    ));
}

?>
