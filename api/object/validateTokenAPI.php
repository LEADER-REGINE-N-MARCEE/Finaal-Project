<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");

    include_once '../config/database.php';
    require '../../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    $e = null;
    $key = "nwoWAkH3DltizN62b37V2zsyWf1QufF5";

    // Get posted data
    $data = json_decode(file_get_contents("php://input"));

    // Get jwt
    $jwt = isset($data->jwt) ? $data->jwt : "";

    // If jwt is not empty
    if ($jwt) {

        // Decode jwt
        try {
            JWT::$leeway = 60;
            $decoded = JWT::decode($jwt, $key, 
                array('HS256')
            );

            // Set response code
            http_response_code(200);
            $usrID = $decoded
                ->data->id;
            $role = $decoded
                ->data->role;

            if ($role == "admin") {
                $redirect = "admindashboard";
            } else {
                $redirect = "index";
            }

            // Show user details
            echo json_encode(array(
                "message" => "Access granted:",
                "user_data" => $decoded,
                "id" => $usrID,
                "role" => $role,
                "redirect" => $redirect
            ));

        } catch(Exception $e) { #If decode fails, It means jwt is invalid
            // Set response code
            http_response_code(401);
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }
    } else { #show error message if jwt is empty
        // Set response code
        http_response_code(401);
        echo json_encode(array(
            "message" => "Access denied."
        ));
    }