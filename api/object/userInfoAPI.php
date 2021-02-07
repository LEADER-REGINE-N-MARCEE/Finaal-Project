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
$stmt = $users->user_info($usrID);
$num = $stmt->rowCount();

if ($num > 0)
{

    $user_arr = array();
    $user_arr["info"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $user_info = array(
            "infoID" => $infoID,
            "fullname" => $fullname,
            "flrnum" => $flrnum,
            "province" => $province,
            "municipality" => $municipality,
            "barangay" => $barangay,
            "mobilenum" => $mobilenum
        );

        array_push($user_arr["info"], $user_info);
    }
    http_response_code(200);
    echo json_encode($user_arr);

}

else
{
    http_response_code(206);
    echo json_encode(array(
        "message" => "User information not set. Please fill out the form."
    ));
}
?>
