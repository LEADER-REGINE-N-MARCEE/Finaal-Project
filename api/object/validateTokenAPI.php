<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

include_once '../config/database.php';
require '../../vendor/autoload.php';
use \Firebase\JWT\JWT;
$e = null;
$key = "nwoWAkH3DltizN62b37V2zsyWf1QufF5";

// get posted data
$data = json_decode(file_get_contents("php://input"));

// get jwt
$jwt = isset($data->jwt) ? $data->jwt : "";

// if jwt is not empty
if ($jwt)
{

    // decode jwt

    try
    {
        JWT::$leeway = 60;
        $decoded = JWT::decode($jwt, $key, array(
            'HS256'
        ));
        // set response code
        http_response_code(200);
        $usrID = $decoded->data->id;
        $role = $decoded->data->role;

        if ($role == "admin") {
            $redirect="admindashboard";
        } else {
            $redirect = "index";
        }
        // show user details
        echo json_encode(array(

            "message" => "Access granted:",
            "user_data" => $decoded,
            "id" => $usrID,
            "role" => $role,
            "redirect"=> $redirect
        ));

    }

    // if decode fails, it means jwt is invalid
    catch(Exception $e)
    {

            // set response code
    http_response_code(401);

    // tell the user access denied
    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
    }
}
// show error message if jwt is empty
else
{

    // set response code
    http_response_code(401);

    // tell the user access denied
    echo json_encode(array(
        "message" => "Access denied."
    ));
}
?>
