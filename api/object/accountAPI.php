<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST");

include_once '../config/database.php';
include_once '../models/userDB.php';

$databaseService = new Database(); #Database() is ung name ng class natin sa database.php
$conn = $databaseService->getConnection(); #getConnection() class para maaccess ung databse
$users = new User($conn);

$data = json_decode(file_get_contents("php://input"));

$usrID = $data->id;
$stmt = $users->getInvoice($usrID);
$num = $stmt->rowCount();

if ($num > 0)
{

    $invoice_arr = array();
    $invoice_arr["items"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $invoice_item = array(
            "orderID" => $orderID,
            "invoiceNum" => $invoiceNum,
            "totalprice" => $totalprice,
            "order_status" => $order_status,
            "order_date" => $order_date
        );

        array_push($invoice_arr["items"], $invoice_item);
    }
    http_response_code(200);
    echo json_encode($invoice_arr);

}
else
{
    http_response_code(404);
    echo json_encode(array(
        "message" => "No products found."
    ));
}

?>